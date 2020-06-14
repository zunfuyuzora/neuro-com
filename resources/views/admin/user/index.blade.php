@extends('extends.admin', ['_page'=>"user"])
@section('main-content')
<div>
    <div class="container p-3 bg-white">
    <h3>Users</h3>
    <table id="user_table" class="table table-borderless display">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Username</th>
                <th>Register at</th>
                <th>Level</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1?>
            @foreach ($users as $u)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$u->full_name}}</td>
                <td>{{$u->username}}</td>
                <td>{{$u->created_at}}</td>
                <td class="text-capitalize">{{$u->level}}</td>
                <td class="text-center"><a href="{{route('admin.user.detail', $u->id)}}" class="btn btn-sm btn-primary">View</a></td>
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
        $('#user_table').DataTable();
    })
</script>
@endpush