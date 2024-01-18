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
                    <h4>Disaster Guidelines</h4>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('guidelines.upload')}}" class="btn btn-primary "> Upload New Guidelines</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered data-table">
                            <thead>
                                 <tr>
                                     <th>Guidelines No.</th>
                                     <th>Guidelines Name</th>
                                     <th>Created_at</th>
                                 </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>

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


@endsection