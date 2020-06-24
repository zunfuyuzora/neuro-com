<?php

namespace App\Http\Controllers;

use App\Group;
use App\Member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle Group Index
     * 
     */
    public function group() {
        $groups = Group::all();
        return view('admin.group.index', ['groups'=>$groups]);
    }

    /**
     * Handle Detail of Group
     * 
     */
    public function groupDetail(Group $group){
        $m = Member::where('group_id',$group->id)->get();
        return view('admin.group.detail', ['group'=>$group,'member'=>$m]);
    }

    /**
     * Handle User Index
     * 
     */
    public function user() {
        $user = User::all();
        return view('admin.user.index', ['users'=>$user]);
    }

    /**
     * Handle Detail of User
     * 
     */
    public function userDetail(User $user){
        $m = Member::where('user_id',$user->id)->get();
        return view('admin.user.detail', ['user'=>$user,'member'=>$m]);
    }

    /**
     * Hanlde Admin Profile Page
     * 
     */
    public function profile(User $user)
    {
        if(Auth::user()->id == $user->id){
            return view('admin.profile',['user'=>$user]);
        }
        return view('dashboard');
    }

    /**
     * Handle Create Admin page
     * 
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Handle New Admin Data
     * 
     */
    public function save(Request $request)
    {
        $request->validate([
            'first_name'=>'required|string|max:100',
            'last_name'=>'required|string|max:100',
            'email'=>'required|string|email|unique:users',
            'username'=>'required|string|min:6|unique:users'
        ]);
        $id = "usr".date("mds").rand(000,999);
        
        User::create([
            'id' => $id,
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make('sementara'),
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'full_name' => $request['first_name']." ".$request['last_name'],
            'bio' => "Hello, administrator here",
            'level'=> "admin",
        ]);

        $code = "success";
        $message = "New Admin has been created with default password: \"sementara\"";
        
        return redirect()->route('admin.new.create')->with($code, $message);
    }
}
