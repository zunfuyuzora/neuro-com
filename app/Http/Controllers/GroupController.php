<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Member;
use App\Content;
use App\Board;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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

        $newGroup = Group::create([
            "id" => $idgroup,
            "name" => $request->name,
            "description" => $request->description,
        ]);

        $newMember = Member::create([
            "id" => $idmember,
            "user_id" => Auth::user()->id,
            "group_id" => $idgroup,
            "access" => "creator",
            "status" => true,
        ]);

        Content::create([
            "id" => $idcontent,
            "member_id" => $idmember,
            "group_id" => $idgroup,
            "head"=> "New Group Created",
            "body" => "Getting started. Here is what to know about groups",
            "type" => "magazine"
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
        return view('group.show', ['group_data' => $group, 'magazine' => $magazine,'board'=>$board]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $members = Member::where('group_id',$group->id)->get();
        return view('group.settings', ['group_data' => $group, 'members' =>  $members]);
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
}
