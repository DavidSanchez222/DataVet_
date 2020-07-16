<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function entryLogs()
    {
        return $this->hasMany(EntryLog::class);
    }
}
