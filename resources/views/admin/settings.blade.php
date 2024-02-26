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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-3">
                        <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Settings</li>
                    </ol>
                </nav>
            </div>
            
            <div class="container-fluid px-4">
                <div class="container rounded bg-white mt-4 mb-5">
                    <h3 class="p-4">
                        Settings
                    </h3>

                    <div class="row justify-content-center">
                        <div class="col-md-6 border-right">
                            <div class="p-3 py-5">

                                

                                <form action="{{ route('settings.updateAboutUs') }}" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <div class="row mt-2">
                                        @foreach ( $aboutus as $setting1)

                                            <div class="col-mb-12 ">
                                                <label for="aboutus" class="labels">ABOUT US: </label>
                                                    <div>
                                                        <textarea class="form-control w-full text-start @error('settings_description') is-invalid @enderror" name="settings_description"  id="settings_description" cols="30" rows="10">{{$setting1->settings_description}}</textarea>
                                                    </div>
                                                    <div class="mt-2">
                                                        <button class="btn btn-sm btn-primary profile-button" type="submit"><i class="bi bi-save-fill"></i> Save Changes</button>
                                                         
                                                        @error('settings_description')
                                                            <div class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror

                                                    </div>
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- Legal Policies Here --}}

                    <div class="row justify-content-center">
                        <div class="col-md-6 border-right">
                            <div class="p-3 py-5">

                                        

                                    @foreach ( $legalpolicies as $settings2 )
                                    <form action="{{ route('settings.updateLegalPolicies') }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <div class="row mt-2">
                                            <div class="col-mb-12 ">
                                                <label for="legalpolicies" class="labels"> LEGAL POLICIES: </label>
                                                    <div>
                                                        <textarea class="form-control w-full @error('settings_description') is-invalid @enderror" name="settings_description" id="settings_description" cols="30" rows="10">{{ $settings2->settings_description }}</textarea>
                                                        
                                                        @error('settings_description')
                                                            <div class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mt-2">
                                                        <button class="btn btn-sm btn-primary profile-button" type="submit"><i class="bi bi-save-fill"></i> Save Changes</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
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
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</div>

@endsection

@section('scripts')

@if (Session::has('success-updt-policies'))
<script>
    toastr.options.closeButton = true;
    toastr.options.closeDuration = 300;
    toastr.options.progressBar = true;
    toastr.success("{{Session::get('success-updt-policies')}}");
</script>

@elseif (Session::has('success-bt'))
    <script>
        toastr.options.closeButton = true;
        toastr.options.closeDuration = 300;
        toastr.options.progressBar = true;
        toastr.success("{{Session::get('success-bt')}}");
    </script>

@endif

@endsection






