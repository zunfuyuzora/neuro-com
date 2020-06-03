@extends('extends.dashboard',['_pagename'=>"group",'_backLink'=>route('home')])

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
                        Buat Grup
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

<div class="container d-flex flex-column justify-content-center bg-white p-4 shadow-sm mb-4">

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
        ##  MADING
        #####
        --}}

    <div id="mading" class="mb-4">
        <div id="carousel-mading" class="carousel slide" data-ride="carousel"
        style="">
        <ol class="carousel-indicators ball">
            <li data-target="#carousel-mading" data-slide-to="0" class="active"></li>
            @if (count($magazine)<1)
            @for ($i=1;$i< count($magazine);i)
            <li data-target="#carousel-mading" data-slide-to="{{$i}}"></li>
            @endfor
            @endif

        </ol>
            <div class="carousel-inner">
                @if (count($magazine)<1)
                <div class="carousel-item active">
                    <img src="{{ asset('images/wallpaper.jpg') }}" alt="1st Slide" class="d-block"> 
                    <div class="carousel-caption text-left">
                        <p class="m-0">Create New Magazine</p>
                    </div>
                </div>
                @else
                @foreach ($magazine as $m)
                
                <div class="carousel-item active">
                    <img src="{{ asset('images/wallpaper.jpg') }}" alt="1st Slide" class="d-block"> 
                    <div class="carousel-caption text-left">
                        <p class="m-0">{{$m->caption}}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <a class="carousel-control-next" href="#carousel-mading" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="position-relative">

        </div>
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
                    @if ($boards)
                    <a href="#" class="col-6 col-md-4 box" style="background:#34B697">
                        <div class="mx-2 text-truncate text-white">
                            Biologi
                        </div>
                    </a> 
                    @endif
                    <a href="#" class="col-6 col-md-4 box create">
                        Create New
                    </a> 
                </div> 
            </div> 
    </div>

    {{-- 
        #####
        ##  HIGHLIGHT 
        #####
        --}}

    <div id="highlight" class="mb-4">
        <p class="h5">Highlight</p>
        <div class="container my-3 p-0">
            {{-- Item highlight --}}
            <div class="py-2 px-3 mb-3 rounded" style="background-color:#34B697">
                <a href="#" class="d-block m-2 py-2 px-3 bg-white text- text-dark">Rangkuman Materi</a>
                <p class="h6 mx-2 font-weight-bold text-truncate text-white">Biologi</p>
            </div>
            {{--  --}}

            <div class="py-2 px-3 mb-3 rounded" style="background-color:#BD3232">
                <a href="#" class="d-block m-2 py-2 px-3 bg-white text-truncate text-dark">Presentasi</a>
                <p class="h6 mx-2 font-weight-bold text-truncate text-white">Sejarah</p>
            </div>
        </div>
    </div>

    {{-- 
        #####
        ##  MODULE 
        #####
        --}}

    <p class="h5">Modul</p>
    <div class="container my-3 p-0">
        <div class="border py-2 px-3">
            <table class="table table-sm table-borderless" style="table-layout: fixed;">
                <tr>
                    <td class="text-truncate w-25">
                        <a href="#">frank144</a>     
                    </td>
                    <td class="text-truncate w-50">
                        Modul Penelitian Tentang Siklus Kehidupan
                    </td>
                    <td class="text-right">
                        <a href="#">Download</a>
                    </td>
                </tr>
                <tr>
                    <td class="text-truncate w-25">
                        <a href="#">Stussy</a>     
                    </td>
                    <td class="text-truncate w-50">
                        Sejarah Peradaban
                    </td>
                    <td class="text-right">
                        <a href="#">Download</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection