@extends('extends.dashboard2',['_pagename'=>'Pengaturan Grup'])

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


    <div id="settings" class="p-4 mb-3 rounded shadow-sm bg-white">
        <div class="container">
            <div class="container">
                <h5 class="font-weight-bold">Detail Grup</h5>
                <form action="" class="form-group">
                    <div class="form-inline mb-4 justify-content-between">
                        <label for="groupName">Nama Grup</label>
                        <input type="text" id="groupName" name="groupName" class="col-9 form-control" value="Grup #1">
                    </div>
                    <div class="form-inline mb-4 justify-content-between">
                        <label for="groupCode">Kode Grup</label>
                        <input type="text" id="groupCode" name="groupCode" class="col-9 form-control" value="RAHASIA">
                    </div>
                    <div class="form-inline mb-4 align-items-start justify-content-between">
                        <label for="groupDescription" class="mt-2">Deskripsi</label>
                        <textarea type="text" id="groupDescription" name="groupDescription" class="col-9 form-control" rows="5">Grup kelompok 1 Kelas 12 IPA C</textarea>
                    </div>
                    <div class="form-inline mb-4 justify-content-between">
                        <label for="visibility">Visibilitas</label>
                        <div class="col-9 p-0">
                        <select name="visibility" id="visibility" class="form-control">
                            <option value="">Privat</option>
                            <option value="">Publik</option>
                        </select>
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
        {{-- MEMBER SECTION --}}
        <div id="members">
            <div id="members-container" class="p-4 mb-3 rounded shadow-sm bg-white">

            <div class="container">
                <h5 class="font-weight-bold">Daftar Anggota</h5>
                <div class="row">
                    <div class="form-group col-12 col-sm-7">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" id="memberSearch" placeholder="Cari anggota">
                            <div class="input-group-append">
                                <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col">
                        <button class="btn btn-primary form-control">Tambahkan</button>
                    </div>
                </div>
            </div>
            <div class="container">

                <div class="row mb-2">
                    <div class="col overflow-hidden">
                        <div class="pic-avatar">
                            <img src="{{ asset('./images/user-1.jpeg') }}" alt="[Avatar]">
                        </div>
                    </div>
                    <div class="col-6 py-2">
                        <div class="wrappers text-truncate">
                            <p class="h5 m-0">Akane Georgia</p>
                            <p class="h6 m-0" style="color:gray">@akane153</p>
                        </div>
                    </div>
                    <div class="col flex-center-ultra">
                        <a href="#" class="text-danger">Hapus</a>
                    </div>
                </div>
                {{--  --}}


                <div class="row mb-2">
                        <div class="col overflow-hidden">
                            <div class="pic-avatar">
                                <img src="{{ asset('./images/user-2.jpg') }}" alt="[Avatar]">
                            </div>
                        </div>
                        <div class="col-6 py-2">
                            <div class="wrappers text-truncate">
                                <p class="h5 m-0">Ban</p>
                                <p class="h6 m-0" style="color:gray">@banditX1</p>
                            </div>
                        </div>
                        <div class="col flex-center-ultra">
                            <a href="#" class="text-danger">Hapus</a>
                        </div>
                    </div>

                <div class="row mb-2">
                        <div class="col overflow-hidden">
                            <div class="pic-avatar">
                                <img src="{{ asset('./images/user-6.jpg') }}" alt="[Avatar]">
                            </div>
                        </div>
                        <div class="col-6 py-2">
                            <div class="wrappers text-truncate">
                                <p class="h5 m-0">George Andalusia</p>
                                <p class="h6 m-0" style="color:gray">@stron99</p>
                            </div>
                        </div>
                        <div class="col flex-center-ultra">
                            <a href="#" class="text-danger">Hapus</a>
                        </div>
                    </div>

                <div class="row mb-2">
                        <div class="col overflow-hidden">
                            <div class="pic-avatar">
                                <img src="{{ asset('./images/user-3.jpg') }}" alt="[Avatar]">
                            </div>
                        </div>
                        <div class="col-6 py-2">
                            <div class="wrappers text-truncate">
                                <p class="h5 m-0">Mina</p>
                                <p class="h6 m-0" style="color:gray">@minanee21</p>
                            </div>
                        </div>
                        <div class="col flex-center-ultra">
                            <a href="#" class="text-danger">Hapus</a>
                        </div>
                    </div>

                <div class="row mb-2">
                        <div class="col overflow-hidden">
                            <div class="pic-avatar">
                                <img src="{{ asset('./images/user-5.jpg') }}" alt="[Avatar]">
                            </div>
                        </div>
                        <div class="col-6 py-2">
                            <div class="wrappers text-truncate">
                                <p class="h5 m-0">Stussy</p>
                                <p class="h6 m-0" style="color:gray">@stussy_</p>
                            </div>
                        </div>
                        <div class="col flex-center-ultra">
                            <a href="#" class="text-danger">Hapus</a>
                        </div>
                    </div>
            </div>

            </div>

        </div>
</div>

@endsection