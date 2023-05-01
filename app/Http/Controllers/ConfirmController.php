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

        $newPost = new Post;
        $newPost->place = $request->place;
        $newPost->studentID = $user->studentID;

        if ($request->textbox != null) {
            $newPost->message = $request->textbox;
        } else {
            $newPost->message = 'ブランク';
        }

        if ($request->safe == 'on') {
            $newPost->status = 1;
        } else {
            $newPost->status = 0;
        }

        $newPost->save();

        // print_r($user->id);
        //return view('confirm', ['user' => $user]);
        return redirect('listview');
    }
}
