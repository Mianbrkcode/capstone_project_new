@extends('layouts.guest')

@section('header')
<title> E-LIGTAS | SIGN IN </title>
@vite('resources/css/app.css')


@endsection

@section('content')

{{-- login New --}}
<div class="login-container h-screen flex justify-center items-center w-full">
    <form action="{{ route('login') }}" method="POST">

        {{-- Error Messages --}}

        {{-- End of Error Messages --}}


        @csrf
        <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">

            {{-- logo --}}
            <div class=" flex justify-center">
                <img src="{{ url('/images/e-ligtas-removebg-preview (1).png') }}" alt="logo">
            </div>
            <hr class="mt-3">
            {{-- end logo --}}


            <div class="space-y-4">
                <div>
                    <label for="username" class="block mb-1 text-gray-600 font-semibold">Email or Username</label>
                    <input type="username" name="username" id="username" placeholder="Email/Username" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" autocomplete="new-password @error('error') is-invalid @enderror" value="{{ old('email') }}" />
                    @error('username')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block mb-1 text-gray-600 font-semibold">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full @error('error') is-invalid @enderror" />
                    @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3 flex justify-between items-center">
                    <div>
                        <input type="checkbox" id="chckbox">
                        <label for="chckbox">Remember me?</label>
                    </div>
                    <div>
                        <a href="{{ route('forgotpassword') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Forgot password</a>
                    </div>
                </div>
                <!-- {{-- sign Up --}}
                <div>
                    <p>Dont have acount yet? <a href=" {{ route('register') }}" class="text-indigo-800 font-semibold">Sign Up</a></p>
                </div> -->
            </div>
            <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded tracking-wide w-full">SIGN IN</button>
        </div>
    </form>
</div>

@endsection

@section('footer')

{{-- <script>
                    toastr.options = {
                    positionClass: "toast-top-center"
                    };
                </script> --}}


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
@endsection