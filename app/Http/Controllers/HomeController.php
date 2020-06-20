<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\User;
use App\Board;
use App\Group;
use App\Content;
use App\Comment;
use App\Message;
use Illuminate\Database\Eloquent\Collection;
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
        $uid = Auth::user()->id;
        $memberships = Member::where('user_id', $uid)->get();
        $allTask = new Collection();
        $allBoard = new Collection();

        foreach ($memberships as $member) {
            $task = Content::where('type','task')
                            ->where('member_id', $member->id)->get(); 
                                     
            $board = Board::where('member_id', $member->id)->get();
            
            $allTask = $allTask->merge($task);
            $allBoard = $allBoard->merge($board);

        }
        return view('home', ['highlight'=>$allTask,'board'=>$allBoard]);
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
        $m = Message::all()->count();
        
        return view('admin.dashboard', [
            'user'=>$a,
            'group'=>$b,
            'board'=>$c,
            'comment'=>$d,
            'magazine'=>$eMagazine,
            'task'=>$eTask,
            'module'=>$eModule,
            'message'=>$m
        ]);
    }


}
