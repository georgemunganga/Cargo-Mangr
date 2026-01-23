<?php

namespace App\Services;

use App\Models\Transxn;
use Modules\Cargo\Entities\Shipment;
use RuntimeException;

class RefundService
{
    public function applyRefund(Shipment $shipment, float $amount, string $type, ?string $reason = null): array
    {
        $transaction = $shipment->receipt;
        if (!$transaction instanceof Transxn) {
            throw new RuntimeException('Transaction not found for this shipment.');
        }

        $total = (float) $transaction->total;
        $alreadyRefunded = (float) ($transaction->refunded_amount ?? 0);
        $remaining = max($total - $alreadyRefunded, 0.0);

        if ($remaining <= 0) {
            throw new RuntimeException('This transaction has already been fully refunded.');
        }

        if ($type === 'full') {
            $refundAmount = $remaining;
        } elseif ($type === 'partial') {
            $refundAmount = $amount;
        } else {
            throw new RuntimeException('Invalid refund type.');
        }

        if ($refundAmount <= 0) {
            throw new RuntimeException('Refund amount must be greater than zero.');
        }

        if ($refundAmount - $remaining > 0.01) {
            throw new RuntimeException('Refund amount exceeds the remaining balance.');
        }

        $newRefundedAmount = round($alreadyRefunded + $refundAmount, 2);
        $isFullyRefunded = $newRefundedAmount >= ($total - 0.01);
        if ($isFullyRefunded) {
            $newRefundedAmount = $total;
        }

        if ($isFullyRefunded) {
            $paymentReceipts = $shipment->paymentReceipts;
            if ($paymentReceipts->count() > 0) {
                $tableHasRefundedColumns = \Illuminate\Support\Facades\Schema::hasColumn('shipment_payment_receipts', 'refunded');
                if ($tableHasRefundedColumns) {
                    foreach ($paymentReceipts as $paymentReceipt) {
                        $paymentReceipt->update([
                            'refunded' => true,
                            'refunded_at' => now(),
                            'refund_reason' => $reason ?? 'Manual refund',
                        ]);
                    }
                } else {
                    foreach ($paymentReceipts as $paymentReceipt) {
                        $paymentReceipt->delete();
                    }
                }
            }
        }

        $transaction->update([
            'status' => $isFullyRefunded ? 'refunded' : 'partially_refunded',
            'refunded_at' => now(),
            'refund_reason' => $reason ?? 'Manual refund',
            'refunded_amount' => $newRefundedAmount,
        ]);

        if ($isFullyRefunded) {
            $shipment->paid = 0;
            $shipment->save();
        }

        return [
            'refund_amount' => $refundAmount,
            'refunded_total' => $newRefundedAmount,
            'status' => $transaction->status,
        ];
    }
}
