@extends('layouts.app')


@section('header')

    @section('title')
      
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
                                <a href="{{ route('admin_dashboard') }}" class="text-muted"> Dashboard   > </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('users.index') }}" class="text-muted"> User Management  ></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('users.show', $user->id) }}" class="text-muted"> User Details </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                
                <div class="col-lg-12 m-3">
                    <div class="pull-left">
                        <a class="btn btn-primary" href="{{ route('users.index') }}" > Back</a>
                    </div>
                </div> 
               
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3>User Details</h3>
                        </div>
                        <div class="card-body">
                                <div class="row form-group justify-content-center m-3">
                                        <div class="col-6 col-md-4">
                                            <label for="name" class="form-label">Full Name:</label>
                                            <p>{{$user->responder_name}}</p>
                                        </div>
                                        
                                        
                                        <div class="col-6 col-md-4">
                                            <label for="email" class="form-label">Email:</label>
                                            <p>{{$user->email}}</p>
                                        </div>

                                        <div class="col-6 col-md-4">
                                            <label class="form-label" for="userfrom">User From</label>
                                            <p>{{$user->userfrom}}</p>
                                        </div>
                                </div>

                                <div class="row form-group  m-3">
                                    <div class="col-6 col-md-4">
                                        <label for="role" class="form-label">Role:</label>
                                        <p>{{$user->role}}</p>
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
                                <strong>E-Ligtas</strong>
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
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">Booking</a>
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