@php
    use Illuminate\Support\Str;
    $canManage = auth()->user()->can('approve-refund-requests');
    $statusValue = strtolower((string) ($refundRequest->status ?? ''));
    $statusLabel = Str::headline($refundRequest->status ?? 'unknown');
    $statusTone = match ($statusValue) {
        'approved' => 'rr-badge--approved',
        'declined' => 'rr-badge--declined',
        'pending' => 'rr-badge--pending',
        default => 'rr-badge--default',
    };
    $shipment = $refundRequest->shipment;
    $transaction = $refundRequest->transaction;
    $requester = $refundRequest->requester?->name ?? '-';
    $reviewer = $refundRequest->reviewer?->name ?? '-';
    $requestedAt = optional($refundRequest->created_at)->format('Y-m-d H:i');
    $reviewedAt = optional($refundRequest->reviewed_at)->format('Y-m-d H:i');
    $refundedAt = optional($refundRequest->refunded_at)->format('Y-m-d H:i');
@endphp

@extends('cargo::adminLte.layouts.master')
@section('pageTitle', 'Refund Request')
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    .refund-request-page {
        --ink: #1f2937;
        --ink-soft: #4b5563;
        --paper: #f8f4ee;
        --card: #ffffff;
        --accent: #f97316;
        --accent-deep: #ea580c;
        --accent-cool: #0f766e;
        --shadow: 0 18px 35px rgba(15, 23, 42, 0.12);
        --stroke: rgba(148, 163, 184, 0.3);
        font-family: "Poppins", sans-serif;
        color: var(--ink);
        background:
            radial-gradient(circle at top right, rgba(14, 116, 144, 0.12), transparent 55%),
            radial-gradient(circle at 20% 20%, rgba(249, 115, 22, 0.15), transparent 50%),
            linear-gradient(120deg, #fef3c7 0%, #f8fafc 45%, #ecfeff 100%);
        border-radius: 24px;
        padding: 28px;
        position: relative;
        overflow: hidden;
    }
    .refund-request-page::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: repeating-linear-gradient(
            135deg,
            rgba(15, 23, 42, 0.04) 0,
            rgba(15, 23, 42, 0.04) 1px,
            transparent 1px,
            transparent 12px
        );
        opacity: 0.4;
        pointer-events: none;
    }
    .rr-content {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        gap: 24px;
    }
    .rr-hero {
        background: var(--card);
        border-radius: 20px;
        padding: 24px;
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
        box-shadow: var(--shadow);
        border: 1px solid var(--stroke);
        animation: rr-fade-up 0.6s ease both;
    }
    .rr-kicker {
        font-family: "Poppins", sans-serif;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        font-size: 11px;
        color: var(--accent-cool);
        font-weight: 600;
    }
    .rr-title {
        font-family: "Poppins", sans-serif;
        font-size: 28px;
        font-weight: 700;
        margin: 6px 0 8px;
    }
    .rr-subtitle {
        color: var(--ink-soft);
        font-size: 15px;
        margin: 0;
    }
    .rr-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 14px;
    }
    .rr-tag {
        font-family: "Poppins", sans-serif;
        font-size: 12px;
        padding: 6px 10px;
        border-radius: 999px;
        border: 1px solid rgba(15, 118, 110, 0.2);
        color: var(--accent-cool);
        background: rgba(15, 118, 110, 0.1);
    }
    .rr-hero-right {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 10px;
    }
    .rr-badge {
        font-family: "Poppins", sans-serif;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        padding: 6px 14px;
        border-radius: 999px;
        border: 1px solid transparent;
    }
    .rr-badge--pending {
        color: #92400e;
        background: #fef3c7;
        border-color: rgba(245, 158, 11, 0.3);
    }
    .rr-badge--approved {
        color: #065f46;
        background: #d1fae5;
        border-color: rgba(16, 185, 129, 0.3);
    }
    .rr-badge--declined {
        color: #7f1d1d;
        background: #fee2e2;
        border-color: rgba(239, 68, 68, 0.3);
    }
    .rr-badge--default {
        color: #475569;
        background: #e2e8f0;
        border-color: rgba(148, 163, 184, 0.4);
    }
    .rr-amount {
        font-family: "Poppins", sans-serif;
        font-size: 32px;
        font-weight: 700;
        color: var(--accent-deep);
    }
    .rr-meta {
        font-size: 13px;
        color: var(--ink-soft);
        text-align: right;
    }
    .rr-back {
        font-family: "Poppins", sans-serif;
        font-size: 13px;
        text-decoration: none;
        color: var(--ink);
        border: 1px solid var(--stroke);
        padding: 8px 14px;
        border-radius: 999px;
        transition: all 0.2s ease;
    }
    .rr-back:hover {
        border-color: rgba(15, 118, 110, 0.4);
        color: var(--accent-cool);
        transform: translateY(-1px);
    }
    .rr-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }
    .rr-card {
        background: var(--card);
        border-radius: 18px;
        padding: 20px;
        border: 1px solid var(--stroke);
        box-shadow: 0 12px 25px rgba(15, 23, 42, 0.08);
        animation: rr-fade-up 0.6s ease both;
    }
    .rr-card:nth-child(1) { animation-delay: 0.05s; }
    .rr-card:nth-child(2) { animation-delay: 0.1s; }
    .rr-card:nth-child(3) { animation-delay: 0.15s; }
    .rr-card:nth-child(4) { animation-delay: 0.2s; }
    .rr-card--wide {
        grid-column: 1 / -1;
    }
    .rr-card h3 {
        font-family: "Poppins", sans-serif;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        color: var(--accent-cool);
        margin-bottom: 12px;
    }
    .rr-list {
        display: grid;
        gap: 10px;
        font-size: 14px;
        color: var(--ink-soft);
    }
    .rr-list span {
        color: var(--ink);
        font-weight: 600;
        margin-left: 6px;
        font-family: "Poppins", sans-serif;
    }
    .rr-reason {
        font-size: 15px;
        color: var(--ink-soft);
        line-height: 1.6;
        margin: 0;
    }
    .rr-actions {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
        align-items: center;
        padding: 20px;
        border-radius: 18px;
        background: linear-gradient(120deg, rgba(15, 118, 110, 0.12), rgba(249, 115, 22, 0.12));
        border: 1px dashed rgba(15, 118, 110, 0.3);
        animation: rr-fade-up 0.6s ease both;
    }
    .rr-actions-info {
        display: flex;
        flex-direction: column;
        gap: 6px;
        justify-content: center;
    }
    .rr-actions h4 {
        font-family: "Poppins", sans-serif;
        font-size: 18px;
        margin-bottom: 6px;
    }
    .rr-actions p {
        margin: 0;
        color: var(--ink-soft);
    }
    .rr-actions-right {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        justify-content: flex-end;
        align-items: center;
    }
    .rr-btn {
        font-family: "Poppins", sans-serif;
        font-weight: 600;
        border-radius: 999px;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        min-width: 170px;
    }
    .rr-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 10px 20px rgba(15, 23, 42, 0.12);
    }
    .rr-btn--approve {
        background: #10b981;
        color: #ffffff;
    }
    .rr-btn--decline {
        background: #ef4444;
        color: #ffffff;
    }
    .rr-textarea {
        width: 100%;
        border-radius: 14px;
        border: 1px solid var(--stroke);
        padding: 10px 12px;
        font-size: 14px;
        font-family: "Poppins", sans-serif;
        resize: vertical;
        min-height: 110px;
        background: #ffffff;
    }
    .rr-modal .modal-content {
        border-radius: 18px;
        border: 1px solid var(--stroke);
    }
    .rr-modal {
        z-index: 2000;
    }
    .modal-backdrop {
        z-index: 1990;
    }
    .rr-modal .modal-header {
        border-bottom: 1px solid rgba(148, 163, 184, 0.3);
    }
    .rr-modal .modal-footer {
        border-top: 1px solid rgba(148, 163, 184, 0.3);
    }
    .rr-modal .modal-title {
        font-family: "Poppins", sans-serif;
        font-weight: 600;
    }
    .rr-modal .btn {
        border-radius: 999px;
        font-weight: 600;
    }
    @keyframes rr-fade-up {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @media (max-width: 991px) {
        .rr-hero,
        .rr-grid,
        .rr-actions {
            grid-template-columns: 1fr;
        }
        .rr-hero-right {
            align-items: flex-start;
        }
        .rr-actions-right {
            justify-content: flex-start;
        }
    }
</style>

<div class="refund-request-page">
    <div class="rr-content">
        <div class="rr-hero">
            <div>
                <div class="rr-kicker">Refund Control</div>
                <h1 class="rr-title">Refund Request #{{ $refundRequest->id }}</h1>
                <p class="rr-subtitle">
                    Shipment <strong>{{ $shipment?->code ?? '-' }}</strong> for
                    <strong>{{ $shipment?->client?->name ?? '-' }}</strong>
                </p>
                <div class="rr-tags">
                    <span class="rr-tag">Type: {{ Str::headline($refundRequest->refund_type) }}</span>
                    <span class="rr-tag">Paid: {{ $shipment?->paid ? 'Yes' : 'No' }}</span>
                    <span class="rr-tag">Requested by: {{ $requester }}</span>
                </div>
            </div>
            <div class="rr-hero-right">
                <span class="rr-badge {{ $statusTone }}">{{ $statusLabel }}</span>
                <div class="rr-amount">K{{ number_format((float) $refundRequest->amount, 2) }}</div>
                <div class="rr-meta">
                    Requested at: {{ $requestedAt ?? '-' }}<br>
                    Refunded at: {{ $refundedAt ?? '-' }}
                </div>
                <a href="{{ fr_route('refund-requests.index') }}" class="rr-back">Back to list</a>
            </div>
        </div>

        <div class="rr-grid">
            <div class="rr-card">
                <h3>Shipment</h3>
                <div class="rr-list">
                    <div>Code:<span>{{ $shipment?->code ?? '-' }}</span></div>
                    <div>Client:<span>{{ $shipment?->client?->name ?? '-' }}</span></div>
                    <div>Paid:<span>{{ $shipment?->paid ? 'Yes' : 'No' }}</span></div>
                    <div>Payment status:<span>{{ Str::headline($transaction?->status ?? '-') }}</span></div>
                </div>
            </div>
            <div class="rr-card">
                <h3>Request Details</h3>
                <div class="rr-list">
                    <div>Type:<span>{{ Str::headline($refundRequest->refund_type) }}</span></div>
                    <div>Amount:<span>K{{ number_format((float) $refundRequest->amount, 2) }}</span></div>
                    <div>Status:<span>{{ $statusLabel }}</span></div>
                    <div>Requested at:<span>{{ $requestedAt ?? '-' }}</span></div>
                </div>
            </div>
            <div class="rr-card rr-card--wide">
                <h3>Reason</h3>
                <p class="rr-reason">{{ $refundRequest->reason ?: '-' }}</p>
            </div>
            <div class="rr-card rr-card--wide">
                <h3>Review</h3>
                <div class="rr-list">
                    <div>Reviewed by:<span>{{ $reviewer }}</span></div>
                    <div>Reviewed at:<span>{{ $reviewedAt ?? '-' }}</span></div>
                    <div>Notes:<span>{{ $refundRequest->review_notes ?: '-' }}</span></div>
                </div>
            </div>
        </div>

        @if($refundRequest->status === App\Models\RefundRequest::STATUS_PENDING && $canManage)
            <div class="rr-actions">
                <div class="rr-actions-info">
                    <h4>Decision Required</h4>
                    <p>Approve to process the refund now or decline with a clear reason.</p>
                </div>
                <div class="rr-actions-right">
                    <form method="post" action="{{ fr_route('refund-requests.approve', $refundRequest->id) }}">
                        @csrf
                        <button type="submit" class="rr-btn rr-btn--approve">Approve and Refund</button>
                    </form>
                    <button type="button" class="rr-btn rr-btn--decline" data-toggle="modal" data-target="#rrDeclineModal">
                        Decline Request
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>

@if($refundRequest->status === App\Models\RefundRequest::STATUS_PENDING && $canManage)
    <div class="modal fade rr-modal" id="rrDeclineModal" tabindex="-1" role="dialog" aria-labelledby="rrDeclineModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ fr_route('refund-requests.decline', $refundRequest->id) }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="rrDeclineModalLabel">Decline Refund Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="rrDeclineReason" class="d-block font-weight-semibold mb-2">Reason for decline</label>
                        <textarea id="rrDeclineReason" name="review_notes" class="rr-textarea" rows="4" placeholder="Share the reason for declining this refund." required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Confirm Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

@endsection
