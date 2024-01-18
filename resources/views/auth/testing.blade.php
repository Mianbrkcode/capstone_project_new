<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div  class="h-screen bg-gradient-to-br flex justify-center items-center w-full"
    style="background-image: url('/images/firehouse-429754_1280.jpg'); background-size: cover;">
    <form>
        <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">

        {{-- logo --}}
        <div class=" flex justify-center">
            <img src="{{ url('/images/e-ligtas-removebg-preview (1).png') }}" alt="logo">
        </div>
            <h1 class=" block text-center text-3xl font-semibold">Admin Login</h1>
            <hr class="mt-3">
        {{-- end logo --}}


          <div class="space-y-4">
                <div>
                    <label for="email" class="block mb-1 text-gray-600 font-semibold">Email</label>
                    <input type="text" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />
                </div>
                <div>
                    <label for="email" class="block mb-1 text-gray-600 font-semibold">Password</label>
                    <input type="text" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />
                </div>

                <div class="mt-3 flex justify-between items-center">
                    <div>
                        <input type="checkbox" id="chckbox">
                        <label for="chckbox">Remember me?</label>
                    </div>
                    <div>
                        <a href="#" class="text-indigo-800 font-semibold">Forgot password</a>
                    </div>
                </div>
                {{-- sign Up --}}
                <div>
                    <p>Dont have acount yet? <a href=" {{ route('register') }}"
                            class="text-indigo-800 font-semibold">Sign Up</a></p>
                </div>
          </div>
          <button class="mt-4 w-full bg-gradient-to-tr from-red-600 to-red-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">Register</button>
        </div>
      </form>
</div>



</body>
</html>