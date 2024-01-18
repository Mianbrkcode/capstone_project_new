
    @extends('layouts.guest')

    @section('header')
        
    @vite('resources/css/app.css')
        <title> E-LIGTAS | SIGN UP </title>
        

    @endsection

    @section('content')

    {{-- login New --}}
    <div  class="login-container h-screen bg-gradient-to-br flex justify-center items-center w-full">
        <form action="{{ route('register') }}" method="POST">
            @csrf

        <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">

            {{-- logo --}}
                <h1 class=" block text-center text-3xl font-semibold">SIGN UP</h1>
                <hr class="mt-3">
            {{-- end logo --}}
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block mb-1 text-gray-600 font-semibold">Name</label>
                        <input type="text" name="responder_name" placeholder="Name" id="name" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full"
                        value="{{ old('responder_name') }}"/>  
                        @error('responder_name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="username" class="block mb-1 text-gray-600 font-semibold">User name</label>
                        <input type="text" name="username" placeholder="User Name" id="username" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full"
                        value="{{ old('username') }}"/>  
                        @error('username')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                        <div>
                            <label for="email" class="block mb-1 text-gray-600 font-semibold">Email</label>
                            <input type="email" name="email" placeholder="Email" id="email" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full"
                             value="{{ old('email') }}"/>  
                            @error('email')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="userfrom" class="block mb-1 text-gray-600 font-semibold">User From:</label>
                            <select name="userfrom" id="userfrom"
                            class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full">
                                <option value="">--Barangay--</option>
                                <option value="MDRRMO">MDRRMO</option>
                                <option value="BFP">BFP</option>
                                <option value="PNP">PNP</option>
                                <option value="CAY POMBO">CAY POMBO</option>
                                <option value="CATMON">CATMON</option>
                                <option value="CAYSIO">CAYSIO</option>
                                <option value="GUYONG">GUYONG</option>
                            </select>
                        </div>
                        <span>
                            @error('userfrom')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </span>



                        <div>
                            <label for="password" class="block mb-1 text-gray-600 font-semibold">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full @error('password') is-invalid @enderror" />
                            @error('password')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mt-3">
                            <label for="password_confirmation" class="block mb-1 text-gray-600 font-semibold">Confirm Password</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" required id="password" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full @error('password') is-invalid @enderror" />    
                            @error('password_confirmation')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        {{-- sign Up --}}
                        <div>
                            <p>Have account already? <a href=" {{ route('login') }}"
                                    class="text-indigo-800 font-semibold">Sign In</a></p>
                        </div>
                </div>
                    <button type="submit" class="mt-4 w-full bg-gradient-to-tr from-indigo-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">Register</button>
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



        

