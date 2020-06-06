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
        <a href="#" class="btn btn-info">Group Chat</a>
        <a href="#createMagazine" data-toggle="modal" data-target="#createMagazine" class="btn btn-primary">Create Magazine</a>
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
            @if (count($magazine)>1)
            @for ($i=1;$i< count($magazine);$i++)
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
                <?php $active = 'active' ?>
                @foreach ($magazine as $m)
                <div class="carousel-item {{$active}}">
                    <a href="{{route('mading.show', $m->id)}}">
                    <img src="{{ asset('images/wallpaper.jpg') }}" alt="1st Slide" class="d-block"> 
                    <div class="carousel-caption text-left">
                        <p class="h3 text-white">{{$m->head}}</p>
                    </div>
                </a>
                </div>
                <?php $active = ''?>
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
                    @if (isset($board) & count($board) >= 1)
                    @foreach ($board as $b)
                        
                    <a href="{{route('board.show', $b->id)}}" class="col-6 col-md-4 box" style="background:#34B697">
                        <div class="mx-2 text-truncate text-white">
                            {{$b->name}}
                        </div>
                    </a> 
                    @endforeach
                    @endif
                    <a href="#newBoardModal" data-toggle="modal" data-target="#newBoardModal" class="col-6 col-md-4 box create">
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
            
            @if (isset($highlight))
                    
            <div class="py-2 px-3 mb-3 rounded" style="background-color:#34B697">
                <a href="#" class="d-block m-2 py-2 px-3 bg-white text- text-dark">Rangkuman Materi</a>
                <p class="h6 mx-2 font-weight-bold text-truncate text-white">Biologi</p>
            </div>
            @else
            <div class="text-center">There is no Highlight for this moment</div>
            @endif
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
                @if (isset($highlight))
                    
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
                @else
                <tr>
                    <td class="text-center">No Module for This Group</td>
                </tr>
                @endif
            </table>
        </div>
    </div>
</div>
{{-- MODAL MADING PAGE --}}

<div class="modal fade" tabindex="-1" role="dialog" id="createMagazine">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create New Magazine</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('content.store')}}" method="POST" id="CreateNewMagazine">
                @csrf
                <div class="form-group">
                    <label for="head">Header</label>
                    <input type="text" id="head" name="head" class="form-control" placeholder="Header line">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea rows="4" id="body" name="body" class="form-control" style="resize: none" placeholder="Type everything you want to tell here.."></textarea>
                </div>
                <input type="hidden" name="group" value="{{$group_data->id}}">
                <input type="hidden" name="type" value="magazine">
            </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" form="CreateNewMagazine">Create Magazine</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
{{-- MODAL PAGE --}}

<div class="modal fade" tabindex="-1" role="dialog" id="newBoardModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create New Board</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('board.store')}}" method="POST" id="CreateNewBoard">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Board Name">
                </div>
                <div class="form-group">
                    <label for="objective">Objective</label>
                    <textarea rows="4" name="objective" class="form-control" style="resize: none" placeholder="Describe about goal for this board"></textarea>
                </div>
                <input type="hidden" name="_group" value="{{$group_data->id}}">
            </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" form="CreateNewBoard">Create Board</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection