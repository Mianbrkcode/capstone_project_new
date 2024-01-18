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
            <div class="container-fluid mt-3">
                <div class="row ">
                    <div class="col-12 text-start">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('admin_dashboard') }}" class="text-muted"> Dashboard  > </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('users.index') }}" class="text-muted"> User Management </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            
            <div class="container-fluid">
                <div class="mb-3">
                    <h4>Active Reports</h4>
                </div>
            </div> 
            
            
            <div class="container-fluid ">
                <div class="row">
                    @foreach ( $reports as $report)
                    <div class="card" style="width: 16rem;margin-left:10px">
                        <img src="{{ asset('images/medic.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{$report->resident_name}}</h5>
                          <p class="card-text">
                            {{$report->emergency_type}} <br>
                            @if ($report->status == 0)
                                <p>Active</p>
                            @endif
                          </p>
                          <a href="#" class="btn btn-primary">view report</a>
                        </div>
                    </div>
                    @endforeach
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

  

@endsection