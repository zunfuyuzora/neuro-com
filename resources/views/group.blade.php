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
            <li data-target="#carousel-mading" data-slide-to="1"></li>
            <li data-target="#carousel-mading" data-slide-to="2"></li>
        </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/wallpaper.jpg') }}" alt="1st Slide" class="d-block"> 
                    <div class="carousel-caption text-left">
                        <p class="h5 m-0 text-white">PERHATIAN! Jadwal Pertemuan</p>
                        <p class="m-0">Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/mading-1.jpg') }}" alt="2nd Slide" class="d-block w-100"> 
                    <div class="carousel-caption text-left">
                        <p class="h5 m-0 text-white">Pembagian Tugas</p>
                        <p class="m-0">Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/mading-1.jpg') }}" alt="2nd Slide" class="d-block w-100"> 
                    <div class="carousel-caption text-left">
                        <p class="h5 m-0 text-white">Review Tugas</p>
                        <p class="m-0">Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
            {{-- <a class="carousel-control-prev" href="#carousel-mading" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>  --}}
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
                    <a href="#" class="col-6 col-md-4 box" style="background:#34B697">
                        <div class="mx-2 text-truncate text-white">
                            Biologi
                        </div>
                    </a> 
                    <a href="#" class="col-6 col-md-4 box" style="background:#BD3232">
                        <div class="mx-2 text-truncate text-white">
                            Sejarah
                        </div>
                    </a> 
                    <a href="#" class="col-6 col-md-4 box create">
                        Buat baru
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
            <table class="table table-sm table-borderless">
                <tr>
                    <td class="text-truncate">
                        <a href="#">frank144</a>     
                    </td>
                    <td class="text-truncate">
                        Modul Penelitian Tentang Siklus Kehidupan
                    </td>
                    <td>
                        <a href="#">Download/View</a>
                    </td>
                </tr>
                <tr>
                    <td class="text-truncate">
                        <a href="#">Stussy</a>     
                    </td>
                    <td class="text-truncate">
                        Sejarah Peradaban
                    </td>
                    <td>
                        <a href="#">Download/View</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection