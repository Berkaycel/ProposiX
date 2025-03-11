<?php

namespace App\Models;

use App\Library\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'unit_price', 'quantity', 'description', 'status'
    ];

    protected $casts = [
        'status' => ProductStatus::class,
    ];

    public function getStatusLabelAttribute(): string
    {
        return $this->status->label();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proposalItems()
    {
        return $this->hasMany(ProposalItem::class);
    }
}
