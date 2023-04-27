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

        return view('confirm', ['user' => $user]);
    }

    public function makePost(Request $request)
    {
        $user = Auth::user();
        
        $newPost = new Post;
        $newPost->place = $request->place;
        $newPost->studentID = $user->studentID;
        $newPost->message = $request->textbox;
        $newPost->save();
        print_r($newPost);

        return view('confirm', ['user' => $user]);
       // return redirect('listview');
    }
}
