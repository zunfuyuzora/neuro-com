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

    
    <div id="highlight" class="mb-4">
        <p class="h5">Highlight</p>
        <div class="container my-3 p-0">
            
            @if (count($highlight)>0)
            @foreach ($highlight as $h)
            <div class="py-2 px-3 mb-3 rounded" style="background-color:#34B697">
                <a href="{{route('task.show', $h->id)}}" class="d-block m-2 py-2 px-3 bg-white text- text-dark">{{$h->head}}</a>
                <p class="h6 mx-2 font-weight-bold text-truncate text-white">Board : {{$h->board->name}}</p>
            </div>

            @endforeach                    

            @else
            <div class="text-center">There is no Highlight for this moment</div>
            @endif
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
                @if (count($board) > 0)
                <div class="row text-center"> 
                            
                    @foreach ($board as $b)
                    <a href="{{route('board.show', $b->id)}}" class="col-6 col-md-4 box" style="background:#34B697">
                        <div class="mx-2 text-truncate text-white">
                            {{$b->name}}
                        </div>
                    </a> 
                    @endforeach
                </div> 
                    @else
                    <div class="text-center">
                    You dont have any board
                </div>
                    @endif 
            </div> 
    </div>

@endsection