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
            <div class="report-scalar text-center">
                <h2 class="text-blue">{{$message}}</h2>
                <p>Messages Shared</p>
            </div>
        </div>
    </div>

    <div class="container bg-white p-4">
        <h4>User Registered Per Month</h4>
        <canvas id="userChart" width="400" height="200"></canvas>
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('./vendor/chart/chart.min.js')}}"></script>
<script>
    var ctx = document.getElementById('userChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Aug','Sep','Oct','Nov','Des'],
        datasets: [{
            label: '# of Users',
            data: {{$chart}},
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endpush