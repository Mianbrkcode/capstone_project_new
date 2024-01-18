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

            <div class="container-fluid mt-3">
                <div class="row ">
                    <div class="col-12 text-start">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('dashboard') }}" class="text-muted"> Dashboard  > </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('sector.contacts') }}" class="text-muted"> Hotlines Management </a>
                            </li>
                        </ul>
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


@endsection