@extends('extends.dashboard',['_pagename'=>'Create Group','_backLink'=>route('home')])
@section('main-content')
<div>
    <img src="{{asset($group->avatar)}}" style="height: 20vh; width: 100%;object-fit:cover" alt="">
</div>
<div class="container bg-white shadow">
    <div class="row">
        <div class="col-9">

            <div class="display-3">
                {{$group->name}}
            </div>
        </div>
        <div class="col">
            <form action="{{route('group.join',$group->id)}}" method="post" class="form-group text-right mt-2">
                @csrf
                <input type="hidden" name="join" value="true">
                <button type="submit" class="btn btn-primary">Join</button>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif 
            </form> 
        </div>
    </div>  
    <hr>
</div>
<div class="container bg-white py-3" style="color: gray">
    <p>
        Description: <br>
        {{$group->description}}
    </p>
    <hr>
    <?php $creator = $group->getMembers->where('access','creator')->first()->user; ?>
    <div class="container p-3">

    <div class="row">
        <div class="col-3 overflow-hidden">
            <div class="pic-avatar">
                <img src="{{ asset($creator->avatar) }}" alt="[Avatar]">
            </div>
        </div>
        <div class="col-6 py-2">
            <div class="wrappers text-truncate">
                <p class="h5 m-0">
                    {{$creator->full_name}}
                </p>
                <p class="h6 m-0" style="color:gray">{{"@".$creator->username}}</p>
            </div>
        </div>
    </div>
    
    </div>
</div>
@endsection
