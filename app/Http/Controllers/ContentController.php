<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Member;
use App\Content;
use App\File;
use App\Group;
use App\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{

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
     * Display Magz Form
     * 
     */
    public function mading($group,Content $content)
    {
        $comments =  Comment::where('content_id', $content->id)->get();
        return view('mading.show', ['content' => $content, 'comments' => $comments,'group'=>$group]);
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
            'picture' => 'mimes:jpeg,jpg,png|required|file|max:5000',
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
        $files = File::where('content_id', $content->id)->orderBy('created_at','asc')->get();
        $comments =  Comment::where('content_id', $content->id)->get();
        $access = $content->member->user->id == Auth::user()->id ? true : false;

        return view('task.show', ['content' => $content, 'comments' => $comments, 'files'=>$files,'access'=>$access]);
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
     * Handle task update 
     * 
     */
    public function taskUpdate($group, Content $content, Request $request)
    {
        $request->validate([
            'task'=> 'required',
            'description' => 'required',
            'status' => 'required',
            'due_date' => 'required',
        ]);
        
        $content->head = $request->task;
        $content->body = $request->description;

        $progress = Progress::where('content_id',$content->id)->first();
        $progress->status = $request->status;
        $progress->due_date = $request->due_date;
        try {
            DB::beginTransaction();
            DB::commit();

            $content->save();
            $progress->save();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        return redirect()->route('task.show', ['group'=>$group,'content'=>$content->id])->with('success', 'Task Updated Successfully');
    }

    /**
     * Handle Module Upload
     * 
     */
    public function uploadModule($group, Request $request)
    {
        $request->validate([
            'module'=>'required|file|max:40000|mimes:pdf,docx,doc,ppt,pptx,png,jpg,jpeg',
            'head'=>'required|string',
        ]);

        try {
            DB::beginTransaction();
            DB::commit();
            $member = Member::where("group_id",$group)
                        ->where('user_id',Auth::user()->id)->first();

            $code = date("mds").rand(000,999);
            $id = "mod".$code;
            $idfile = "file".$code;

            Content::create([
                'id' => $id,
                'member_id' => $member->id,
                'group_id' => $group,
                'head' => $request->head,
                'body' => $request->file('module')->getClientOriginalName(),
                'type' => "module",
            ]); 
    
            $ext = ".".$request->file('module')->extension();
            $name = $code."-".$request->file('module')->getClientOriginalName();
    
            $request->file('module')->storeAs('public/docs/',$name);
    
            File::create([
                "id" => $idfile,
                "content_id" => $id,
                "filename" => $name,
                "location" => "storage/docs/".$name,
                "filetype" => $ext,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        return redirect()->route('group.show',$group);
    }

    /**
     * Handle Module Remove
     * 
     */
    public function removeModule($group, Request $request)
    {
        $request->validate([
            'module_id'=>"required",
        ]);
        $member = Member::where("group_id",$group)
                    ->where('user_id',Auth::user()->id)->first();
        if($member){
            $content = Content::where('id', $request->module_id)->first();
            $file = File::where('content_id', $content->id)->first();
            $file->delete();
            $content->delete();
        }
        return redirect()->route('group.show', $group);
    }
}
