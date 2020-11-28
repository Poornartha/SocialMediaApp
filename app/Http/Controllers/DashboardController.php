<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {

    $friends = auth()->user()->listFriends();
        $friend_arr = [];
        foreach ($friends as $friend) {
            array_push($friend_arr, User::findOrFail($friend->friend_id));
        };
        dd($friend_arr);
        return view('dashboard', [
            'friends' => $friends,
        ]);
    }
}
