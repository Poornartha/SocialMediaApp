<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    //
    public function index(User $user) {
        $posts = $user -> posts() -> with(['user', 'likes']) -> paginate(20);
        return view('users.index', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
