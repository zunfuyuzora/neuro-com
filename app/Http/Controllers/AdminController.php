<?php

namespace App\Http\Controllers;

use App\Group;
use App\Member;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function group() {
        $groups = Group::all();
        return view('admin.group.index', ['groups'=>$groups]);
    }

    public function groupDetail(Group $group){
        $m = Member::where('group_id',$group->id)->get();
        return view('admin.group.detail', ['group'=>$group,'member'=>$m]);
    }

    public function user() {
        $user = User::all();
        return view('admin.user.index', ['users'=>$user]);
    }

    public function userDetail(User $user){
        $m = Member::where('user_id',$user->id)->get();
        return view('admin.user.detail', ['user'=>$user,'member'=>$m]);
    }
}
