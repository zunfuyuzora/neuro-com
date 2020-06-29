@extends('extends.admin', ['_page'=>"group"])
@section('main-content')
<div>
    <div class="container p-3 bg-white">
    <h3>Group</h3>
    <table id="group_table" class="table table-borderless display">
        <thead>
            <tr>
                <th></th>
                <th>Group Name</th>
                <th>ID</th>
                <th>Creator</th>
                <th>Created At</th>
                <th>Total Member</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1?>
            @foreach ($groups as $g)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$g->name}}</td>
                <td>{{$g->id}}</td>
                <td>{{$g->getMembers->where('access','creator')->first()->user->full_name}}</td>
                <td>{{$g->created_at}}</td>
                <td>{{$g->getMembers->count()}}</td>
                <td class="text-center"><a href="{{route('admin.group.detail', $g->id)}}" class="btn btn-sm btn-primary">View</a></td>
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
        $('#group_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1,2,3,4,5]
                    }
                }
            ]
        })
    })
</script>
@endpush