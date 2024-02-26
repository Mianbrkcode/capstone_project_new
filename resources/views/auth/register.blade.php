

@extends('layouts.guest')

@section('header')
    
<link rel="stylesheet" href="{{ asset('css/customregister.css') }}">
    <title> E-LIGTAS | Registration </title>

@endsection

@section('content')

    <!--log in form here -->
    <div class="loginform rounded-4">

        <h3 class="text-center">Register</h3>
        {{-- log here --}}
        <div class="container">
            <form  action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-2">
                  <label for="responder_name" class="form-label">Name</label>
                  <input type="responder_name" name="responder_name" class="form-control @error('responder_name') is-invalid @enderror" id="responder_name" placeholder="Name" 
                   value="{{ old('responder_name') }}"
                  />
                  @error('responder_name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-2">
                    <label for="username" class="form-label">username</label>
                    <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter your User Name" 
                     value="{{ old('username') }}"
                    />
                    @error('email')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter your Email" 
                     value="{{ old('email') }}"
                    />
                    @error('email')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="userfrom" class="form-label">User From</label>
                    <select class="form-select  @error('userfrom') is-invalid @enderror" " name="userfrom" id="userfrom">
                        <option value="">Select your Barangay / Sector</option>
                                                <option value="BFP">BFP</option>
                                                <option value="MDRRMO">MDRRMO</option>
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
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>


                <div class="mb-2">
                  <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" aria-describedby="passwordHelpBlock" placeholder="Password">
                        <span class="input-group-text" id="togglePassword">
                            <i class="far fa-eye-slash"></i>
                        </span>
                    </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                      <div class="input-group">
                          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password') is-invalid @enderror" aria-describedby="passwordHelpBlock" placeholder="Confirm Password">
                          <span class="input-group-text" id="toggleconfirmPassword">
                              <i class="far fa-eye-slash"></i>
                          </span>
                      </div>
                          @error('password_confirmation')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                  </div>
                <button type="submit" class="btn btn-primary col-lg-12 col-12 mb-3">Login</button>
              </form>
         </div>
     </div>
 
@endsection

@section('footer')

                    @if (session()->has('success'))
                        <script>
                            toastr.options.showMethod = 'slideDown';
                            toastr.options.closeButton = true;
                            toastr.success("{{Session::get('success')}}");
                        </script>
                    
                    @elseif (session()->has('error-msg'))
                        <script>
                            toastr.options.showMethod = 'slideDown';
                            toastr.options.closeButton = true;
                            toastr.error("{{Session::get('error-msg')}}");
                        </script>
                    @endif
       
    
    {{-- show password --}}
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', () => {
            // Toggle the password visibility
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle the eye icon
            const iconClass = type === 'text' ? 'fa-eye' : 'fa-eye-slash';
            togglePassword.innerHTML = `<i class='fas ${iconClass}'></i>`;
        });
    </script>
    
    <script>
        const toggleconfirmPassword = document.querySelector('#toggleconfirmPassword');
        const password_confirmation = document.querySelector('#password_confirmation');

        toggleconfirmPassword.addEventListener('click', () => {
            // Toggle the password visibility
            const ctype = password_confirmation.getAttribute('type') === 'password' ? 'text' : 'password';
            password_confirmation.setAttribute('type', ctype);

            // Toggle the eye icon
            const iconconfirmClass = ctype === 'text' ? 'fa-eye' : 'fa-eye-slash';
            toggleconfirmPassword.innerHTML = `<i class='fas ${iconconfirmClass}'></i>`;
        });
    </script>



@endsection
        

