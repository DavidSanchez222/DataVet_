<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function scopeAbbreviation($query, $abbreviation)
    {
        if ($abbreviation) {
            return $query->where('abbreviation', 'LIKE', "%$abbreviation%");
        }
    }

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        }
    }
}
