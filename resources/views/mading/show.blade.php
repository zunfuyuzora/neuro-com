@extends('extends.dashboard',['_pagename'=>'Group','_backLink'=>route('group.show', $content->group_id),'groupId'=>$content->group_id])

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
    <div style="background-image: url('{{asset($content->file->location)}}');background-size:cover">

        <div class="p-3 pb-3" style="background:rgba(0, 0, 0, 0.7)">
    @if (Auth::user()->username == $content->member->user->username)            
        <div class="text-right">
            <a href="{{route('mading.edit',['group'=>$content->group_id,'content'=>$content->id])}}" title="Edit Magazine Page">Edit <i class="fa fa-edit"></i></a>
        </div>
    @endif
        <div class="display-3 text-white">{{$content->head}} 
        </div>
        <p class="text-white">{{'@'.$content->member->user->username}} |
        {{$content->created_at}}</p>
        </div>

    </div>
        <p style="min-height: 200px" class="p-3">
            {!! nl2br(e($content->body))!!}
        </p>
        <div class="text-center text-gray mb-2">__</div>
    </div>
</div>
@include('extends.comment')
@endsection