@extends('extends.admin', ['_page'=>"group"])
@section('main-content')
<div>
    <div class="container p-3 bg-white">
    <h3>Group</h3>
    <table id="group_table" class="table table-borderless display">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Creator</th>
                <th>Created At</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1?>
            @foreach ($groups as $g)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$g->name}}</td>
                <td>{{$g->getMembers->where('access','creator')->first()->user->full_name}}</td>
                <td>{{$g->created_at}}</td>
                <td class="text-center"><a href="{{route('admin.group.detail', $g->id)}}" class="btn btn-sm btn-primary">View</a></td>
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
        $('#group_table').DataTable();
    })
</script>
@endpush