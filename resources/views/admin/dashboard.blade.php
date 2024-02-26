@extends('layouts.app')


@section('header')
    @section('title')
      Admin | Dashboard
    @endsection
      
@endsection

@section('content')
    

<div class="wrapper">
    
    {{-- sidebar here --}}

    @include('layouts.admin_sidebar')

    <div class="main">
        
        @include('layouts.admin_nav')
        {{-- navigation bar --}}

        <main class="content px-3 py-2">
            <div class="container-fluid">

                <div class="my-3">
                    <h3>Dashboard</h3>
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
                                <div class="d-flex align-items-start text-lg-center ">
                                    <div class="flex-grow-1 ">
                                        <h4 class="mb-2 ">
                                            {{ $totalActiveReport }}
                                        </h4>
                                        <p class="mb-2">
                                            Pending Reports
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
                                        <h4 class="mb-2 ">
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

        <div class="container-fluid">
            <div class="row">

                <div class="col-10 col-md-4 d-flex">
                    <div class="card flex-fill border-0">
                        <div class="card-header">
                            <p>
                                <b>Total Number of Emergency Reports by Emergency Types</b>
                            </p>
                        </div>
                        <div class="card-body">
                                <div class="card-body">
                                    <canvas id="mychart2">
                                        <p>Total Sum of Accepted Emergency Reports per Sectors and Barangay</p>
                                    </canvas>
                                </div>
                        </div>
                    </div>
                </div>
                
                @if (Auth::user()->userfrom == 'MDRRMO')
                    <div class="col-20 col-md-8 d-flex">
                        <div class="card flex-fill border-0">
                            <div class="card-header">
                                <p>
                                    <b> Total Number of Emergencie Rescued by Sectors / Barangays </b>
                                </p>
                            </div>
                            <div class="card-body">
                                    <canvas id="mychart">
                                        <p>Total Sum of Accepted Emergency Reports per Sectors and Barangay</p>
                                    </canvas>
                            </div>
                        </div>
                    </div>
                @endif
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
        labels: ['BFP', 'MDRRMO', 'PNP', 'BAGBAGUIN', 'BALASING', 'BUENAVISTA', 'BULAC', 'CAMANGYANAN', 
        'CATMON', 'CAY POMBO', 'CAYSIO', 'GUYONG', 'LALAKHAN', 'M. SAPA', 'MAHABANG PARANG',  'MANGGAHAN', 
        'PARADA', 'POBLACION', 'PULONG BUHANGIN', 'SAN GABRIEL', 'SAN JOSE PATAG', 'SAN VICENTE', 'SANTA CLARA',
        'SANTA CRUZ', 'SILANGAN', 'STO. TOMAS', 'TUMANA' ],
        datasets: [{
            data: [{{ $bfp}}, {{ $mdrrmo }}, {{ $pnp }}, {{ $bagbaguin }}, {{ $balasing }}, {{ $buenavista }}, {{ $bulac }}, {{ $camangyanan }}, 
            {{ $catmon }}, {{ $caypombo }}, {{ $caysio }}, {{ $guyong }}, {{ $lalakhan }}, {{ $magasawangsapa }}, {{ $mahabangparang }}, {{ $manggahan }}, {{ $parada }}, 
            {{ $poblacion }}, {{ $pulongbuhangin }}, {{ $sangabriel }}, {{ $sanjosepatag }}, {{ $sanvicente }}, {{ $santaclara }}, {{ $santacruz }}, {{ $silangan }}, {{ $santotomas }},
            , {{ $tumana }} ],
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
    }
});
</script>


<script>
    var ctx = document.getElementById('mychart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        plugins: [ChartDataLabels],
        data: {
            labels: ['Medical', 'Crime', 'Accidents', 'Fire'],
            datasets: [{
                data: [{{ $totalMedic}}, {{ $totalCrime }}, {{ $totalAccident }}, {{ $totalFire }}],
                backgroundColor: [
                    'rgb(13, 146, 118)',
                    'rgb(60, 108, 216)',
                    'rgb(255, 234, 167)',
                    'rgb(255, 104, 104)',
                ],
                borderColor: [
                    'rgb(13, 146, 118)',
                    'rgb(54, 82, 173)',
                    'rgb(255, 234, 167)',
                    'rgb(255, 104, 104)',
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
                    return 'rgb(255, 255, 255, 0.8)'; 
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