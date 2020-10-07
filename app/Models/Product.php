<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function checkouts()
    {
        return $this->hasMany(Checkout::class);
    }

    public function entryLogs()
    {
        return $this->hasMany(EntryLog::class);
    }

    public function scopeCategory($query, $category)
    {
        if ($category) {
            return $query->where('categorie_id', $category);
        }
    }

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        }
    }

    public function scopeBarcode($query, $barcode)
    {
        if ($barcode) {
            return $query->where('barcode', 'LIKE', "%$barcode%");
        }
    }
}
