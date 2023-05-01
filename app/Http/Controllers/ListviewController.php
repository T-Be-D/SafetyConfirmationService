<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class ListviewController extends Controller
{
    public function index()
    {

        $items = User::Join('posts', 'users.studentID', '=', 'posts.studentID')
            ->select('*')->get();

        $class =  User::select('class')->get();

        // $items = DB::select('select * from users ');
        return view('listview', compact('items', 'class'));
    }

    public function search(Request $request)
    {
        $class =  User::select('class')->get();

        if ($request->nameID) {
            $items = User::Join('posts', 'users.studentID', '=', 'posts.studentID')
                ->select('*')
                ->where('users.studentID', '=', (int)$request->nameID)
                ->orwhere('users.name', '=', $request->nameID)
                ->get();

            return view('listview', compact('items', 'class'));
        }
        if ($request->class) {
            $items = User::Join('posts', 'users.studentID', '=', 'posts.studentID')
                ->select('*')
                ->where('users.class', '=', $request->class)
                ->where('posts.status', '=', $request->status)
                ->get();
            return view('listview', compact('items', 'class'));
        }
        $items = User::Join('posts', 'users.studentID', '=', 'posts.studentID')
            ->select('*')
            ->where('posts.status', '=', $request->status)
            ->get();

        return view('listview', compact('items', 'class'));
    }
}
