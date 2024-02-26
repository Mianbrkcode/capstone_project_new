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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-3">
                        <li class="breadcrumb-item"><a class="text-muted" href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="text-muted" href="#"> Active Reports </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Make Initial Report</li>
                    </ol>
                    
                </nav>
            </div>

            <div class="container-fluid">
                <div class="col-lg-12 m-3">
                    <div class="pull-left">
                        <a class="btn btn-primary" href="{{ route('pending_reports') }}"><i class="bi bi-arrow-left-square-fill"></i> BACK</a>
                    </div>
                </div>
                
                <div class="container bg-white rounded p-2">
                    <div class="text-center py-3">
                        <h3>Incident Report Form</h3>
                    </div>
                    <form action="{{ route('sector_initial_report.store') }}" id="initialReport" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="row mb-2">
                            <div class="col">
                                <label for="resident_name" class="form-label">Resident Name</label>
                                <input type="text" name="resident_name" class="form-control @error('resident_name') is-invalid @enderror" placeholder="Put resident name here" value="{{ old('resident_name') }}">
                                
                                @error('resident_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="locationName" id="address" class="form-control @error('locationName') is-invalid @enderror" placeholder="put address here" value="{{ old('locationName') }}">
                                
                                @error('locationName')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label for="emergency_type" class="form-label">Emergency Type</label>
                                <select name="emergency_type" id="emergency_type" class="form-select @error('emergency_type') is-invalid @enderror">
                                    <option value="">Select Emergency Type</option>
                                    <option value="Crime">Crime</option>
                                    <option value="Medical">Medical</option>
                                    <option value="Fire">Fire</option>
                                    <option value="Accident">Accidents</option>
                                </select>

                                @error('emergency_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-6">
                                <label for="phonenumber" class="form-label">Phone Number</label>
                                <input type="tel" placeholder="e.g, +639289323223" name="phoneNumber" id="phonenumber" class="form-control @error('phoneNumber') is-invalid @enderror" value="{{ old('phoneNumber') }}">
                                
                                @error('phoneNumber')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="description" cols="30" rows="10" value="{{ old('message') }}"></textarea>
                                
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="row justify-content-center py-3">
                                <button id="saveReport" type="submit" class="btn btn-success col-3"><i class="bi bi-check-square-fill"></i> Save Report</button>
                            </div>
                        </div>
                    </form>
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

<script>
    document.getElementById('saveReport').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Show SweetAlert2 confirmation dialog
    Swal.fire({
        title: 'Do you want to save this report?',
        text: 'Make sure the report details are correct!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, save it'
    }).then((result) => {
        if (result.isConfirmed) {
            // If user clicks "Yes, submit it!" in the confirmation dialog, submit the form
            document.getElementById('initialReport').submit();
        }
    });
});
</script>


@endsection