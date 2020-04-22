@extends('extends.dashboard2',['_pagename'=>'Home'])

@section('card-content')

    {{-- 
        #####
        ##  WIDE SCREEN - GROUP SELECTION
        #####
        --}}

<div id="group-selection" class="rounded-md-10 d-none d-md-block shadow-sm bg-white">
    <div class="container py-3">
        <ul class="list-group">
            <li class="list-group-item ">
                <a href="#">Private</a>
            </li>
            <li class="list-group-item active">
                <a href="#">Grup #1</a>
            </li>
            <li class="list-group-item">
                <a href="#">Kelompok ABC</a>
            </li>
        </ul>
        <div class="form-group">
        <a href="#" class="my-2 btn btn-primary">
            Buat Grup
        </a></div>
    </div>
</div>
@endsection

@section('main-content')

<div class="container d-flex flex-column justify-content-center bg-white p-4 shadow-sm mb-4">

    <div id="header">
        <div class="row">
            <div class="col">
                <div class="h4 font-weight-bold">Biologi 
                    <span class="text-small"><a href="#"><i class="fa fa-edit"></a></i></span>
                </div>
            </div>
            <div class="col-3 text-right">
                <form action="" class="form-group">
                    <select name="" id="" class="form-control">
                        <option value="" selected>All</option>
                        <option value="">My Task</option>
                    </select>
                </form>
            </div>
        </div>
        <hr >
    </div>

    <div id="task-container">
        <div class="container">
{{--  --}}
        <a href="#" class="d-block task-item mx-4 my-3">
            <div class="row no-gutters rounded overflow-hidden shadow-sm">
                <div class="col-2 rounded-left">
                    <img src="{{ asset('./images/user-6.jpg') }}" alt="[Ava]" class="img-fluid position-relative" style="top:0;bottom:0;left:0;right:0;">
                </div>
            <div class="col-8 flex-middle-left py-2 px-3">
                <div class="wrappers text-truncate">
                    <p class="h6 m-0" style="color:gray">George Andalusia</p>
                    <p class="h5 m-0">Pembagian Tugas</p>
                </div>
            </div>
            <div class="col-2 rounded-right my-status-success flex-center-ultra text-white">
                    <span class="percentage">100</span></div>
            </div>
        </a>
{{--  --}}
        <a href="#" class="d-block task-item mx-4 my-3">
                <div class="row no-gutters rounded overflow-hidden shadow-sm">
                    <div class="col-2 rounded-left">
                        <img src="{{ asset('./images/user-1.jpeg') }}" alt="[Ava]" class="img-fluid position-relative" style="top:0;bottom:0;left:0;right:0;">
                    </div>
                <div class="col-8 flex-middle-left py-2 px-3">
                    <div class="wrappers text-truncate">
                        <p class="h6 m-0" style="color:gray">Anda</p>
                        <p class="h5 m-0">Rangkuman Materi</p>
                    </div>
                </div>
                <div class="col-2 rounded-right my-status-process flex-center-ultra text-white">
                        <span class="percentage">20</span></div>
                </div>
            </a>
    {{--  --}}
        <a href="#" class="d-block task-item mx-4 my-3">
                <div class="row no-gutters rounded overflow-hidden shadow-sm">
                    <div class="col-2 rounded-left">
                        <img src="{{ asset('./images/user-2.jpg') }}" alt="[Ava]" class="img-fluid position-relative" style="top:0;bottom:0;left:0;right:0;">
                    </div>
                <div class="col-8 flex-middle-left py-2 px-3">
                    <div class="wrappers text-truncate">
                        <p class="h6 m-0" style="color:gray">Ban</p>
                        <p class="h5 m-0">Materi #3</p>
                    </div>
                </div>
                <div class="col-2 rounded-right my-status-process flex-center-ultra text-white">
                        <span class="percentage">90</span></div>
                </div>
            </a>
    {{--  --}}
        <a href="#" class="d-block task-item mx-4 my-3">
                <div class="row no-gutters rounded overflow-hidden shadow-sm">
                    <div class="col-2 rounded-left">
                        <img src="{{ asset('./images/user-2.jpg') }}" alt="[Ava]" class="img-fluid position-relative" style="top:0;bottom:0;left:0;right:0;">
                    </div>
                <div class="col-8 flex-middle-left py-2 px-3">
                    <div class="wrappers text-truncate">
                        <p class="h6 m-0" style="color:gray">Ban</p>
                        <p class="h5 m-0">Materi #2</p>
                    </div>
                </div>
                <div class="col-2 rounded-right my-status-success flex-center-ultra text-white">
                        <span class="percentage">100</span></div>
                </div>
            </a>
    {{--  --}}
        <a href="#" class="d-block task-item mx-4 my-3">
                <div class="row no-gutters rounded overflow-hidden shadow-sm">
                    <div class="col-2 rounded-left">
                        <img src="{{ asset('./images/user-2.jpg') }}" alt="[Ava]" class="img-fluid position-relative" style="top:0;bottom:0;left:0;right:0;">
                    </div>
                <div class="col-8 flex-middle-left py-2 px-3">
                    <div class="wrappers text-truncate">
                        <p class="h6 m-0" style="color:gray">Ban</p>
                        <p class="h5 m-0">Materi #1</p>
                    </div>
                </div>
                <div class="col-2 rounded-right my-status-success flex-center-ultra text-white">
                        <span class="percentage">100</span></div>
                </div>
            </a>
    {{--  --}}
    {{--  --}}
        <a href="#" class="d-block task-item mx-4 my-3">
            <div class="row no-gutters rounded overflow-hidden shadow-sm">
                <div class="col-2 rounded-left">
                    <img src="{{ asset('./images/user-3.jpg') }}" alt="[Ava]" class="img-fluid position-relative" style="top:0;bottom:0;left:0;right:0;">
                </div>
            <div class="col-8 flex-middle-left py-2 px-3">
                <div class="wrappers text-truncate">
                    <p class="h6 m-0" style="color:gray">Mina</p>
                    <p class="h5 m-0">Presentasi</p>
                </div>
            </div>
            <div class="col-2 rounded-right my-status-success flex-center-ultra text-white">
                    <span class="percentage">100</span></div>
            </div>
        </a>
    {{--  --}}
    {{-- CREATE NEW TASK BUTTON --}}
        <div class="px-4 my-3">
            <div class="row justify-content-center">
                <a href="#" class="col-12 col-md-6 btn form-control xbox create">
                            Buat Tugas Baru +
                </a> 
            </div>
        </div>
        </div>
    </div>

</div>

@endsection