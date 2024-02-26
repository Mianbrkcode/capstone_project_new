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
                        <a class="btn btn-primary" href="{{ route('users.index') }}"><i class="bi bi-arrow-left-square-fill"></i> BACK</a>
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
                            
                            {{-- Second form --}}
                            <form action="{{ route('user.verify',$user->id) }}" method="POST" enctype="multipart/form-data" id="form2">
                                @csrf
                                @method('PATCH')
                                
                            </form>
                            {{-- end of second form --}}

                            {{-- Third form --}}
                            <form action="{{ route('mail.passreset', $user->id) }}" method="POST" id="form3">
                                @csrf
                                @method('PATCH')
                                <input form="form3" type="hidden" name="email" value="{{ $user->email }}">
                            </form>
                            {{-- End of Third Form --}}
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

                                @if (Auth::user()->userfrom == 'MDRRMO')
                                    <div class="col-6 col-md-4">
                                        <label class="form-label" for="userfrom">User From</label>
                                            <select form="form1" class="form-select @error('userfrom') is-invalid @enderror" name="userfrom" id="userfrom">
                                                <option value="{{ $user->userfrom }}">{{ $user->userfrom }}</option>
                                                        <option value="MDRRMO">MDRRMO</option>
                                                        <option value="BFP">BFP</option>
                                                        <option value="PNP">PNP</option>
                                                        <option value="BAGBAGUIN">BAGBAGUIN</option>
                                                        <option value="BALASING">BALASING</option>
                                                        <option value="BUENAVISTA">BUENAVISTA</option>
                                                        <option value="BULAC">BULAC</option>
                                                        <option value="CAMANGYANAN">CAMANGYANAN</option>
                                                        <option value="CATMON">CATMON</option>
                                                        <option value="CAY POMBO">CAY POMBO</option>
                                                        <option value="CAYSIO">CAYSIO</option>
                                                        <option value="GUYONG">GUYONG</option>
                                                        <option value="LALAKHAN">LALAKHAN</option>
                                                        <option value="MAG ASAWANG SAPA">MAG ASAWANG SAPA</option>
                                                        <option value="MAHABANG PARANG">MAHABANG PARANG</option>
                                                        <option value="MANGGAHAN">MANGGAHAN</option>
                                                        <option value="PARADA">PARADA</option>
                                                        <option value="POBLACION">POBLACION</option>
                                                        <option value="PULONG BUHANGIN">PULONG BUHANGIN</option>
                                                        <option value="SAN GABRIEL">SAN GABRIEL</option>
                                                        <option value="SAN JOSE PATAG">SAN JOSE PATAG</option>
                                                        <option value="SAN VICENTE">SAN VICENTE</option>
                                                        <option value="SANTA CLARA">SANTA CLARA</option>
                                                        <option value="SANTA CRUZ">SANTA CRUZ</option>
                                                        <option value="SILANGAN">SILANGAN</option>
                                                        <option value="STO. TOMAS">STO. TOMAS</option>
                                                        <option value="TUMANA">TUMANA</option>
                                            </select>
                                        @error('userfrom')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                @elseif (Auth::user()->userfrom != 'MDRRMO')
                                <div class="col-6 col-md-4">
                                    <label class="form-label" for="userfrom">User From</label>
                                        <select form="form1" class="form-select @error('userfrom') is-invalid @enderror" name="userfrom" id="userfrom">
                                            <option value="{{ $user->userfrom }}">{{ $user->userfrom }}</option> 
                                        </select>
                                    @error('userfrom')
                                    <div class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                @endif

                                <div class="col-6 col-md-4">
                                    <label for="role" class="form-label">Role:</label>
                                    <select form="form1" class="form-select   @error('role') is-invalid @enderror" name="role" id="role">
                                        <option value="{{ $user->role }}">{{ $user->role }}</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Rescuer">Rescuer</option>
                                    </select>
                                    @error('role')
                                    <div class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group justify-content-center m-3">
                                <div class="col-6">
                                    <button form="form1" type="submit" class="btn btn-success"><i class="bi bi-check-square-fill"></i> Save changes</button>
                                    <button form="form3" id="resetPasswordBtn" type="button" class="btn btn-dark"><i class="bi bi-arrow-repeat"></i> Reset password</button>
                                    
                                    @if( $user->verified == 'pending')
                                        <button form="form2" id="verifyUserButton" type="button" class="btn btn-primary"><i class="bi bi-patch-check-fill"></i>Verify User</button>
                                    @endif

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

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('resetPasswordBtn').addEventListener('click', function () {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This will reset the password of this user and will be send to his/her email',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reset it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form3').submit();
                }
            });
        });
    });
</script> --}}

<script>
    document.getElementById('resetPasswordBtn').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Show SweetAlert2 confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: 'You want to reset the password of this user!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, reset it'
    }).then((result) => {
        if (result.isConfirmed) {
            // If user clicks "Yes, submit it!" in the confirmation dialog, submit the form
            document.getElementById('form3').submit();
        }
    });
});
</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('verifyUserButton').addEventListener('click', function () {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to verify this user!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks "Yes, update it!", trigger the form submission
                    document.getElementById('form2').submit();
                }
            });
        });
    });
</script>

@endsection