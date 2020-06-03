<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Member;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "_group"=> "required",
            "name" => "required",
            "objective" => "required"
        ]);
        $x = Member::where('group_id', $request->_group)->where('user_id', Auth::user()->id)->first();

        $newBoard = Board::create([
            "member_id" => $x->id,
            "group_id" => $x->group_id,
            "name" => $request->name,
            "objective" => $request->objective,
        ]);

        return redirect()->route("board.show", $newBoard->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        return view('board.show', ['board'=>$board]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board)
    {
        $request->validate([
            "name" => "required",
            "objective" => "required"
        ]);
        
        $board->name = $request->name;
        $board->objective = $request->objective;
        $board->save();

        return redirect()->route("board.show", $board->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        //
    }
}
