<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Cargo\Entities\Shipment;

class RefundRequest extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_DECLINED = 'declined';

    const TYPE_FULL = 'full';
    const TYPE_PARTIAL = 'partial';

    protected $fillable = [
        'shipment_id',
        'transxn_id',
        'requested_by',
        'reviewed_by',
        'status',
        'refund_type',
        'amount',
        'reason',
        'review_notes',
        'reviewed_at',
        'refunded_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'reviewed_at' => 'datetime',
        'refunded_at' => 'datetime',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transxn::class, 'transxn_id');
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
