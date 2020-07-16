<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
}
