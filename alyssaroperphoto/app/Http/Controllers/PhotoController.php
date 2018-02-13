<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Photo::orderBy('id', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $photo = new Photo;
        $photo->name = request('name');
        $photo->slug = request('slug');

        $photo->save();
    }

    public function update(Request $request, $id)
    {
        $photo = Photo::find($id);

        $photo->name = request('name');

        $photo->save();
    }

    public function destroy($id)
    {
        Photo::find($id)->delete();
    }
}