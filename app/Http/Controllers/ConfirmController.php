<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;



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

        $post = Post::where('studentID', $user->studentID)->first();

        if (!$post) {
            $post = new Post;
            $post->studentID = $user->studentID;
        }

        $validatedData = $request->validate([
            'textbox' => 'nullable|max:50',
        ], [
            'textbox.max' => 'メッセージ フィールドは 50 文字を超えることはできません。',
        ]);

        $post->place = $request->place;
        $post->message = $request->textbox ?? '未入力';
        $current_user = User::find($user->studentID);
        $current_user->status = $request->safe == 'on' ? 1 : 0;
        $current_user->save();
        $post->save();

        return redirect('listview');
    }
}
