<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\User;
use App\Board;
use App\Group;
use App\Content;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $a = User::all()->count();
        $b = Group::all()->count();
        $c = Board::all()->count();
        $d = Comment::all()->count();
        $eTask = Content::where('type','task')->count();
        $eMagazine = Content::where('type','magazine')->count();
        $eModule = Content::where('type','module')->count();
        
        return view('admin.dashboard', [
            'user'=>$a,
            'group'=>$b,
            'board'=>$c,
            'comment'=>$d,
            'magazine'=>$eMagazine,
            'task'=>$eTask,
            'module'=>$eModule
        ]);
    }

}
