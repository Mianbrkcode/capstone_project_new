@extends('layouts.guest')

@section('header')

@vite('resources/css/app.css')
<title> E-LIGTAS | FORGOT PASSWORD </title>


@endsection

@section('content')

{{-- login New --}}
<div class="login-container h-screen bg-gradient-to-br flex justify-center items-center w-full">
    <form action="{{ route('forgotpassword') }}" method="POST">
        @csrf

        <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">

            {{-- logo --}}
            <h1 class=" block text-center text-3xl font-semibold">FORGOT PASSWORD</h1>
            <hr class="mt-3">
            {{-- end logo --}}
            <div class="space-y-4">

                <div>
                    <label for="email" class="block mb-1 text-gray-600 font-semibold">Email</label>
                    <input type="email" name="email" placeholder="Email" id="email" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full py-4" value="{{ old('email') }}" />
                    @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="mt-4 w-full bg-gradient-to-tr from-indigo-600 to-indigo-600 text-indigo-100 py-1 rounded-md text-lg tracking-wide">Submit</button>
            <a href="{{ route('login') }}" class="mt-4 w-full inline-block bg-transparent hover:bg-indigo-600 text-blue-700 hover:text-white py-1 border text-center border-indigo-600 hover:border-transparent text-lg rounded-md">
                Cancel
            </a>
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

@elseif (session()->has('error'))
<script>
    toastr.options.showMethod = 'slideDown';
    toastr.options.closeButton = true;
    toastr.error("{{Session::get('error')}}");
</script>
@endif
@endsection