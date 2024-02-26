
@extends('layouts.guest')

@section('header')
    

<link rel="stylesheet" href="{{ asset('css/customlogin.css') }}">
    <title> E-LIGTAS | Login </title>

@endsection

@section('content')

    <!--log in form here -->
    <div class="loginform rounded-4">
        {{-- log here --}}
        <div class="d-flex justify-content-center">
            <img src="{{ asset('images/e-ligtas-removebg-preview (1).png')}}" alt="logo">
        </div>
        <div class="container">
            <form  action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="username" class="form-label">Email or Username</label>
                  <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Email/Username" 
                   value="{{ old('username') }}"
                  />
                  @error('username')
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
                 <!-- 2 column grid layout -->
                    <div class="row mb-4">
                        <div class="col-md-6 ">
                        <!-- Checkbox -->
                        {{-- <div class="form-check mb-3 mb-md-0">
                            <input class="form-check-input" type="checkbox"/>
                            <label class="form-check-label" for="loginCheck"> Remember me </label>
                        </div> --}}
                        </div>

                        <div class="col-md-6 text-end">
                        <!-- Simple link -->
                        <a href="{{ route('forgotpassword') }}">Forgot password?</a>
                        </div>
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


@endsection



    

