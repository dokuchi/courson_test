<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'fio',
        'phone',
        'owner_id'
    ];

    protected $with = [
        'favoriteContactForUsers',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class,'id', 'owner_id');
    }

    public function favoriteContactForUsers()
    {
        return $this->belongsToMany(User::class, 'favorite_contacts');
    }
}
