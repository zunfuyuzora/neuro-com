<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Member;
use App\Content;
use App\File;
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
                'due_date' => 'required',
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
                'progress' => 'fresh',
                'due_date' => $request->due_date
            ]);

            return redirect(route('board.show', ['group'=>$request->route('group'),'board'=>$request->board]));
        }else if ($request->type == 'magazine') {
            $request->validate([
                'head' => 'required',
                'body' => 'required',
                'type' => 'required',
                'group' => 'required',
            ]);
            $code = date("mds").rand(000,999);
            $idmag = "mag".$code;
            $idfile = "file".$code;
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
            File::create([
                "id" => $idfile,
                "content_id" => $idmag,
                "filename" => "default.jpg",
                "location" => "storage/docs/default.jpg",
                "filetype" => "jpg",
            ]);

            return redirect(route('mading.show',['group'=>$request->route('group'),'content'=>$idmag]));
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

    /**
     * Display Magz Form
     * 
     */
    public function mading($group,Content $content)
    {
        $comments =  Comment::where('content_id', $content->id)->get();
        return view('mading.show', ['mading' => $content, 'comments' => $comments,'group'=>$group]);
    }
    /**
     * Display Magz Edit Form
     * 
     */
    public function madingEdit($group,Content $content)
    {
        return view('mading.edit', ['mading' => $content,'group'=>$group]);
    }
    /**
     * Handle Magz Update Processs
     * 
     */
    public function madingUpdate($group,Content $content, Request $request)
    {
        $request->validate([
            'head' => ['required', 'string','min:8'],
            'body' => ['required', 'string','min:8'],
        ]);
        $uid = $content->member->user->id;
        if($uid == Auth::user()->id){
            
        $content->head = $request->head;
        $content->body = $request->body;
        $content->save();

        $code = "updateMading";
        $message = "Magazine Update Successfull";

        }else{
            $code = "errorUpdateUpdate";
            $message = "There is an error in the server";
        }

        return redirect()->route('mading.edit', ['group'=>$group,'content' => $content])->with($code, $message);
    }

    /**
     * Handle Magz Edit Picture
     * 
     */
    public function madingPicture($group,Content $content,Request $request)
    {
        
        $request->validate([
            'picture' => 'mimes:jpeg,jpg,png|required|file|max:2000',
        ]);

        $uid = $content->member->user->id;
        if($uid == Auth::user()->id){

            $file = File::where('content_id',$content->id)->first();

            $ext = ".".$request->file('picture')->extension();
            $name = rand().$ext;

            $request->file('picture')->storeAs('public/docs',$name);
            
            $file->filename = $name;
            $file->filetype = $ext;
            $file->location = 'storage/docs/'.$name;
            $file->save();
            

            $code = "updatePicture";
            $message = "Profile Picture Updated Successfully";
        }else{
            $code = "errorUpdatePicture";
            $message = "Sorry, We've got an error in the server";
        }
        return redirect()->route('mading.edit', ['content' => $content,'group'=>$group])->with($code, $message);
    }

    /**
     * Handle Task Show Request
     * 
     */
    public function taskShow($group,Content $content)
    {
        $comments =  Comment::where('content_id', $content->id)->get();
        return view('task.show', ['task' => $content, 'comments' => $comments]);
    }

    /**
     * Handle Task Edit Form
     * 
     */
    public function taskEdit($group, Content $content)
    {
        return view('task.edit', ['group'=>$group,'task'=>$content]);
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
