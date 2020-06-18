@extends('extends.dashboard',['_pagename'=>'Create Group','_backLink'=>route('home')])
@section('main-content')
<div class="container bg-white shadow">
    <form action="{{route('group.store')}}" method="post" class="p-4 form-group">
        @csrf
        <p class="h2">Start Creating New Group</p>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Group Name" autofocus value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" placeholder="What is this group about" autofocus value="{{old('description')}}" rows="6" style="resize: none;"></textarea>
        </div>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Create Group</button>
        </div>
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
@endsection
