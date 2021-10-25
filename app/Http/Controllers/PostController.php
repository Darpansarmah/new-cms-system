<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index() {

        // $this->authorize('view', Post::class);

        // $posts = Post::paginate(5);

        // $paginate = auth()->user()->posts()->paginate(5);

        $posts = Post::all();
        
        return view('admin.posts.index', ['posts'=>$posts]);

    }

    public function show($id) {

        $post = Post::findOrFail($id);
        // $post = Post::findBySlugOrFail($slug);
        $comments = $post->comments()->whereIsActive(1)->get();

    //     foreach($comments as $comment) {
    //     $replies = $comment->replies()->get();
    // }
        return view('blog-post', compact('post', 'comments'));

    }

    public function create(Post $post) {

        $this->authorize('create', Post::class);

        return view('admin.posts.create');
    
    }

    public function edit(Post $post) {

        // $this->authorize('view', $post);

        // if(!auth()->user()->userHasRole('admin')) {
        //     $this->authorize('update', $post);
        // }

            return view('admin.posts.edit', ['post'=>$post]);

    }

    public function update(Post $post) {

        // if(!auth()->user()->userHasRole('admin')) {
        //     $this->authorize('update', $post);
        // }

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'mimes:jpeg,png,bmp',
            'body'=>'required',
        ]);

            if(request('post_image')) {
                $inputs['post_image'] = request('post_image')->store('images');
                $post->post_image = $inputs['post_image'];
            }

            $post->title = $inputs['title'];
            $post->body = $inputs['body'];

            // auth()->user()->posts()->save($post);

            $this->authorize('update', $post);

              $post->save();

            // $post->update(); 

        Session::flash('update-msg', 'Post Number'. ' '.$post['id'] .' '.'Has Been Updated');

        return redirect()->route('posts.index');

    }

    public function store() {

        $this->authorize('create', Post::class);

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'mimes:jpeg,png,bmp',
            'body'=>'required',
        ]);

            if(request('post_image')) {
                $inputs['post_image'] = request('post_image')->store('images');
            }

            auth()->user()->posts()->create($inputs);

            Session::flash('postcreate-message', 'New Post with title'. ' '.$inputs['title'] .' '.'was Created');

            return redirect()->route('posts.index');

    }

    public function destroy(post $post) {

        // if(auth()->user()->id !== $post->user_id)

    if(!auth()->user()->userHasRole('admin')) {
        $this->authorize('delete', $post);
    }
    
        $post->delete();
        Session::flash('msg', 'The Post was Deleted');
        return back();
    }

}
