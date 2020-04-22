@extends('extends.dashboard',['_pagename'=>'Home'])
@section('main-content')
<div id="quick-search" class="container d-flex justify-content-center bg-white py-2 shadow-sm mb-4">

    <div class="container">

        <p class="font-weight-bolder">Quick Categories</p>
        <div class="row">
            <a href="" class="btn btn-lg bg-green text-white m-1 col">Laptop</a>
            <a href="" class="btn btn-lg bg-green text-white m-1 col">Mouse</a>
            <a href="" class="btn btn-lg bg-green text-white m-1 col">Earphone</a>
        </div>
        <div class="row">
            <a href="" class="btn btn-lg bg-green text-white m-1 col">Mug</a>
            <a href="" class="btn btn-lg bg-green text-white m-1 col">Chair</a>
            <a href="" class="btn btn-lg bg-green text-white m-1 col">Book</a>
        </div>
        <div class="row">
            <a href="" class="btn btn-lg bg-green text-white m-1 col">Cable</a>
            <a href="" class="btn btn-lg bg-green text-white m-1 col">Keyboard</a>
            <a href="" class="btn btn-lg bg-green text-white m-1 col">Headphone</a>
        </div>
    </div>

</div>

<div id="last-item" class="container py-2 bg-white shadow-sm">
    <p class="font-weight-bold">Most Borrowed item</p>
    <div class="li-content overflow-auto">
        <div class="d-flex">
            <a class="item-card card">
                <div class="item-thumbnail">
                    <img src="{{ asset('img/acer.png')}}" alt="[img Acer]" class="img-fluid">
                </div>
                <div class="item-name">Acer Projector</div>
            </a>
            <a class="item-card card">
                <div class="item-thumbnail">
                    <img src="{{ asset('img/acer.png')}}" alt="[img Acer]" class="img-fluid">
                </div>
                <div class="item-name">Acer Projector</div>
            </a>
            <a class="item-card card">
                <div class="item-thumbnail">
                    <img src="{{ asset('img/acer.png')}}" alt="[img Acer]" class="img-fluid">
                </div>
                <div class="item-name">Acer Projector</div>
            </a>
            <a class="item-card card">
                <div class="item-thumbnail">
                    <img src="{{ asset('img/acer.png')}}" alt="[img Acer]" class="img-fluid">
                </div>
                <div class="item-name">Acer Projector</div>
            </a>
            <a class="item-card card">
                <div class="item-thumbnail">
                    <img src="{{ asset('img/acer.png')}}" alt="[img Acer]" class="img-fluid">
                </div>
                <div class="item-name">Acer Projector</div>
            </a>
        </div>
    </div>
</div>
@endsection