<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function editProfile()
    {
        return view('users.dashboard-editProfile');
    }

    public function updateProfile(Request $request, User $user)
    {
        // Validate
        $profileField = $request->validate([
            'username' => ['sometimes', 'max:50'],
            'profile_image' => ['nullable', 'file', 'max:2000', 'mimes:png,jpg,jpeg,webp']
        ]);

        // Check image if exist
        $path = $user->profile_image ?? null;

        // Check if User input file
        if ($request->hasFile('profile_image')) {

            // if user already have profile image -> delete
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // save new image
            $path = Storage::disk('public')->put('profile_images', $request->profile_image);
        }

        // update profile
        $user->update([
            'username' => $request->username,
            'profile_image' => $path
        ]);

        //  Redirect 
        return redirect()->route('dashboard.profile')->with('success', 'Profile Updated.');
    }



    public function showUserPost(User $user)
    {
        $userPost = $user->posts()->orderBy('id', 'DESC')->paginate(6);

        $totalPost = $user->posts()->count();

        return view('users.posts', [
            'posts' => $userPost,
            'user' => $user,
            'totalPost' => $totalPost
        ]);
    }
}
