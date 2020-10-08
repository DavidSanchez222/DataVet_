<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use SoftDeletes;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeInvoice_number ($query, $invoice_number)
    {
        if ($invoice_number) {
            return $query->where('invoice_number', 'LIKE', "%$invoice_number%");
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

    public function scopeUsers ($query, $user)
    {
        if ($user) {
            return $query->whereIn('user_id', User::name($user)->pluck('id')->toArray());
        }
    }
}
