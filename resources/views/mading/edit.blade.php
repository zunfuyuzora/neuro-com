@extends('extends.dashboard',['_pagename'=>'Group','_backLink'=>route('mading.show', ['group'=>$mading->group_id,'content'=>$mading->id]),'groupId'=>$mading->group_id])
@section('main-content')

<div class=" d-flex flex-column justify-content-center bg-white shadow-sm mb-4">

    <div id="header">
    <div style="background-image: url('{{asset($mading->file->location)}}');background-size:cover">

        <div class="p-3 pb-5" style="background:rgba(0, 0, 0, 0.7)">
        <div class="text-right">
            <a href="#" class="text-danger">Remove <i class="fa fa-remove"></i></a>
        </div>
        <div class="display-3 text-white">{{$mading->head}} 
        </div>
        <p class="text-white">{{'@'.$mading->member->user->username}} |
        {{$mading->created_at}}</p>
        </div>

    </div>
        <p class="container px-5">
            <form action="{{route('mading.update',['group'=>$group,'content'=>$mading->id])}}" class="container form-group" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-inline mb-4 justify-content-between">
                    <label for="head">Head</label>
                    <input type="text" id="head" name="head" class="col-9 form-control" value="{{$mading->head}}">
                </div>
                <div class="form-inline mb-4 align-items-start justify-content-between">
                    <label for="body" class="mt-2">Body</label>
                    <textarea type="text" id="body" name="body" class="col-9 form-control" rows="5">{{$mading->body}}</textarea>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-9 col-md-6">
                    <button type="submit" class="btn btn-primary form-control">Update</button>
                </div>
                </div>
            </form>

        @if (Session::has('updateMading'))
        <div class="bg-primary text-white text-center">
            {{Session::get('updateMading')}}
        </div>
        @endif
        @if (Session::has('errorUpdateMading'))
        <div class="bg-danger text-white text-center">
            {{Session::get('errorUpdateMading')}}
        </div>
        @endif
        </p>
    </div>
</div>

<div class="d-flex flex-column justify-content-center bg-white shadow-sm mb-4">

<div id="profile-picture">
    <div id="settings-container" class="my-3 mb-3 rounded shadow-sm bg-white">

    <div class="container">
        <h5 class="font-weight-bold">Change Magazine Picture</h5>
        <form action="{{route('mading.picture', ['group'=>$group,'content'=>$mading->id])}}" enctype="multipart/form-data" method="POST" id="uploadPicture" class="form-group my-4">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="file" name="picture" class="file-input-custom w-100" id="picture">
            <p style="color:gray">Maximum file upload 2 MB (in JPG/PNG format)</p>
            <div class="text-right">
            <button type="submit" class="btn btn-primary" form="uploadPicture">Change Picture</button>
            </div>
        </form>
        @if (Session::has('updatePicture'))
        <div class="bg-primary text-white text-center">
            {{Session::get('updatePicture')}}
        </div>
        @endif
        @if (Session::has('errorUpdatePicture'))
        <div class="bg-danger text-white text-center">
            {{Session::get('errorUpdatePicture')}}
        </div>
        @endif

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
    </div>
    </div>

</div>

@endsection