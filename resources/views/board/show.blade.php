@extends('extends.dashboard',['_pagename'=>'Board','_backLink'=>route('group.show', $board->group_id),'groupId'=>$board->group_id])

@section('card-content')

    {{-- 
        #####
        ##  WIDE SCREEN - GROUP SELECTION
        #####
        --}}
<div id="group-selection" class="rounded-md-10 d-none d-md-block shadow-sm bg-white">
    <div class="container py-3">
        <ul class="list-group">
            <li class="list-group-item ">
                <a href="#">Private</a>
            </li>
            <li class="list-group-item active">
                <a href="#">Grup #1</a>
            </li>
            <li class="list-group-item">
                <a href="#">Kelompok ABC</a>
            </li>
        </ul>
        <div class="form-group">
        <a href="#" class="my-2 btn btn-primary">
            Buat Grup
        </a></div>
    </div>
</div>
@endsection

@section('main-content')

<div class="container d-flex flex-column justify-content-center bg-white p-4 shadow-sm mb-4">

    <div id="header">
        <div class="row">
            <div class="col">
                <div class="h4 font-weight-bold">
                    <a href="#objective" title="Click to display objective" data-toggle="collapse" href="#objective" role="button" aria-expanded="false" aria-controls="objective">{{$board->name}}</a> 
                    <span class="text-small">
                    <a href="#editNameModal" role="button" data-toggle="modal"  aria-expanded="false" aria-controls="#editnameModal" title="Change Group Name"><i class="fa fa-edit"></a></i></span>
                </div>
            </div>
            <div class="col-3 text-right d-none">
                <form action="" class="form-group">
                    <select name="" id="" class="form-control">
                        <option value="" selected>All</option>
                        <option value="">My Task</option>
                    </select>
                </form>
            </div>
            <div class="col-3 text-right">
                <button class="btn btn-sm btn-danger" title="Delete Board Permanently">Remove <i class="fa fa-trash"></i></button>
                <form action="" class="d-none form-group">
                    <select name="" id="" class="form-control">
                        <option value="" selected>All</option>
                        <option value="">My Task</option>
                    </select>
                </form>
            </div>
            <div id="objective" class="col-12 collapse mb-3">
                <hr class="mb-3">
                <span style="color:gray;" >Objective:
                {!! nl2br(e($board->objective))!!} </span>
                <br>
                <div style="font-size: .8rem;color:gray;" class="mt-3">
                    Created By: {{$board->member->user->full_name}}
                </div>
            </div>
        </div>
        <hr >
    </div>

    <div id="editNameModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editNameModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h5" id="editModalLabel">Edit Board</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('board.update',['group'=>$board->group->id,'board'=> $board->id])}}" id="editBoard" class="form-group" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$board->name}}">
                        </div>
                        <div class="form-group">
                            <label for="objective">Objective</label>
                            <textarea name="objective" rows="4" style="resize: none" class="form-control">{{$board->objective}}</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" form="editBoard">Save Changes</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="task-container">
        <div class="container">
{{--  --}}
    {{--  --}}
    @if (count($task) >= 1)
        @foreach ($task as $t)
            
        <a href="{{route('task.show', ['group'=>$board->group->id,'content'=>$t->id])}}" class="d-block task-item mx-4 my-3" title="{{'Due Date :'.$t->progress->due_date}}">
            <div class="row no-gutters rounded overflow-hidden shadow-sm">
                <div class="col-2 rounded-left" style="height: 90px">
                    <img src="{{ asset($t->member->user->avatar) }}" alt="[Ava]" class="task-pic">
                </div>
            <div class="col-8 flex-middle-left py-2 px-3">
                <div class="wrappers text-truncate">
                    <p class="h6 m-0" style="color:gray">{{$t->member->user->full_name}}</p>
                    <p class="h5 m-0">{{$t->head}}</p>
                    <p class="m-0" style="font-size:.8rem;color:gray">{{$t->progress->due_date}}</p>
                </div>
            </div>
            <div class="col-2 rounded-right {{$t->progress->status}} flex-center-ultra text-white">
            <span class="text-capitalize">{{$t->progress->status}}</span></div>
            </div>
        </a>
        
        @endforeach
        @else
        <div class="text-center my-5">
            There is no task in this board
        </div>
    @endif
    {{--  --}}
    {{-- CREATE NEW TASK BUTTON --}}
        <div class="px-4 my-3">
            <div class="row justify-content-center">
                <a href="#createTaskModal" data-toggle="modal" aria-controls="#createTaskModal" role="button" aria-expanded="false" class="col-12 col-md-6 btn xbox create">Create New Task +</a> 
            </div>
        </div>
        </div>
    </div>

    <div id="createTaskModal" tabindex="-2" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-centered">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Task</h5>
                    <button class="close" data-dismiss="modal" aria-label="close" type="button">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('content.store', $board->group->id)}}" class="form-group" id="createTaskForm" method="POST">
                        <div class="row">
                            @csrf
                            <input type="hidden" name="type" value="task">
                            <input type="hidden" name="board" value="{{$board->id}}">
                            <input type="hidden" name="group" value="{{$board->group_id}}">
                            <div class="col-12 mb-2">
                                <label for="taskname">Task Name</label>
                                <input type="text" name="taskname" id="taskname" aria-label="Task Name" class="form-control">
                            </div>
                            <div class="col-12 mb-2">
                                <label for="personInCharge">Person in Charge</label>
                                <select name="personInCharge" id="personInCharge" class="form-control">
                                    @foreach ($member as $m)
                                        
                                    <option value="{{$m->id}}">
                                        {{$m->user->full_name." @".$m->user->username." [".$m->access."]"}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" id="description" aria-label="Description" class="form-control" contenteditable="false" style="resize:none" rows="5" ></textarea>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="due_date">Due Date</label>
                                <input type="date" name="due_date" id="due_date" aria-label="Task Name" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" form="createTaskForm">Create New Task</button>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection