@extends('layouts.app')


@section('header')

    @section('title')
      Profile
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
            <div class="container-fluid">
                <div class="mb-3">
                    <h4>Admin Dashboard</h4>
                </div>
      
            <div class="container-fluid px-4">
                <div class="container rounded bg-white mt-4 mb-5">
                    <div class="row ">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                @if (Auth::User()->userfrom === 'MDRRMO')
                                    <img class="rounded-circle mt-5" width="150px" src="{{ asset('images/rescuer_img.png') }}" class="avatar img-fluid rounded" alt="">
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

                                <form action="{{ route('edit_profile') }}" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <div class="row mt-3">
                                        <div class="col-md-12 mb-2">
                                            <label class="labels" for="name">Full name: </label>
                                            <input id="name" name="responder_name" type="text" class="form-control @error('responder_name') is-invalid @enderror"
                                                placeholder="Change your full name here"
                                                value="{{ old('responder_name', auth()->user()->responder_name) }}">

                                                <div id="namecheck"
                                                    class="text-danger">
                                                     Your full name is required
                                                </div>

                                                @error('responder_name')
                                                    <div class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="username" class="labels">Username: </label>
                                            <input name="username" id="username"  type="text" class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Change Username here"
                                                value="{{ old('username', auth()->user()->username) }}">
                                                
                                                <div id="usercheck"
                                                    class="text-danger">
                                                     Username is required
                                                </div>

                                                @error('username')
                                                    <div class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="email" class="labels">Email: </label>
                                            <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Change Email here"
                                                value="{{ old('email', auth()->user()->email) }}">
                                                <span id="emailError" class="text-danger"></span>
                                                
                                                @error('email')
                                                    <div class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <button class="btn btn-primary profile-button" type="submit">Save</button>
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
                                            <label for="current_password" class="form-label">Current Password</label>
                                              <div class="input-group">
                                                  <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" aria-describedby="passwordHelpBlock" placeholder="Enter Current Password">
                                                  <span class="input-group-text" id="toggleCurrentPassword">
                                                      <i class="far fa-eye-slash"></i>
                                                  </span>
                                              </div>
                                              
                                                        <div id="passwordError"
                                                            class="text-danger">
                                                            Current Password is required
                                                        </div>

                                                  @error('current_password')
                                                      <div class="text-danger">{{ $message }}</div>
                                                  @enderror
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="password" class="form-label">New Password</label>
                                              <div class="input-group">
                                                  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" aria-describedby="passwordHelpBlock" placeholder="Enter New Password">
                                                  <span class="input-group-text" id="togglePassword">
                                                      <i class="far fa-eye-slash"></i>
                                                  </span>
                                              </div>
                                              <span id="newpasswordError" class="text-danger"></span>
                                                  @error('password')
                                                      <div class="text-danger">{{ $message }}</div>
                                                  @enderror
                                          </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="confirm_password" class="form-label">Confirm Password</label>
                                              <div class="input-group">
                                                  <input type="password" name="confirm_password" id="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" aria-describedby="passwordHelpBlock" placeholder="Confirm Password">
                                                  <span class="input-group-text" id="toggleconfirmPassword">
                                                      <i class="far fa-eye-slash"></i>
                                                  </span>
                                              </div>
                                              <span id="confirmpasswordError" class="text-danger"></span>
                                                  @error('confirm_password')
                                                      <div class="text-danger">{{ $message }}</div>
                                                  @enderror
                                        </div>

                                        
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

  {{-- for current password --}}
<script>
    const toggleCurrentPassword = document.querySelector('#toggleCurrentPassword');
    const current_password = document.querySelector('#current_password');

    toggleCurrentPassword.addEventListener('click', () => {
        // Toggle the password visibility
        const cptype = current_password.getAttribute('type') === 'password' ? 'text' : 'password';
        current_password.setAttribute('type', cptype);

        // Toggle the eye icon
        const iconcpClass = cptype === 'text' ? 'fa-eye' : 'fa-eye-slash';
        toggleCurrentPassword.innerHTML = `<i class='fas ${iconcpClass}'></i>`;
    });
</script>

{{-- For new Password --}}
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


{{-- for confirm password --}}
<script>
    const toggleconfirmPassword = document.querySelector('#toggleconfirmPassword');
    const password_confirmation = document.querySelector('#confirm_password');

    toggleconfirmPassword.addEventListener('click', () => {
        // Toggle the password visibility
        const ctype = password_confirmation.getAttribute('type') === 'password' ? 'text' : 'password';
        password_confirmation.setAttribute('type', ctype);

        // Toggle the eye icon
        const iconconfirmClass = ctype === 'text' ? 'fa-eye' : 'fa-eye-slash';
        toggleconfirmPassword.innerHTML = `<i class='fas ${iconconfirmClass}'></i>`;
    });
