@extends('extends.dashboard',['_pagename'=>'Create Group','_backLink'=>route('home')])
@section('main-content')
<div class="container bg-white py-3">
    <p class="text-center">
        Group Not Found
        <br>

        
            <a href="#searchGroup" data-target="#searchGroup" data-toggle="modal" class="my-2 btn btn-outline-primary">
                Search again
            </a>
    </p>
</div>
@endsection
