@extends('extends.admin', ['_page'=>"user"])
@section('main-content')
<div>
    <div class="container p-3 bg-white">
    <h3>Users</h3>
    <div id="button"></div>
    <table id="user_table" class="table table-borderless display">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
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
                <td>{{$u->email}}</td>
                <td>{{$u->created_at}}</td>
                <td>{{ucfirst($u->level)}}</td>
                <td class="text-center"><a href="{{route('admin.user.detail', $u->id)}}" class="btn btn-sm btn-primary">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('/vendor/datatable/datatables.min.css')}}">
@endpush
@push('script')
<script src="{{asset('vendor/datatable/datatables.min.js')}}"></script>
<script>
    $(document).ready(function(){
        var table = $('#user_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1,2,3,4]
                    }
                }
            ]
        });
    })
</script>
@endpush