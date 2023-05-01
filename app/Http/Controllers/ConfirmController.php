<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;



class ConfirmController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        print_r($user->name);
        return view('confirm', ['user' => $user]);
    }

    public function makePost(Request $request)
    {
        $user = Auth::user();

        $post = Post::where('studentID', $user->studentID)->first();

        if (!$post) {
            $post = new Post;
            $post->studentID = $user->studentID;
        }

        $post->place = $request->place;
        $post->message = $request->textbox ?? 'ブランク';
        $post->status = $request->safe == 'on' ? 1 : 0;
        $post->save();

        return redirect('listview');
    }
}
