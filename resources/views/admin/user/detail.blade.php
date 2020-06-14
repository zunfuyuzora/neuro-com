@extends('extends.admin', ['_page' => 'user'])
@section('main-content')
<div>
    <div class="container p-3 bg-white">
        <h4>User Detail</h4>
        <table class="table table-borderless">
            <tr>
                <td class="font-weight-bold">Name</td>
                <td class="text-capitalize">{{$user->full_name}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">User ID</td>
                <td>{{$user->id}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Username</td>
                <td>{{$user->username}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">E-mail</td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Bio</td>
                <td>{{$user->bio}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Level</td>
                <td>{{$user->level}}</td>
            </tr>
        </table>
    </div>

    <div class="container p-3 bg-white">
        <h4>User's Group</h4>
        <table class="table table-borderless display" id="member_table">
            <thead>
                <tr>
                    <th></th>
                    <th>Group Name</th>
                    <th>Access</th>
                    <th>Status</th>
                    <th>Join At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1?>
                @foreach ($member as $m)
                    <tr>
                        <td>{{$i++}}</td>
                        <td class="text-capitalize">{{$m->group->name}}</td>
                        <td class="text-capitalize">{{$m->access}}</td>
                        <td class="text-capitalize">{{$m->status == 1 ? "Joined" : "On Hold"}}</td>
                        <td>{{$m->created_at}}</td>
                        <td class="text-center"><a href="{{route('admin.group.detail',$m->group_id)}}" class="btn btn-sm btn-primary">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('/vendor/datatable/datatable.css')}}">
@endpush
@push('script')
<script src="{{asset('vendor/datatable/datatable.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#member_table').DataTable();
    })
</script>
@endpush