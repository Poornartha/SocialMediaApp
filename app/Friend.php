<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $guarded = ['id'];

    public function friend() {
        return $this->hasOne(User::class, 'friend_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getUser() {
        return $this->user();
    }

}