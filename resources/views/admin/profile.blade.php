@extends('layouts.app')


@section('header')

    @section('title')
      Profile
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
                                <a href="{{ route('admin_profile') }}" class="text-muted"> Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid px-4">
                <div class="container rounded bg-white mt-4 mb-5">
                    <div class="row ">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                @if (Auth::User()->userfrom === 'MDRRMO')
                                    <img class="rounded-circle mt-5" width="150px" src="{{ asset('images/medic.jpg') }}" class="avatar img-fluid rounded" alt="">
                                @elseif ( Auth::User()->userfrom === 'PNP')
                                    <img class="rounded-circle mt-5" width="150px" src="{{ asset('images/police.png') }}" class="avatar img-fluid rounded" alt="">
                                @elseif ( Auth::User()->userfrom === 'BFP')
                                    <img class="rounded-circle mt-5" width="150px" src="{{ asset('images/fireman.png') }}" class="avatar img-fluid rounded" alt="">
                                @else
                                    <img class="rounded-circle mt-5" width="150px" src="{{ asset('images/normal_user.jpg') }}" class="avatar img-fluid rounded" alt="">
                                @endif
                                <span class="font-weight-bold">{{ Auth::user()->responder_name }}</span>
                               <span class="text-black-50">{{ Auth::user()->email}}</span>
                            </div>

                            
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">

                                @if (session()->has('success-bt'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success-bt') }}
                                    </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Edit Profile</h4>
                                </div>

                                <form action="{{ route('admin_editprofile') }}" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <div class="row mt-3">
                                        <div class="col-md-12 mb-2">
                                            <label class="labels" for="name">Name: </label>
                                            <input name="responder_name" type="text" class="form-control @error('confirm_password') is-invalid @enderror"
                                                placeholder="Change Name here"
                                                value="{{ old('responder_name', auth()->user()->responder_name) }}">

                                                @error('name')
                                                    <div class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="username" class="labels">Username: </label>
                                            <input name="username" type="text" class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Change Username here"
                                                value="{{ old('username', auth()->user()->username) }}">

                                                @error('username')
                                                    <div class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <button class="btn btn-primary profile-button" type="submit"><i class="bi bi-save-fill"></i> SAVE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid px-4">
                <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row justify-content-center">

                        <div class="col-md-6 align-items-center border-right">
                            <div class="p-3 py-5">
                                {{-- For alert message --}}
                                @if (session()->has('password-success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('password-success') }}
                                    </div>
                                @endif

                                @if (session()->has('error-msg'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error-msg') }}
                                    </div>
                                @endif


                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Change Password</h4>
                                </div>
                                <form method="POST" action="{{ route('password.update')}}">
                                    @csrf
                                    @method('patch')

                                        <div class="row mt-3">

                                                <div class="col-md-12 mb-2">
                                                    <label for="current_password" class="labels">Current Pasword:  </label>
                                                    <input id="current_password" type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Enter Current Password">
                                                        
                                                        @error('current_password')
                                                            <div class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                </div>

                                                

                                                <div class="col-md-12 mb-2">
                                                    <label for="password" class="labels">New Password: </label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter New Password">

                                                    @error('password')
                                                        <div class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                    
                                                </div>

                                                
                                                <div class="col-md-12 mb-2">
                                                    <label for="confirm_password" class="labels">Confirm Password:</label>
                                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Re-enter New Password">
                                                    
                                                    @error('confirm_password')
                                                        <div class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                        </div>
                                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                            type="submit"><i class="bi bi-file-earmark-lock-fill"></i> SUBMIT</button></div>
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






