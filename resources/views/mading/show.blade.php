@extends('extends.dashboard',['_pagename'=>'Group','_backLink'=>route('group.show', $mading->group_id),'groupId'=>$mading->group_id])

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

<div class=" d-flex flex-column justify-content-center bg-white shadow-sm mb-4">

    <div id="header">
    <div style="background-image: url('{{asset($mading->file->location)}}');background-size:cover">

        <div class="p-3 pb-3" style="background:rgba(0, 0, 0, 0.7)">
    @if (Auth::user()->username == $mading->member->user->username)            
        <div class="text-right">
            <a href="{{route('mading.edit',['group'=>$mading->group_id,'content'=>$mading->id])}}" title="Edit Magazine Page">Edit <i class="fa fa-edit"></i></a>
        </div>
    @endif
        <div class="display-3 text-white">{{$mading->head}} 
        </div>
        <p class="text-white">{{'@'.$mading->member->user->username}} |
        {{$mading->created_at}}</p>
        </div>

    </div>
        <p style="min-height: 200px" class="p-3">
            {!! nl2br(e($mading->body))!!}
        </p>
        <div class="text-center text-gray mb-2">__</div>
    </div>
</div>

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
                            <img src="{{asset('/images/user-1.jpeg')}}" alt="[avatar]">
                        </div>
                </div>
                <div class="col-9">
                    <form action="{{route('comment.store')}}" class="form-group" method="POST">
                        @csrf
                        <input type="hidden" name="content" value="{{$mading->id}}">
                        <input type="hidden" name="group_id" value="{{$mading->group_id}}">
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

@endsection