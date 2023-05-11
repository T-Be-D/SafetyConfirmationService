<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class ListviewController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        //print_r($user);
        $items = Post::rightJoin('users', 'users.studentID', '=', 'posts.studentID')
            ->select('*')->orderBy('users.studentID', 'desc')->get();

        $class =  User::select('class')->get();

        // $items = DB::select('select * from users ');
        return view('listview', compact('items', 'class', 'user'));
    }

    public function search(Request $request)
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        $class =  User::select('class')->get();
        $message = "none";
        //IDか名前の条件
        if ($request->nameID) {
            $items = Post::RightJoin('users', 'users.studentID', '=', 'posts.studentID')
                ->select('*')
                ->where('users.studentID', '=', (int)$request->nameID)
                ->orwhere('users.name', '=', $request->nameID)
                ->get();

            return view('listview', compact('items', 'class', 'message'));
        }

        //クラスとステータスの条件
        if ($request->class && $request->status) {
            $message = "double";
            $status = $request->status - 1;
            $items = Post::rightJoin('users', 'users.studentID', '=', 'posts.studentID')
                ->select('*')
                ->where('users.class', '=', $request->class)
                ->where('users.status', '=', $status)
                ->get();

            return view('listview', compact('items', 'class', 'message'));
        }

        //クラスだけの条件
        if ($request->class) {

            $message = "class";
            $items = Post::rightJoin('users', 'users.studentID', '=', 'posts.studentID')
                ->select('*')
                ->where('users.class', '=', $request->class)
                ->get();
            return view('listview', compact('items', 'class', 'message'));
        }

        //ステータスだけの条件
        if ($request->status) {
            $status = $request->status - 1;
            $message = 'status' . $status;
            $items = Post::rightJoin('users', 'users.studentID', '=', 'posts.studentID')
                ->select('*')
                ->where('users.status', '=', $status)
                ->get();
            return view('listview', compact('items', 'class', 'message'));
        }
        //何もなし
        $items = Post::rightJoin('users', 'users.studentID', '=', 'posts.studentID')
            ->select('*')->get();

        return view('listview', compact('items', 'class', 'message', 'user'));
    }
}
