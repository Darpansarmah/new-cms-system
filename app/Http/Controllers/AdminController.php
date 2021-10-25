<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\Reply;

class AdminController extends Controller
{
    //
    public function index() {

        $postsCount = Post::count();
        $usersCount = User::count();
        $commentsCount = Comment::count();
        $repliesCount = Reply::count();

        return view ('admin.index', compact('postsCount', 'usersCount', 'commentsCount', 'repliesCount'));
    }
    
}
