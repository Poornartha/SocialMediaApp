<?php

namespace App\Http\Controllers;

use App\User;
use App\Friend;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function addFriend(User $user) {
        $friend = auth()->user()->addFriend($user);

        if($friend === null) {
            return response()->json(['message' => 'Already a friend'], 500);
        }

        return back();
    } 

    public function isFriend(User $user) {
        $status = auth()->user()->isFriend($user);
        return $status;
    }

    public function dashboard() {

        $friends = auth()->user()->listFriends;
        $friend_arr = [];
        foreach ($friends as $friend) {
            array_push($friend_arr, User::findOrFail($friend->friend_id));
        };
        // dd($friend_arr);
        return view('dashboard', [
            'friends' => $friend_arr,
        ]);
    }

}
