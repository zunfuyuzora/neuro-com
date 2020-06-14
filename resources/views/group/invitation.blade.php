@extends('extends.template',['_pagename'=>'Settings','_backLink'=> route('group.show',$group->id)])

@section('screen')

<div id="invitation" class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh">


    <div id="settings" class="p-4 mb-3 rounded shadow-sm bg-white">
        <div class="container">
            <div class="container text-center">
                <h1 class="font-weight-bold">Group Invitation</h1>
                <h3>You're invited to join "{{$group->name}}" via Invitation Link </h3>
                @if (Auth::check())
                    Click Button Below to Proceed 
                    <form action="{{route('group.newMember', $group->id)}}" method="POST" class="my-3 form-group">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <input type="hidden" name="invitation" value="true">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-9 col-md-6">
                            <button type="submit" class="btn btn-primary form-control">Join Group</button>
                        </div>
                        </div>
                    </form>
    
                    @else 
                    You're need to Login with an account first
                    <a href="{{route('login')}}" class="btn btn-primary">Login</a>
                @endif
            </div>
            <a href="{{route('landing')}}">Return to Main Page</a>
        </div>
    </div>
</div>

@endsection