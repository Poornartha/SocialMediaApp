<?php

namespace App;

use App\Friend;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username',
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
    ];

    public function posts() {
        return $this->hasMany(Post::class); 
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function friends() {
        return $this->hasMany(Friend::class);
    }

    public function addFriend(User $user) {


        if ($this->friends()->where('friend_id', $user->id)->first()){
            return  null;
        }


        return $this->friends()->save(
            new Friend([
                'friend_id' => $user->id,
            ])
        );
    }

    public function isFriend(User $user) {
        if ($this->friends()->where('friend_id', $user->id)->first()){
            return  true;
        } 
        return false;
    }

    public function listFriends() {
        return $this->friends();
    }
}
