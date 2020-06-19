<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Member;
use App\Content;
use App\Board;
use App\File;
use Illuminate\Support\Facades\URL;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //FOR ADMIN ONLY
    }

    /**
     * Check Membership of particular User
     *
     * @return \Illuminate\Http\Response
     */
    public function getMemberships($group_id)
    {
        $membership = Member::where('group_id', $group_id)
                            ->where('user_id', Auth::user()->id)
                            ->first();
        if(!$membership){
            return false;
        }else{
            return $membership;
        }
    }

    /**
     * Show Create Group Pages
     * 
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:30'],
            'description' => ['required', 'string', 'max:255']
        ]);
        $code = date("mds").rand(000,999);
        $idgroup = "grp".$code;
        $idmember = "mbr".$code;
        $idcontent = "mag".$code;
        $idfile = "file".$code;

        $newGroup = Group::create([
            "id" => $idgroup,
            "name" => $request->name,
            "description" => $request->description,
            "avatar" => "storage/docs/default.jpg"
        ]);

        Member::create([
            "id" => $idmember,
            "user_id" => Auth::user()->id,
            "group_id" => $idgroup,
            "access" => "creator",
            "status" => true,
        ]);

        $newMagz = Content::create([
            "id" => $idcontent,
            "member_id" => $idmember,
            "group_id" => $idgroup,
            "head"=> "New Group Created",
            "body" => "Getting started. Here is what to know about groups",
            "type" => "magazine"
        ]);

        File::create([
            "id" => $idfile,
            "content_id" => $idcontent,
            "filename" => "default.jpg",
            "location" => "storage/docs/default.jpg",
            "filetype" => "jpg",
        ]);

        return redirect()->route('group.show',$newGroup);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $magazine = Content::where('group_id', $group->id)->where('type','magazine')->get();
        $board = Board::where('group_id',$group->id)->get();

        $membership = $this->getMemberships($group->id);
        $task = Content::where('type', 'task')
                        ->where('member_id', $membership->id)->orderBy('created_at')->get();
        return view('group.show', ['group_data' => $group, 'magazine' => $magazine,'board'=>$board,'highlight'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $members = Member::where('group_id',$group->id)->orderBy('created_at')->get();
        $membership = $members->where('user_id', Auth::user()->id)->first();
        if($membership){
        return view('group.settings', [
            'group_data' => $group, 
            'members' =>  $members, 
            'user_membership'=> $membership]);
        }else{
            return redirect(route('home'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $membership = Member::where('group_id', $group->id)
                            ->where('user_id', Auth::user()->id)
                            ->first();
        if(!$membership){
            return redirect(route('home'));
        }
        $request->validate([
            'name' => ['required', 'string', 'max:30'],
            'description' => ['required', 'string', 'max:255']
        ]);

        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();

        return redirect()->route('group.settings', $group)->with("message","Group Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        dd($group);
    }

    /**
     * Group Chat Index Request
     * 
     */
    public function chat(Group $group)
    {
        $uid = Auth::user()->id;
        $member = Member::where('group_id', $group->id)->where('user_id', $uid)->first();
        return view('group.chat', ['group_data' => $group, 'member'=>$member]);
    }

    /**
     * Handle Invitation Link
     * 
     * 
     */
    public function invitation(Group $group)
    {
        return view('group.invitation', ['group'=>$group]);
    }

    /**
     * Handle Addition for New Member to Group
     * 
     */
    public function member(Group $group, Request $request) 
    {
        $code = date("mds").rand(000,999);
        $idmember = "mbr".$code;

        if($request->invitation){
            $request->validate([
                'userId' => 'required',
            ]);
            $n = Member::create([
                'id' => $idmember,
                'user_id' => $request->userId,
                'group_id' => $group->id,
                'access' => 'member',
                'status' => 1,
            ]);
            return redirect(route('group.show', $group->id));
        }else{
            $request->validate([
                'username' => 'required|regex:/(^@[A-Z]??)\w+/',
                'access' => 'required',
            ]);
            $usr = $request->username;
            $usr = str_replace("@","", $usr);
            $user = User::where('username', $usr)->first();
            if(!$user){
                return redirect(URL::previous());
            }
            $n = Member::create([
                'id' => $idmember,
                'user_id' => $user->id,
                'group_id' => $group->id,
                'access' => $request->access,
                'status' => 1,
            ]);
            return redirect(URL::previous());
            

        }
    }

    /**
     * Handle Member Removed
     * 
     */
    public function memberRemove(Group $group, Request $request)
    {
        $member = Member::where('id', $request->member_id)->first();
        $member->delete();
        return redirect(route('group.settings', $group->id));
    }

    /**
     * Handle Search For Group to Join
     * 
     */
    public function search(Request $request)
    {
        $request->validate([
            'group_id' => 'required',
        ]);
        $g = Group::where('id', $request->group_id)->first();
        if($g){
            //
            return redirect()->route('group.guest', $g->id);
        }else {
            return "not found";
        }
    }

    /**
     * Handle to give view for non-member of group 
     *  
    */
    public function showGuest(Group $group)
    {
        $uid = Auth::user()->id;
        $membership = Member::where("group_id",$group->id)
                        ->where("user_id",$uid)->first();
        if(!$membership){
            return view('group.guest', ['group'=>$group]);
        }else{
            return redirect()->route("group.show",$group->id);
        }
    }

    /**
     * Handle join request to a group
     * 
     */
    public function joinGroup(Group $group, Request $request)
    {
        $request->validate([
            'join' => "required",
        ]);

        $code = date("mds").rand(000,999);
        $idmember = "mbr".$code;

        $group_id = $group->id;
        $user_id = Auth::user()->id;
        $n = Member::create([
            'id' => $idmember,
            'user_id' => $user_id,
            'group_id' => $group_id,
            'access' => "member",
            'status' => 0,
        ]);
        return redirect(URL::previous());
    }
}
