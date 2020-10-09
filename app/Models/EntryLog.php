<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntryLog extends Model
{
    use SoftDeletes;

    public function provider ()
    {
        return $this->belongsTo(Provider::class);
    }

    public function product ()
    {
        return $this->belongsTo(Product::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePurchase_order ($query, $purchase_order)
    {
        if ($purchase_order) {
            return $query->where('purchase_order', 'LIKE', "%$purchase_order%");
        }
    }

    public function scopeCreated_at($query, $created_at)
    {
        if ($created_at) {
            return $query->whereDate('created_at', $created_at);
        }
    }

    public function scopeProducts ($query, $product)
    {
        if ($product) {
            return $query->whereIn('product_id', Product::name($product)->pluck('id')->toArray());
        }
    }

    public function scopeProviders ($query, $provider)
    {
        if ($provider) {
            return $query->whereIn('provider_id', Provider::name($provider)->pluck('id')->toArray());
        }
    }

    public function scopeUsers ($query, $user)
    {
        if ($user) {
            return $query->whereIn('user_id', User::name($user)->pluck('id')->toArray());
        }
    }
}
