<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PostType;

class PostTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['menu']);
    }

    public function menu()
    {
        return PostType::where('in_menu', 1)->where('active', 1)-orderBy('order_position', 'DESC')->get();
    }

    public function index()
    {
        return PostType::get();
    }

    public function create()
    {
        return view('posts.types');
    }

    public function store(Request $request)
    {
        $postType = new PostType;

        $postType->name         = request('name');
        $postType->slug         = request('slug');

        // $in_menu $on_front_page $active 

        request('in_menu') ? $in_menu = 1 : $in_menu = 0;
        $postType->in_menu      = $in_menu;

        request('on_front_page') ? $on_front_page = 1 : $on_front_page = 0;
        $postType->on_front_page = $on_front_page;

        request('active') ? $active = 1 : $active = 0;
        $postType->active        = $active;

        $postType->save();
    }

    public function update(Request $request, $id)
    {
        $postType = PostType::find($id);

        $postType->name         = request('name');
        $postType->slug         = request('slug');

        // $in_menu $on_front_page $active 

        request('in_menu') ? $in_menu = 1 : $in_menu = 0;
        $postType->in_menu      = $in_menu;

        request('on_front_page') ? $on_front_page = 1 : $on_front_page = 0;
        $postType->on_front_page = $on_front_page;

        request('active') ? $active = 1 : $active = 0;
        $postType->active        = $active;

        $postType->save();
    }

    public function destroy($id)
    {
        PostType::find($id)->delete();
    }
}
