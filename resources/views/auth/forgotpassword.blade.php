@extends('layouts.guest')

@section('header')

<link rel="stylesheet" href="{{ asset('css/customlogin.css') }}">
    <title> E-LIGTAS | Forgot Password </title>

@endsection

@section('content')

    <!--log in form here -->
    <div class="loginform rounded-4">
        {{-- form --}}
        <h3 class="text-center">FORGOT PASSWORD</h3>
        <div class="container">
            <form  action="{{ route('forgotpassword') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email to reset" 
                   value="{{ old('email') }}"
                  />
                  @error('email')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror

                </div>
                <button type="submit" class="btn btn-primary col-lg-12 col-12 mb-3">Submit</button>
                <a href="{{ route('login') }}" class="btn btn-dark col-lg-12 col-12 mb-3">
                    Cancel
                </a>
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

@elseif (session()->has('error'))
<script>
    toastr.options.showMethod = 'slideDown';
    toastr.options.closeButton = true;
    toastr.error("{{Session::get('error')}}");
</script>
@endif
       
@endsection