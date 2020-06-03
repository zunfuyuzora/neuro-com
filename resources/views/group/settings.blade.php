@extends('extends.dashboard',['_pagename'=>'Settings','_backLink'=> route('group.show',$group_data->id)])


@section('main-content')

<div class="container d-flex flex-column justify-content-center mb-4">


    <div id="settings" class="p-4 mb-3 rounded shadow-sm bg-white">
        <div class="container">
            <div class="container">
                <h5 class="font-weight-bold">Group Detail</h5>
                <form action="{{route('group.update', $group_data->id)}}" method="POST" class="form-group">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-inline mb-4 justify-content-between">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="col-9 form-control" value="{{$group_data->name}}">
                    </div>
                    <div class="form-inline mb-4 align-items-start justify-content-between">
                        <label for="description" class="mt-2">Description</label>
                        <textarea type="text" id="description" name="description" class="col-9 form-control" rows="5">{{$group_data->description}}</textarea>
                    </div>
                    @if (Session::has('message'))
                        <p class="bg-primary border-radius-3 text-white px-2 text-small"><span>{{Session::get('message')}}</span></p>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-9 col-md-6">
                        <button type="submit" class="btn btn-primary form-control">Update</button>
                    </div>
                    </div>
                </form>
            </div>
            <form action="{{route('group.destroy', $group_data->id)}}" id="deleteGroup">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
            </form>
            <button type="submit" class="btn btn-sm btn-danger" form="deleteGroup">Delete Group</button>

        </div>
    </div>
        {{-- MEMBER SECTION --}}
        <div id="members">
            <div id="members-container" class="p-4 mb-3 rounded shadow-sm bg-white">

            <div class="container">
                <h5 class="font-weight-bold">Member List</h5>
                <div class="row">
                    <div class="form-group col-12 col-sm-7">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" id="memberSearch" placeholder="Search Member">
                            <div class="input-group-append">
                                <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col">
                        <button class="btn btn-primary form-control">Add New</button>
                    </div>
                </div>
            </div>
            <div class="container">

                @foreach ($members as $m)
                    
                <div class="row mb-4">
                    <div class="col overflow-hidden">
                        <div class="pic-avatar">
                            <img src="{{ asset('./images/user-1.jpeg') }}" alt="[Avatar]" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-6 py-2">
                        <div class="wrappers text-truncate">
                            <p class="h5 m-0">{{$m->user->full_name}}</p>
                            <p class="h6 m-0" style="color:gray">{{"@".$m->user->username}}</p>
                            <p class="h6 m-0 text-capitalize">{{$m->access}}</p>
                        </div>
                    </div>
                    <div class="col flex-center-ultra">
                    @if ($m->access != 'creator')
                        
                        <a href="#" class="text-danger">Delete</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            </div>

        </div>
</div>

@endsection