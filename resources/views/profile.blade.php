@extends('extends.dashboard2',['_pagename'=> 'Profil'])

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

<div class="container d-flex flex-column justify-content-center mb-4">


    <div id="metadata" class="p-4 mb-3 rounded shadow-sm bg-white">
        <div class="container">
            <div class="container">
                <h5 class="font-weight-bold">Data Pribadi</h5>
                <form action="" class="form-group">
                    <div class="form-inline mb-4 justify-content-between">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" class="col-9 form-control" value="Grup #1">
                    </div>
                    <div class="form-inline mb-4 justify-content-between">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="col-9 form-control" value="RAHASIA">
                    </div>
                    <div class="form-inline mb-4 align-items-start justify-content-between">
                        <label for="status" class="mt-2">Status</label>
                        <textarea type="text" id="status" name="status" class="col-9 form-control" rows="5">Grup kelompok 1 Kelas 12 IPA C</textarea>
                    </div>
                    
                    <div class="form-inline mb-4 justify-content-between d-none">
                        <label for="type">Tipe Akun</label>
                        <div class="col-9 p-0">
                            <span class="badge badge-primary">Premium</span>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-9 col-md-6">
                        <button type="submit" class="btn btn-primary form-control">Perbarui</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        {{-- PROFILE PICTURE SECTION --}}
        <div id="profile-picture">
            <div id="settings-container" class="p-4 mb-3 rounded shadow-sm bg-white">

            <div class="container">
                <h5 class="font-weight-bold">Foto Profil</h5>
                <form action="/home" id="uploadAvatar" class="form-group mb-2">
                    <input type="file" name="avatar" class="file-input-custom w-100" id="avatar">
                </form>
                <p style="color:gray">Ukuran file maksimal 1 MB.</p>
                <div class="text-right">
                <button type="submit" class="btn btn-primary" form="uploadAvatar">Perbarui</button>
                </div>
            </div>
            </div>

        </div>
</div>

@endsection