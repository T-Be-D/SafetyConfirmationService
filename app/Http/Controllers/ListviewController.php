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
        $message = "none";
        //IDか名前の条件
        if ($request->nameID) {
            $items = User::Join('posts', 'users.studentID', '=', 'posts.studentID')
                ->select('*')
                ->where('users.studentID', '=', (int)$request->nameID)
                ->orwhere('users.name', '=', $request->nameID)
                ->get();

            return view('listview', compact('items', 'class','message'));
        }

        //クラスとステータスの条件


        //クラスだけの条件
        if ($request->class) {
            $message = "class";
            $items = User::Join('posts', 'users.studentID', '=', 'posts.studentID')
                ->select('*')
                ->where('users.class', '=', $request->class)
                ->get();
            return view('listview', compact('items', 'class','message'));
        }

        //ステータスだけの条件
        if($request->status){
            $status = $request->status - 1;
            $message = 'status' . $status;
            $items = User::Join('posts', 'users.studentID', '=', 'posts.studentID')
                ->select('*')
                ->where('posts.status', '=', $status)
                ->get();
            return view('listview', compact('items', 'class','message'));
        }
        //何もなし
        $items = User::Join('posts', 'users.studentID', '=', 'posts.studentID')
            ->select('*')->get();

        return view('listview', compact('items', 'class','message'));
    }
}
