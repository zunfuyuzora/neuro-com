@extends('extends.admin', ['_page' => 'home'])
@section('main-content')

<div>
    <div class="container">
        <div class="row center-on-sm">
            <div class="report-scalar text-center">
                <h2 class="text-blue">{{$user}}</h2>
                <p>User Account</p>
            </div>
            <div class="report-scalar text-center">
                <h2 class="text-blue">{{$group}}</h2>
                <p>Group Initiate</p>
            </div>
            <div class="report-scalar text-center">
                <h2 class="text-blue">{{$board}}</h2>
                <p>Board Created</p>
            </div>
            <div class="report-scalar text-center">
                <h2 class="text-blue">{{$comment}}</h2>
                <p>Total Comment</p>
            </div>
            <div class="report-scalar text-center">
                <h2 class="text-blue">{{$module}}</h2>
                <p>Module Uploaded</p>
            </div>
            <div class="report-scalar text-center">
                <h2 class="text-blue">{{$task}}</h2>
                <p>Task Created</p>
            </div>
            <div class="report-scalar text-center">
                <h2 class="text-blue">{{$magazine}}</h2>
                <p>Magazine Posted</p>
            </div>
        </div>
    </div>

</div>
@endsection