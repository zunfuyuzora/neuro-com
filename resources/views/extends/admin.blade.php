@extends('extends.template')
@push('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endpush
@section('screen')
<div id="body" class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-2 p-0">
            <div id="admin-sidebar">
                <div>
                <div class="profile d-flex flex-column align-items-center">
                    <div class="pic-avatar">
                        <img src="{{asset(Auth::user()->avatar)}}" alt="" srcset="">
                    </div>
                    <div class="text-capitalize font-weight-bold mt-2">{{Auth::user()->full_name}}</div>
                </div>
                <div class="control-panel">
                    <div class="list-group bg-transparent">
                        <a href="{{route('admin.dashboard')}}" class="list-group-item
                        {{$_page == "home" ? "active" : ""}}
                        ">
                            Home
                        </a>
                        <a href="{{route('admin.group')}}" class="list-group-item
                        {{$_page == "group" ? "active" : ""}}
                        ">
                            Group
                        </a>
                        <a href="{{route('admin.user')}}" class="list-group-item
                        {{$_page == "user" ? "active" : ""}}
                        ">
                            User
                        </a>
                        <a href="{{route('admin.profile', Auth::user()->id)}}" class="list-group-item
                        {{$_page == "profile" ? "active" : ""}}
                        ">
                            Profile
                        </a>
                        <a href="{{route('admin.new.create')}}" class="list-group-item
                        {{$_page == "newAdmin" ? "active" : ""}}
                        ">
                            New Admin
                        </a>
                    </div>
                </div>
            </div>
                <div class="control-panel">
                    <div class="list-group bg-transparent">
                        <a href="#" onclick="document.getElementById('logout_form').submit()" class="list-group-item">
                            Logout
                        </a>
                        <form action="
                        {{route('logout')}}
                        " class="d-none hidden" method="POST" id="logout_form">
                            @csrf
                            
                            <button type="submit" id="logout_action" class="hidden d-none">logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="main_content" class="col-sm-12 col-md-9 col-lg-10 p-0 ">

            <nav id="admin-dashboard" class="navbar navbar-dark bg-primary">
                <div class="container">
                        <span class="text-white"> Administrator
                        </span>
                </div>
            </nav>
            <div id="content">
                
                @yield('main-content')
            </div>

        </div>
    </div>
</div>
@endsection