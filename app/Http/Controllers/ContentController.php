<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Member;
use App\Content;
use App\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($request->type == 'task'){
            $request->validate([
                'taskname'=> 'required',
                'personInCharge' => 'required',
                'description' => 'required',
                'board' => 'required',
                'group' => 'required',
            ]);
            
            $code = date("mds").rand(000,999);
            $idtask = "task".$code;
            $idprg = "prg".$code;

            Content::create([
                'id' => $idtask,
                'member_id' => $request->personInCharge,
                'board_id' => $request->board,
                'group_id' => $request->group,
                'head' => $request->taskname,
                'body' => $request->description,
                'type' => $request->type
            ]);

            Progress::create([
                'id' => $idprg,
                'content_id' => $idtask,
                'progress' => 'fresh'
            ]);

            return redirect(route('board.show', $request->board));
        }else if ($request->type == 'magazine') {
            $request->validate([
                'head' => 'required',
                'body' => 'required',
                'type' => 'required',
                'group' => 'required',
            ]);
            $code = date("mds").rand(000,999);
            $idmag = "mag".$code;
            $member = Member::where('group_id', $request->group)
            ->where('user_id', Auth::user()->id)->first();

            Content::create([
                'id' => $idmag,
                'member_id' => $member->id,
                'group_id' => $request->group,
                'head' => $request->head,
                'body' => $request->body,
                'type' => $request->type,
            ]);
            return redirect(route('mading.show',$idmag));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    public function mading(Content $content)
    {
        $comments =  Comment::where('content_id', $content->id)->get();
        return view('mading.show', ['mading' => $content, 'comments' => $comments]);
    }

    public function taskShow(Content $content)
    {
        $comments =  Comment::where('content_id', $content->id)->get();
        return view('task.show', ['task' => $content, 'comments' => $comments]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}
