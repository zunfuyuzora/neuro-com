@extends('extends.dashboard',['_pagename'=>'Settings','_backLink'=> route('group.show',$group_data->id)])


@section('main-content')

<div class="container d-flex flex-column justify-content-center mb-4">


    <div id="settings" class="p-4 mb-3 rounded shadow-sm bg-white">
        <div class="container">
            <div class="container">
                <h5 class="font-weight-bold">Group Detail</h5>
                @if ($user_membership->access == "member")
                <form class="form-group">
                    <div class="form-inline form-group mb-4 justify-content-between">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="col-9 form-control" value="{{$group_data->name}}">
                    </div>
                    <div class="form-inline mb-4 align-items-start justify-content-between form-group">
                        <label for="description" class="mt-2">Description</label>
                        <textarea type="text" id="description" name="description" class="col-9 form-control" rows="5">{{$group_data->description}}</textarea>
                    </div>
                </form>
                @else
                <form action="{{route('group.update', $group_data->id)}}" method="POST" class="form-group">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-inline form-group mb-4 justify-content-between">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="col-9 form-control" value="{{$group_data->name}}">
                    </div>
                    <div class="form-inline form-group mb-4 align-items-start justify-content-between">
                        <label for="description" class="mt-2">Description</label>
                        <textarea type="text" id="description" name="description" class="col-9 form-control" rows="5">{{$group_data->description}}</textarea>
                    </div>
                    @if (Session::has('message'))
                        <p class="bg-primary border-radius-3 text-white px-2 text-small"><span>{{Session::get('message')}}</span></p>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-9 col-md-6 form-group">
                        <button type="submit" class="btn btn-primary form-control">Update</button>
                    </div>
                    </div>
                </form>
                @endif
            </div>
            @if ($user_membership->access == "creator")
                
            <form action="{{route('group.destroy', $group_data->id)}}" id="deleteGroup">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
            </form>
            <button type="submit" class="btn btn-sm btn-danger" form="deleteGroup">Delete Group</button>
    
            @endif

        </div>
    </div>
        {{-- MEMBER SECTION --}}
        <div id="members">
            <div id="members-container" class="p-4 mb-3 rounded shadow-sm bg-white">

            <div class="container">
                <h5 class="font-weight-bold">Member List</h5>
                <div class="row">
                    <div class="form-group col-12 col-sm">
                        <div class="input-group form-group">
                            <input type="text" class="form-control" name="keyword" id="memberSearch" placeholder="Search Member">
                            <div class="input-group-append">
                                <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                @if ($user_membership->access == "member")

                @else
                    <div class="form-group col-sm-4">

                    <a href="#newMemberModal" data-toggle="modal" data-target="#newMemberModal" class="btn btn-primary form-control">
                        Add New</a> 
                    </div>
                    @endif
                </div>
            </div>
            <div class="container">

                @foreach ($members as $m)
                    
                <div class="row mb-4">
                    <div class="col overflow-hidden">
                        <div class="pic-avatar">
                            <img src="{{ asset($m->user->avatar) }}" alt="[Avatar]">
                        </div>
                    </div>
                    <div class="col-6 py-2">
                        <div class="wrappers text-truncate">
                            <p class="h5 m-0">{{$m->user->full_name}}</p>
                            <p class="h6 m-0" style="color:gray">{{"@".$m->user->username}}</p>
                            <p class="h6 m-0 text-capitalize">{{$m->access}}</p>
                        </div>
                    </div>
                    <div class="col flex-center-ultra">
                    @if ($user_membership->access == "member")
                    @else
                        @if ($m->access != 'creator')                    
                        <a href="#remove" onclick="removeMember('{{$m->id}}')" class="text-danger">Delete</a>
                        @endif
                    @endif

                    </div>
                </div>
                @endforeach
            </div>

            </div>

        </div>
        
        @if ($user_membership->access == "member")
        @else
        {{-- NEW MEMBBER MODALL --}}

<div class="modal fade" tabindex="-1" role="dialog" id="newMemberModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Member</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('group.newMember', $group_data->id)}}" method="POST" id="AddMember" class="form-group">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Ex: @johnkrieger21">
                </div>
                <div class="form-group">
                    <label for="access">Access Type</label>
                    <select name="access" id="access" class="form-control">
                        <option value="moderator">Moderator (Full Management Rights)</option>
                        <option value="member" selected>Member (Task Assignments)</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" form="AddMember">Add Member</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

    @if ($user_membership->access == "member")
    @else
    <form action="{{route('group.removeMember', $group_data->id)}}" method="POST" id="deleteForm">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="member_id" id="member_id" value="">
    </form>
    @endif
@endif
@endsection

@push('script')

@if ($user_membership->access == "member")
@else
    <script>
        var deleteForm = document.getElementById('deleteForm');
        var memberId = document.getElementById('member_id');

        function removeMember(id){
            member_id.value = id;
            deleteForm.submit();
        }
    </script>
    @endif
@endpush