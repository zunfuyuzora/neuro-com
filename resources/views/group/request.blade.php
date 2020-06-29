@extends('extends.dashboard',['_pagename'=>'Settings','_backLink'=> route('group.settings',$group_data->id),'groupId'=>$group_data->id])


@section('main-content')

<div class="container d-flex flex-column justify-content-center mb-4">
        {{-- MEMBER SECTION --}}
        <div id="members">
            <div id="members-container" class="p-4 mb-3 rounded shadow-sm bg-white">

            <div class="container">
                <h5 class="font-weight-bold">Request List</h5>
            </div>
            <div class="container">

                @foreach ($members as $m)
                <div class="row mb-4">
                    <div class="col overflow-hidden">
                        <div class="pic-avatar">
                            <img src="{{ asset($m->user->avatar) }}" alt="[Avatar]">
                        </div>
                    </div>
                    <div class="col-5 py-2">
                        <div class="wrappers text-truncate">
                            <p class="h5 m-0"><a href="{{route('profile',$m->user->id)}}">{{$m->user->full_name}}</a></p>
                            <p class="h6 m-0" style="color:gray">{{"@".$m->user->username}}</p>
                            <p class="h6 m-0 text-capitalize">{{$m->access}}</p>
                        </div>
                    </div>
                    <div class="col flex-center-ultra justify-content-around">
                    @if ($user_membership->access == "member")
                    @else
                        <a href="#approve" onclick="approveMember('{{$m->id}}')">Approve</a>
                        @if ($m->access != 'creator')                    
                        <a href="#remove" onclick="removeMember('{{$m->id}}')" class="text-danger">Delete</a>
                        @endif
                    @endif

                    </div>
                </div>
                @endforeach
                @if (count($members) == 0)
                    <div class="text-center">
                        There is no group join request
                    </div>
                @endif
            </div>

            </div>

        </div>
        
</div>

@if ($user_membership->access == "member")
@else
<form action="{{route('group.removeMember', $group_data->id)}}" method="POST" id="deleteForm">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="member_id" id="member_id1" value="">
</form>
<form action="{{route('group.approval', $group_data->id)}}" method="POST" id="approveForm">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="member_id" id="member_id2" value="">
</form>
@endif
@endsection


@push('script')

@if ($user_membership->access == "member")
@else
    <script>
        var deleteForm = document.getElementById('deleteForm');
        var approveForm = document.getElementById('approveForm');
        var memberId1 = document.getElementById('member_id1');
        var memberId2 = document.getElementById('member_id2');

        function removeMember(id){
            memberId1.value = id;
            deleteForm.submit();
        }
        function approveMember(id){
            memberId2.value = id;
            approveForm.submit();
        }

    </script>
    @endif
@endpush