</script>

{{-- for confirm password --}}
<script>
    const toggleconfirmPassword = document.querySelector('#toggleconfirmPassword');
    const password_confirmation = document.querySelector('#confirm_password');

    toggleconfirmPassword.addEventListener('click', () => {
        // Toggle the password visibility
        const ctype = password_confirmation.getAttribute('type') === 'password' ? 'text' : 'password';
        password_confirmation.setAttribute('type', ctype);

        // Toggle the eye icon
        const iconconfirmClass = ctype === 'text' ? 'fa-eye' : 'fa-eye-slash';
        toggleconfirmPassword.innerHTML = `<i class='fas ${iconconfirmClass}'></i>`;
    });
</script>

<script>

$(document).ready(function () {
// Validate Responder Name
$("#namecheck").hide();
let nameError = true;
$("#name").keyup(function () {
    validateName();
});

function validateName() {
    let nameValue = $("#name").val();
    if (nameValue.length == "") {
        $("#namecheck").show();
        nameError = false;
        return false;
    } 
    else {
        $("#namecheck").hide();
    }
}

// Validate Username
$("#usercheck").hide();
    let usernameError = true;
    $("#username").keyup(function () {
        validateUsername();
    });
 
    function validateUsername() {
        let usernameValue = $("#username").val();
        if (usernameValue.length == "") {
            $("#usercheck").show();
            usernameError = false;
            return false;
        } else if (usernameValue.length < 3) {
            $("#usercheck").show();
            $("#usercheck").html("username must be atleast 3 characters");
            usernameError = false;
            return false;
        } else {
            $("#usercheck").hide();
        }
    }

function isValidEmail(email) {
            // Simple email validation regex
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Function to handle input change event
        $("#email").on("input", function() {
            var email = $(this).val();
            var emailErrorElement = $("#emailError");

            if (email.trim() === "") {
                // If email is empty
                emailErrorElement.text("Email is required.");
            } else if (!isValidEmail(email)) {
                // If email is not valid
                emailErrorElement.text("Invalid email format.");
            } else {
                // Clear error message if email is valid
                emailErrorElement.text("");
            }
        });

        //validate current password
        $("#passwordError").hide();
        let currentpassError = true;
        $("#current_password").keyup(function () {
            validateCurrentPassword();
        });

        function validateCurrentPassword() {
            let currentpass_Value = $("#current_password").val();
            if (currentpass_Value.length == "") {
                $("#passwordError").show();
                currentpassError = false;
                return false;
            } 
            else {
                $("#passwordError").hide();
            }
        }


//for new Password
$("#password").on("input", function() {
            var password = $(this).val();
            var isValid = validatenewPassword(password);
            if (!isValid) {
                $("#newpasswordError").text("Password must be at least 8 characters long, contain 1 uppercase letter, and 1 special character.");
            } else {
                $("#newpasswordError").text("");
            }
        });
        function validatenewPassword(password) {
            // Password must be at least 8 characters long
            if (password.length < 8) {
                return false;
            }
            // Check for at least 1 uppercase letter
            if (!/[A-Z]/.test(password)) {
                return false;
            }
            // Check for at least 1 special character
            if (!/[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(password)) {
                return false;
            }
            // If all checks pass, the password is valid
            return true;
        }

// For confirm password validation
$("#password, #confirm_password").on("input", function() {
            var newPassword = $("#password").val();
            var confirmPassword = $("#confirm_password").val();

            if (newPassword !== confirmPassword) {
                $("#confirmpasswordError").text("Passwords do not match.");
            } else {
                var isValid = confirmValidation(newPassword);

                if (!isValid) {
                    $("#confirmpasswordError").text("Password must be at least 8 characters long, contain 1 uppercase letter, and 1 special character.");
                } else {
                    $("#confirmpasswordError").text("");
                }
            }
        });

        function confirmValidation(password) {
            // Password must be at least 8 characters long
            if (password.length < 8) {
                return false;
            }
            // Check for at least 1 uppercase letter
            if (!/[A-Z]/.test(password)) {
                return false;
            }

            // Check for at least 1 special character
            if (!/[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(password)) {
                return false;
            }
            // If all checks pass, the password is valid
            return true;
        }

});
</script>
@endsection






