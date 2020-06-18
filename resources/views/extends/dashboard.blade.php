@extends('extends.template')

@section('screen')
<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">
            {{-- <img src="{{ asset('images/sample-logo.png')}}" alt=""> --}}
            Neuro
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-primary">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="">
                            Dashboard
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#">
                        <span class="nav-link-inner-text">Board</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{route('profile', Auth::user()->id)}}">
                        <span class="nav-link-inner-text">Profile</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#">
                        <span class="nav-link-inner-text">Modul</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#!" onClick="document.getElementById('logout_form').submit()">Keluar</a>
                        <form action="
                        {{route('logout')}}
                        " class="d-none hidden" method="POST" id="logout_form">
                            @csrf
                            
                            <button type="submit" id="logout_action" class="hidden d-none">logout</button>
                        </form>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div id="body" class="container mt-md-4" style="min-height: 80vh">
    <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-4 p-0">
            <div id="profile_part" class="bg-transparent mb-3">
                <div class="profile-card shadow-sm rounded-md-10">
                    <div class="mask">
                        <div class="navigate container py-3">
                            <div class="wrapper d-flex justify-content-between">
                                <div class="">
                                    @if ($_pagename != 'Home')
                                    
                                    <a href="{{$_backLink}}" class="text-white">
                                        <i class="fa fa-angle-left"></i> Back</a>
                                    @endif
                                </div>
                                
                                @if ($_pagename == 'group')
                                <div class=""><a href="{{route('group.settings', $group_data->id)}}" title="Group Settings" class="text-white text-right"><i class="fa fa-cog"></i></a></div>
                                @else
                                <div class=""><a class="text-white text-right">{{ $_pagename}}</a></div>
                                @endif
                            </div>
                        </div>
                        <div class="profile-header container bg-white 
                        {{$_pagename != 'Home' ? 'd-none' : ''}} d-md-block">
                            <div class="profile-content text-center d-flex d-md-block mx-2">
                                <a href="{{route('profile', Auth::user()->id)}}" class="d-flex justify-content-center">
                                    <div class="pic-avatar" style="margin-top:-55px">
                                        <img src="{{ asset(Auth::user()->avatar)}}" alt="[Avatar]">
                                    </div>
                                </a>
                                {{-- <a href="{{route('profile', Auth::user()->id)}}" title="My Profile" class="">
                                    <img src="{{ asset(Auth::user()->avatar)}}" alt="" class="rounded-circle position-relative" style="margin-top: -60px">
                                </a> --}}
                                <div class="wrapper md-text-center-from-left  ml-2 py-4" >
                                <p class="h5 md-h3 font-weight-bold m-0 text-capitalize">
                                    {{Auth::user()->full_name}}
                                </p>
                                <span class="color: #7A7A7A">
                                    {{"@".Auth::user()->username}}
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="group-selection" class="rounded-md-10 d-none d-md-block shadow-sm bg-white">
                <div class="container py-3">
                    <h5>Group List</h5>
                    @if ($groups)
                    <ul class="list-group"> 
                        @foreach ($groups as $g)
                        <li class="list-group-item {{
                            isset($groupId) ? ($groupId == $g->group->id ? "active" : "") : ""
                        }}">
                            <a href="{{route('group.show',$g->group->id)}}">{{$g->group->name}}</a>
                        </li>
                    @endforeach
                    
                    </ul>

                    @else

                    <div class="text-center my-3">

                        Not joined any group
                    </div>
                    @endif
                    <div class="text-center">

                    <a href="{{route('group.create')}}" class="my-2">
                        Join a Group
                    </a>or
                    <a href="{{route('group.create')}}" class="my-2 btn btn-sm btn-outline-primary">
                        Create Group
                    </a>

                    </div>
                </div>
            </div>
        </div>
        <div class=" col"></div>
        <div id="main_content" class="col-sm-12 col-md-6 col-lg-7 p-0 ">

            @yield('main-content')

        </div>
    </div>
</div>

<div id="footer" class="bg-dark p-4 mt-5" style="bottom:0;">
    <div class="container text-white text-center">
        Copyright &copy; 2020
    </div>
</div>
@endsection