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
                                <a href="{{ route('admin_dashboard') }}" class="text-muted"> Dashboard > </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('users.index') }}" class="text-muted"> User Management ></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('users.edit', $user->id) }}" class="text-muted"> Update User</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="col-lg-12 m-3">
                    <div class="pull-left">
                        <a class="btn btn-danger" href="{{ route('users.index') }}"><i class="bi bi-arrow-left-square-fill"></i> BACK</a>
                    </div>
                </div>

                {{-- Success Message --}}
                @if ($message = Session::get('success'))
                <script>
                    Swal.fire({
                        title: "Success",
                        text: "{{ $message }}",
                        icon: "success"
                    });
                </script>
                @endif

                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3>Update User</h3>
                        </div>
                        <div class="card-body">
                            {{-- first form --}}
                            <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data" id="form1">
                                @csrf
                                @method('PATCH')
                            </form>
                            {{-- first form end --}}

                            {{-- Second form is modal--}}
                            @include('layouts.modals.changepass')
                            {{-- Second form end is modals --}}

                            {{-- Third form --}}

                            <form action="{{ route('mail.passreset', $user->id) }}" method="POST" id="form3">

                                @csrf
                                @method('PATCH')

                                <input form="form3" type="hidden" name="responder_name" value="{{ $user->responder_name }}">
                                <input form="form3" type="hidden" name="email" value="{{ $user->email }}">
                            </form>


                            <div class="row form-group justify-content-start m-3">
                                <div class="col-6 col-md-4">
                                    <label for="name" class="form-label">Full Name:</label>
                                    <input form="form1" type="text" value="{{ old('name', $user->responder_name) }}" class="form-control  @error('name') is-invalid @enderror" name="responder_name" placeholder="Full Name">

                                    @error('name')
                                    <div class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-6 col-md-4">
                                    <label for="email" class="form-label">Email:</label>
                                    <input form="form1" type="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address">
                                    @error('email')
                                    <div class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-6 col-md-4">
                                    <label class="form-label" for="userfrom">User From</label>
                                    <select form="form1" class="form-control @error('userfrom') is-invalid @enderror" name="userfrom" id="userfrom">
                                        <option value="{{ $user->userfrom }}">{{ $user->userfrom }}</option>
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
                                    <label for="role" class="form-label">Role:</label>
                                    <select form="form1" class="form-control  @error('role') is-invalid @enderror" name="role" id="role">
                                        <option value="{{ $user->role }}">{{ $user->role }}</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Sector">Sector</option>
                                    </select>
                                    @error('role')
                                    <div class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group justify-content-start m-3">
                                <div class="row justify-content-center mt-5">
                                    <button form="form1" type="submit" class="btn btn-success col-3"><i class="bi bi-check-square-fill"></i> SUBMIT</button>
                                    <!-- <button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#changepass-modal">change Password</button> -->
                                    <!-- <button form="form3" id="resetPasswordBtn" type="button" class="btn btn-dark col-5">reset password</button> -->
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

<script>
    @if($errors -> any())
    @foreach($errors -> all() as $error)
    toastr.error('{{ $error }}');
    @endforeach
    @endif
</script>

<script>
    // document.addEventListener('DOMContentLoaded', function () {
    //     document.getElementById('resetPasswordBtn').addEventListener('click', function () {
    //         Swal.fire({
    //             title: 'Are you sure?',
    //             text: 'This will reset your password and will be send to your Email!',
    //             icon: 'warning',
    //             showCancelButton: true,
    //             confirmButtonColor: '#3085d6',
    //             cancelButtonColor: '#d33',
    //             confirmButtonText: 'Yes, reset it!'
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 // If the user clicks "Yes, update it!", trigger the form submission
    //                 document.getElementById('form3').submit();
    //             }
    //         });
    //     });
    // });
</script>


@endsection