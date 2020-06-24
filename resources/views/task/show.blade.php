@extends('extends.dashboard',['_pagename'=>'Task','_backLink'=> route('board.show', [$content->board->group->id,$content->board_id]),'groupId'=>$content->board->group_id])


@section('main-content')

<div class="container d-flex flex-column justify-content-center mb-4">


    <div id="task-container" class="p-4 mb-3 rounded shadow-sm bg-white">
        <div class="container">
            <div class="row no-gutters justify-content-between overflow-hidden mb-3">
            
                <div class="col-8 flex-middle-left py-2">
                <div class="wrappers text-truncate">
                    <p class="h6 m-0" style="color:gray">{{$content->member->user->full_name}}</p>
                    <p class="h5 m-0">{{$content->head}}</p>
                </div>
                </div>

                <div class="col-2 rounded {{$content->progress->status}} flex-center-ultra text-white">
                        <span class="text-capitalize">{{$content->progress->status}}</span></div>
            </div>

            <div class="row mb-2">
                <div class="col-3">
                    <div class="pic-avatar text-center d-flex d-md-block mx-2">
                            <img src="{{ asset($content->member->user->avatar) }}" alt="[avatar]">
                    </div>
                </div>

                <div class="col-9">
                    <div class="wrappers">
                    <p class="h6" style="color:gray">Due Date:</p>
                    <input type="date" id="due_date" class="form-control mb-2" disabled value="{{ date("Y-m-d", strtotime($content->progress->due_date))}}">
                    <input type="time" id="due_time" class="form-control mb-2" disabled value="{{ date("H:i", strtotime($content->progress->due_date))}}">
                    <p class="h6" style="color:gray">Detail:</p>
                    <textarea name="description" id="desc" cols="30" rows="5" class="form-control mb-2" readonly>{{$content->body}}</textarea>
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
                                <form action="{{route('upload.attachment',$content->id)}}" class="form-group" enctype="multipart/form-data" method="POST">
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
                    <a href="{{route('task.edit', ['group'=>$content->group_id,'content'=>$content->id])}}" class="btn btn-primary">Update Task</a>
                </div>

            @endif
            </div>
            @if (Session::has('success'))
            <div class="text-center bg-primary mt-4 text-white">
                {{Session::get('success')}}
            </div>
            @endif
        </div>
    @include('extends.comment')
</div>

@endsection