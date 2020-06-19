@extends('extends.dashboard',['_pagename'=>'Task','_backLink'=> route('board.show', [$task->board->group->id,$task->board_id]),'groupId'=>$task->board->group_id])


@section('main-content')

<div class="container d-flex flex-column justify-content-center mb-4">


    <div id="task-container" class="p-4 mb-3 rounded shadow-sm bg-white">
        <div class="container">
            <div class="row no-gutters justify-content-between overflow-hidden mb-3">
            
                <div class="col-8 flex-middle-left py-2">
                <div class="wrappers text-truncate">
                    <p class="h6 m-0" style="color:gray">{{$task->member->user->full_name}}</p>
                    <p class="h5 m-0">{{$task->head}}</p>
                </div>
                </div>

                <div class="col-2 rounded {{$task->progress->status}} flex-center-ultra text-white">
                        <span class="text-capitalize">{{$task->progress->status}}</span></div>
            </div>

            <div class="row mb-2">
                <div class="col-3">
                    <div class="pic-avatar text-center d-flex d-md-block mx-2">
                            <img src="{{ asset($task->member->user->avatar) }}" alt="[avatar]">
                    </div>
                </div>

                <div class="col-9">
                    <div class="wrappers">
                    <p class="h6" style="color:gray">Due Date:</p>
                    <textarea name="descipription" id="desc" cols="30" rows="1" class="form-control mb-2" readonly>{{$task->progress->due_date}}</textarea>
                    <p class="h6" style="color:gray">Detail:</p>
                    <textarea name="description" id="desc" cols="30" rows="5" class="form-control mb-2" readonly>{{$task->body}}</textarea>
                    <p class="h6" style="color:gray">Attachment</p>
                    </div>
                    <div id="attachment">
                        <div class="pill">
                            <table class="table table-sm table-borderless">
                                <tbody>

                                @if(isset($files))
                                @if (count($files)>0)
                                    
                                    @foreach ($files as $f)
                                        <tr>
                                            <td>
                                            <a href="{{asset($f->location)}}" target="_blank">
                                                {{$f->filename}} </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr class="text-center">
                                    No attachment
                                </tr>
                                @endif
                                @endif
                            </tbody>

                            </table>
                            @if ($access)
                                <form action="{{route('upload.attachment',$task->id)}}" class="form-group" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="form-group">
                                    <input type="file" name="file" id="file" class="form-control">
                                    <div style="color:gray">
                                        Filetype should .pdf/.docx/.doc/.ppt or images (.jpg/.jpeg/.png)<br>
                                        File maximum 10 MB
                                    </div>
                                    @if ($errors->any())
                                    <ul class="bg-danger text-white">
                                        @foreach ($errors->all() as $e)
                                        <li>
                                            {{$e}}
                                        </li>   
                                        @endforeach
                                    </ul>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-warning">Upload File</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if ($access)
                
                <div class="text-right">
                    <a href="{{route('task.edit', ['group'=>$task->group_id,'content'=>$task->id])}}" class="btn btn-primary">Update Task</a>
                </div>

            @endif
            </div>
            @if (Session::has('success'))
            <div class="text-center bg-primary mt-4 text-white">
                {{Session::get('success')}}
            </div>
            @endif
        </div>
        {{-- COMMENTARY SECTION --}}
    <div id="commentary">
        <div class="container">
            <h6 class="font-weight-bold">Comment</h6>
        </div>

        <div id="commentary-container" class="p-4 mb-3 rounded shadow-sm bg-white">
            @if (count($comments) > 0)
                
            @foreach ($comments as $c)
                
            <div class="row comment my-4">
                <div class="col">
                    <div class="pic-avatar">
                        <img src="{{asset('/images/user-2.jpg')}}" alt=" [Avatar]" >
                    </div>
                </div>
                <div class="col-9">
                    <p class="h6 font-weight-bold" style="color:gray">{{$c->member->user->first_name}}</p>
                    <p>{{$c->text}}</p>
                </div>
            </div>
            @endforeach
            @else
            <div class="text-center">No Comment yet</div>
            @endif
        </div>

        <div id="addComment" class="p-4 mb-3 rounded shadow-sm bg-white">
            <div class="row">

                <div class="col">
                        <div class="pic-avatar">
                            <img src="{{asset(Auth::user()->avatar)}}" alt="[avatar]">
                        </div>
                </div>
                <div class="col-9">
                    <form action="{{route('comment.store')}}" class="form-group" method="POST">
                        @csrf
                        <input type="hidden" name="content" value="{{$task->id}}">
                        <input type="hidden" name="group_id" value="{{$task->group_id}}">
                        <textarea name="comment" class="form-control mb-2" id="commentcontainer" cols="30" rows="5" placeholder="Type your comment here"></textarea>
                        <div class="form-group row">
                            <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Send</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection