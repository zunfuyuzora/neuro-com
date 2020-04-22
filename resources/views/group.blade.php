@extends('extends.dashboard2',['_pagename'=>'Home'])
@section('main-content')

<div class="container d-md-none">
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

<div class="container d-flex flex-column justify-content-center bg-white py-4 shadow-sm mb-4">

    <div id="group-control" class="mb-4 text-center">
        <a href="#" class="btn btn-info">Atur Grup</a>
        <a href="#" class="btn btn-primary">Buat Mading</a>
    </div>

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
                        <p class="h5 m-0 text-white">Evaluasi Kinerja</p>
                        <p class="m-0">Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/mading-1.jpg') }}" alt="2nd Slide" class="d-block w-100"> 
                    <div class="carousel-caption text-left">
                        <p class="h5 m-0 text-white">Daftar Perusahaan</p>
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


    <div id="highlight" class="mb-4">
            <p class="h5">Highlight</p>
            <div class="container m-0 p-0">
                <div class="bg-primary">
                    <div>Tugas #1</div>
                    <p class="h6">Board : Kerja Lapangan</p>
                </div>
            </div>
            
        </div>

</div>

@endsection