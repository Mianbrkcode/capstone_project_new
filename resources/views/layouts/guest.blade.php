<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="icon" href="{{ asset('images/e-ligtas-small-icon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/e-ligtas-small-icon.ico') }}" type="image/x-icon">

    @yield('header')
</head>

<body style="background-color: rgb(51, 71, 246, 1)">
    <div class="w-full h-screen">
        {{-- style="background-image: url('/images/firehouse-429754_1280.jpg'); background-size: cover;" --}}

        @yield('content')
    </div>
</body>

@yield('footer')

</html>