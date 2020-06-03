@extends('extends.dashboard',['_pagename'=>'Home'])
@section('card-content')

    {{-- 
        #####
        ##  WIDE SCREEN - GROUP SELECTION
        #####
        --}}

<div id="group-selection" class="rounded-md-10 d-none d-md-block shadow-sm bg-white">
    <div class="container py-3">
        @if ($groups)
            
        <ul class="list-group"> 
            @foreach ($groups as $g)
            <li class="list-group-item">
                <a href="#">{{$g->group->name}}</a>
            </li>
            
        @endforeach
        </ul>
        @endif
        <div class="form-group">
        <a href="#" class="my-2 btn btn-primary">
            Create Group
        </a></div>
    </div>
</div>
@endsection

@section('main-content')

    {{-- 
        #####
        ##  SMALL SCREEN - GROUP SELECTION
        #####
        --}}

<div id="sm-group-selection" class="container d-md-none">
    <div class="text-right">
        <form action="" class="form-group">
            <div class="row">
                <div class="col-6">
                    <a href="#" class="btn btn-primary form-control">
                        Create Group
                    </a>
                </div>
                <div class="col-6">
                    <select name="" id="" class="form-control">
                        <option value="">Private</option>
                        <option value="" selected>Grup #1</option>
                        <option value="">Kelompok ABC</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container d-flex flex-column justify-content-center bg-white py-4 shadow-sm mb-4">

    {{-- 
        #####
        ##  GROUP ACTION BUTTON
        #####
        --}}

    <div id="group-control" class="mb-4 text-center">
        <a href="#" class="btn btn-info">Atur Grup</a>
        <a href="#" class="btn btn-primary">Buat Mading</a>
    </div>

    {{-- 
        #####
        ##  BOARD LIST 
        #####
        --}}


    <div id="board-list" class="mb-4">
        <p class="h5">Board</p>
            <div class="container horizontal-scrollable"> 
                <div class="row text-center"> 
                    <a href="#" class="col-6 col-md-4 box" style="background:#34B697">
                        <div class="mx-2 text-truncate text-white">
                            Tim Pemasaran 1 232
                        </div>
                    </a> 
                    <a href="#" class="col-6 col-md-4 box" style="background:#BD3232">
                        <div class="mx-2 text-truncate text-white">
                            Kerja Lapangan
                        </div>
                    </a> 
                    <a href="#" class="col-6 col-md-4 box create">
                        Buat baru
                    </a> 
                </div> 
            </div> 
    </div>

@endsection