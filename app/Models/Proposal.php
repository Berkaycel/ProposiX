<?php

namespace App\Models;

use App\Library\Enums\ProposalStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id', 'receiver_id', 'total', 'status', 'offered_amount', 'last_valid_date'
    ];

    protected $casts = [
        'status' => ProposalStatus::class
    ];

    public function getStatusLabelAttribute(): string
    {
        return $this->status->label();
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function items()
    {
        return $this->hasMany(ProposalItem::class);
    }
}
