@extends('extends.dashboard',['_pagename'=>'Home'])
@section('card-content')

@section('main-content')

<div class="container d-flex flex-column justify-content-center bg-white py-4 shadow-sm mb-4">

    
    <div id="highlight" class="mb-4">
        <p class="h5">Highlight</p>
        <div class="container my-3 p-0">
            
            @if (count($highlight)>0)
            @foreach ($highlight as $h)
            <div class="py-2 px-3 mb-3 rounded" style="background-color:#34B697">
                <a href="{{route('task.show', ['group'=>$h->group->id,'content'=>$h->id])}}" class="d-block m-2 py-2 px-3 bg-white text- text-dark">{{$h->head}}</a>
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
                    <a href="{{route('board.show',['group'=>$b->group->id,'board'=>$b->id])}}" class="col-6 col-md-4 box" style="background:#34B697">
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