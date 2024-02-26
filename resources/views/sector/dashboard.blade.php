@extends('layouts.app')


@section('header')
    @section('title')
      E-ligtas | Dashboard
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
                    <div class="col-10 col-md-4 d-flex">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 col-md-4 d-flex">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 col-md-4 d-flex">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 col-md-4 d-flex">
                        <div class="card flex-fill border-0">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start text-lg-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-2">
                                            {{ $totalCrime }}
                                        </h4>
                                        <p class="mb-2">
                                            Crimes
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-10 col-md-4 d-flex">
                        <div class="card flex-fill border-0">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start text-lg-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-2">
                                            0
                                        </h4>
                                        <p class="mb-2">
                                             Rejected Reports
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 col-md-4 d-flex">
                        <div class="card flex-fill border-0">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start text-lg-center ">
                                    <div class="flex-grow-1 ">
                                        <h4 class="mb-2">
                                            {{ $totalAcceptedReport }}
                                        </h4>
                                        <p class="mb-2">
                                            Accepted Reports
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-20 col-md-8 d-flex">
                <div class="card flex-fill border-0">
                    <div class="card-header">
                        <p>
                            <b> Total Number of Emergency Reports by Emergency Type</b>
                        </p>
                    </div>
                    <div class="card-body">
                        <canvas id="mychart">
                            <p>Total Sum of Accepted Emergency Reports per Sectors and Barangay</p>
                        </canvas>
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
            plugins: [ChartDataLabels],
            data: {
                labels: ['Medical', 'Crime', 'Accidents', 'Fire'],
                datasets: [{
                    data: [{{ $totalMedic}}, {{ $totalCrime }}, {{ $totalAccident }}, {{ $totalFire }} ],
                    backgroundColor: [
                        'rgb(60, 108, 216)'
                    ],
                    borderColor: [
                        'rgb(60, 108, 216)'
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
                },
                plugins: {
                    datalabels: {
                        color: 'black',
                        font: {
                            weight: 'bold'
                        },
                        backgroundColor: function(context) {
                            return 'rgb(255, 255, 255, 0.8)'; // Set the desired background color (white with 80% opacity in this example)
                        },
                        borderRadius: 4, // Optional: Set border radius for the background
                        padding: { // Optional: Add padding around the labels
                            top: 4,
                            right: 8,
                            bottom: 4,
                            left: 8
                        }
                    }
                }
            }
        });
        </script>




@endsection