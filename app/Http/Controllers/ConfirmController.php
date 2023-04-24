<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\Post;


class ConfirmController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        return view('confirm', ['user' => $user]);
    }

    public function makePost(Request $request)
    {
        $newPost = new Post;
    }
}
