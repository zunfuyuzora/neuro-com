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
                    <a class="nav-link nav-link-icon" href="#">
                        <span class="nav-link-inner-text">Profil</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#">
                        <span class="nav-link-inner-text">Modul</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#!" onClick="document.getElementById('logout_form').submit()">Keluar</a>
                        <form action="
                        {{-- {{route('logout')}} --}}
                        " class="d-none hidden" method="POST" id="logout_form">
                            @csrf
                            <button type="submit" id="logout_action" class="hidden d-none">logout</button>
                        </form>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div id="body" class="container mt-md-4">
    <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-4 p-0">
            <div id="profile_part" class="bg-transparent mb-3">
                <div class="profile-card shadow-sm rounded-md-10">
                    <div class="mask">
                        <div class="navigate container py-3">
                            <div class="wrapper d-flex justify-content-between">
                                <div class="">
                                    @if ($_pagename != 'Home')
                                    <a href="{{URL()->previous()}}" class="text-white">
                                        <i class="fa fa-angle-left"></i> Back</a>
                                    @endif
                                </div>
                                <div class=""><a href="#" class="text-white text-right">{{ $_pagename}}</a></div>
                            </div>
                        </div>
                        <div class="profile-header container bg-white 
                        {{$_pagename != 'Home' ? 'd-none' : ''}} d-md-block">
                            <div class="profile-content text-center d-flex d-md-block mx-2">
                                <img src="{{ asset('/images/user-1.jpeg') }}
                                {{-- {{ asset('img/'.Auth::user()->avatar)}} --}}" alt="" class="rounded-circle position-relative" style="margin-top: -60px">
                                <div class="wrapper md-text-center-from-left  ml-2 py-4" >
                                <p class="h5 md-h3 font-weight-bold m-0">
                                    {{-- {{Auth::user()->username}} --}}
                                    Akane Georgia
                                </p>
                                <span class="color: #7A7A7A">
                                    {{-- {{Auth::user()->username}} --}}
                                    @akane153
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="group-selection" class="rounded-md-10 d-none d-md-block shadow-sm bg-white">
                <div class="container py-3">
                    <ul class="list-group">
                        <li class="list-group-item active">
                            <a href="#">Private</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Grup #1</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Kelompok ABC</a>
                        </li>
                    </ul>
                    <a href="#" class="my-2 btn btn-primary form-control">
                        Buat Grup
                    </a>
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
    <div class="container text-white">
        <a href="#" class="text-white">Backup Database</a><br>
        <a href="#" class="text-white">Generate Report</a>
    </div>
</div>
@endsection