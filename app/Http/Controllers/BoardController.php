<?php

namespace App\Http\Controllers;

use App\Board;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Member;
use App\Content;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ADMIN PRIVELEGES
        return view('board.board');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Group $group)
    {
        $request->validate([
            "_group"=> "required",
            "name" => "required",
            "objective" => "required"
        ]);
        $x = Member::where('group_id', $request->_group)->where('user_id', Auth::user()->id)->first();

        $newBoard = Board::create([
            "id" => "brd".date("mds").rand(000,999),
            "member_id" => $x->id,
            "group_id" => $x->group_id,
            "name" => $request->name,
            "objective" => $request->objective,
        ]);

        return redirect()->route("board.show", ['group'=>$group,'board' =>$newBoard->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show($group, Board $board)
    {
        $member = Member::where('group_id', $board->group_id)->get();
        $task = Content::where('type', 'task')->where('board_id', $board->id)->get();
        return view('board.show', ['board'=>$board,'member'=>$member,'task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update($group,Board $board, Request $request)
    {
        $request->validate([
            "name" => "required",
            "objective" => "required"
        ]);
        
        $board->name = $request->name;
        $board->objective = $request->objective;
        $board->save();

        return redirect()->route("board.show", ["group"=>$group,"board"=>$board->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy($group, Board $board)
    {
        $group_id = $board->group_id;
        $task = Content::where('type', 'task')
                ->where('board_id', $board->id)
                ->get('id')->toArray();
        Content::destroy($task);
        $board->delete();

        return redirect()->route('group.show', $group_id);
    }
}
