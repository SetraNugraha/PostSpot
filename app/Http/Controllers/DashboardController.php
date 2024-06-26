<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('users.dashboard-index');
    }

    public function posts()
    {
        $posts = Post::orderBy('id', 'DESC')->where('user_id', Auth::id())->paginate(6);

        return view('users.dashboard-posts', ['posts' => $posts]);
    }

    public function profile()
    {
        return view('users.dashboard-profile');
    }


    public function showUserPost(User $user)
    {
        $userPost = $user->posts()->orderBy('id', 'DESC')->paginate(6);

        return view('users.posts', ['posts' => $userPost, 'user' => $user]);
    }
}
