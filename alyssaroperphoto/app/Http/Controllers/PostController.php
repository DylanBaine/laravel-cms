<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'frontPage']);
    }

    public function index()
    {
        $posts = Post::get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post;

        $post->title            = request('title');
        $post->slug             = request('slug');
        $post->featured_image   = request('featured_image');
        $post->content          = request('content');
        $post->type             = request('type');

        request('active') ? $active = 1 : $active = 0;
        $post->active           = $active;

        $post->save();

        return redirect('posts/'.$post->id.'/edit');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->title            = request('title');
        $post->slug             = request('slug');
        $post->featured_image   = request('featured_image');
        $post->content          = request('content');
        $post->type             = request('type');

        request('active') ? $active = 1 : $active = 0;
        $post->active           = $active;

        $post->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->back();
    }

    public function frontPage()
    {
        $post = Post::where('type', 'page')->where('slug', 'front-page')->first();

        return view('posts.show', compact('post'));
    }
}