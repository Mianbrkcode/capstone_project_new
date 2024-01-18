@extends('layouts.app')


@section('header')
    @section('title')
      Admin | Dashboard
    @endsection
      
@endsection

@section('content')
    

<div class="wrapper">
    
    {{-- sidebar here --}}

    @include('layouts.sidebar')

    <div class="main">
        
        @include('layouts.navigation')
        {{-- navigation bar --}}

        <main class="content px-3 py-2">
            <div class="container-fluid">

                <div class="my-3">
                    <h4>Dashboard</h4>
                </div>
                <div class="row">
                    {{-- Cards Here --}}
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start text-lg-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-2">
                                            {{ $totalMedic}}
                                        </h4>
                                        <p class="mb-2">
                                            Medical Related
                                        </p>
                                        <div class="mb-0">
                                            <span class="text-muted">
                                                This Month
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start text-lg-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-2">
                                            {{ $totalFire }}
                                        </h4>
                                        <p class="mb-2">
                                            Fire
                                        </p>
                                        <div class="mb-0">
                                            <span class="text-muted">
                                                This Month
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- Cards Here --}}
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start text-lg-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-2">
                                            {{ $totalAccident }}
                                        </h4>
                                        <p class="mb-2">
                                             Accidents
                                        </p>
                                        <div class="mb-0">
                                            <span class="text-muted">
                                                This Month
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start text-lg-center ">
                                    <div class="flex-grow-1 ">
                                        <h4 class="mb-2">
                                            {{ $totalCrime }}
                                        </h4>
                                        <p class="mb-2">
                                            Crimes
                                        </p>
                                        <div class="mb-0">
                                            <span class="text-muted">
                                                Since Last Month
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col">
                        <div class="container">
                            <div class="card">
                                <div class="card-header">
                                    <p>
                                        <b> Bar Chart for the total number of Emergencies Per Barangay/Sectors</b>
                                    </p>
                                </div>
                                <div class="card-body">
                                        <canvas id="mychart2" style="width: 30px; height: 30px">
                                            <p>Total Sum of Accepted Emergency Reports per Sectors and Barangay</p>
                                        </canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col">
                        <div class="container">
                            <div class="card">
                                <div class="card-header">
                                    <p>
                                        <b> Bar Chart for the total number of Emergencies Per Barangay/Sectors</b>
                                    </p>
                                </div>
                                <div class="card-body">
                                        <canvas id="mychart">
                                            <p>Total Sum of Accepted Emergency Reports per Sectors and Barangay</p>
                                        </canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <a href="#" class="text-muted">
                                <strong>E-ligtas</strong>
                            </a>
                        </p>
                    </div>
                    <div class="col-6 text-end">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">Contact</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">About Us</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">Terms</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</div>

@endsection

@section('scripts')

    @if (Session::has('success'))
        <script>
            toastr.options.closeButton = true;
            toastr.options.closeDuration = 300;
            toastr.options.progressBar = true;
            toastr.success("{{Session::get('success')}}");
        </script>
    @endif

<script>
var ctx = document.getElementById('mychart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Medical', 'Crime', 'Accidents', 'Fire'],
        datasets: [{
            data: [{{ $totalMedic}}, {{ $totalCrime }}, {{ $totalAccident }}, {{ $totalFire }} ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>


<script>
    var ctx = document.getElementById('mychart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Medical', 'Crime', 'Accidents', 'Fire'],
            datasets: [{
                data: [{{ $totalMedic}}, {{ $totalCrime }}, {{ $totalAccident }}, {{ $totalFire }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
        
    });
    </script>

@endsection