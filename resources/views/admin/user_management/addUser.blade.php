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
                                <a href="{{ route('users.index') }}" class="text-muted"> User Management > </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('users.create') }}" class="text-muted"> Add User </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <div class="col-lg-12 m-3">
                           
                    <div class="pull-left">
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                    </div>
                </div> 

                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add User</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row form-group justify-content-start m-3">
                                        <div class="col-6 col-md-4">
                                            <label for="respo" class="form-label">Full Name:</label>
                                            <input type="text" class="form-control  @error('responder_name') is-invalid @enderror" name="responder_name" placeholder="Full Name">

                                                @error('responder_name')
                                                    <div class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                        </div>
                                        
                                        
                                        <div class="col-6 col-md-4">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address">
                                            @error('email')
                                                <div class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-6 col-md-4">
                                            <label class="form-label" for="userfrom">User From</label>
                                            <select class="form-select @error('userfrom') is-invalid @enderror" name="userfrom" id="userfrom">
                                                <option value=""><--Barangay/Department--></option>
                                                <option value="MDRRMO">MDRRMO</option>
                                                <option value="BFP">BFP</option>
                                                <option value="PNP">PNP</option>
                                                <option value="CAY POMBO">CAY POMBO</option>
                                                <option value="CAYSIO">CAYSIO</option>
                                                <option value="CATMON">CATMON</option>
                                                <option value="GUYONG">GUYONG</option>
                                            </select>
                                                @error('userfrom')
                                                    <div class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                        </div>

                                        <div class="col-6 col-md-4">
                                            <label for="role" class="form-label" >Role:</label>
                                            <select class="form-select  @error('role') is-invalid @enderror" name="role" id="role">
                                                <option value="">Select Role</option>
                                                <option value="Super Admin">Super Admin</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                                @error('role')
                                                    <div class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                        </div>
                                </div>

                                <div class="row form-group m-3">
                                    <div class="col-6 col-md-4">
                                        <button type="submit" class="btn btn-primary ml-3">Submit</button> 
                                    </div>
                                </div>
                            </form>
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