@extends('extends.template')
@push('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endpush
@section('screen')
<div id="body" class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-3 p-0">
            <div id="admin-sidebar" class="mb-3">
                <div class="profile">
                    <div class="container">
                    <div class="text-capitalize">{{Auth::user()->full_name}}</div>
                </div>
            </div>
                <div class="control-panel">
                    
                    <div class="list-group bg-transparent">
                        <a class="list-group-item">
                            Home
                        </a>
                        <a class="list-group-item">
                            Group
                        </a>
                        <a class="list-group-item">
                            User
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="main_content" class="col-sm-12 col-md-6 col-lg-9 p-0 ">

            <nav class="navbar navbar-dark bg-primary">
                <div class="container">
                    <div class="navbar-brand">Neuro Administrator</div>
                    <a href="" class="text-white">Logout</a>
                </div>
            </nav>
            
            @yield('main-content')

        </div>
    </div>
</div>

<div id="footer" class="bg-dark p-4 mt-5" style="bottom:0;">
    <div class="container text-white">
        <div class="text-center">copyright@2020</div>
    </div>
</div>
@endsection