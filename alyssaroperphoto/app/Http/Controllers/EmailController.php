<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Email $email)
    {
        //
    }

    public function edit(Email $email)
    {
        //
    }

    public function update(Request $request, Email $email)
    {
        //
    }

    public function destroy(Email $email)
    {
        //
    }
}
