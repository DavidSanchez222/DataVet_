<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'lastname',
        'nickname',
        'number_id',
        'password',
        'phone',
        'document_type_id',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'document_type_id' => 'integer',
    ];

    public function document_type()
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%")->orWhere('lastname', 'LIKE', "%$name%");
        }
    }

    public function scopeEmail($query, $email)
    {
        if ($email) {
            return $query->where('email', 'LIKE', "%$email%");
        }
    }

    public function scopePhone($query, $phone)
    {
        if ($phone) {
            return $query->where('phone', 'LIKE', "%$phone%");
        }
    }

    public function scopeDocumentType($query, $document_type)
    {
        if ($document_type) {
            return $query->where('document_type_id', $document_type);
        }
    }

    public function scopeNumber_id($query, $number_id)
    {
        if ($number_id) {
            return $query->where('number_id', 'LIKE', "%$number_id%");
        }
    }
}
