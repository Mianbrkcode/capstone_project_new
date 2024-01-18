<div class="max-w-md bg-white p-8 rounded shadow-md">

    <h1 class="text-3xl font-bold mb-4">Good day!</h1>

    <p>
        Hi <span class="font-bold">{{ $addUserdata['responder_name'] }}</span>,
        <br>
        Your password was successfully reset in emergency response system E-ligtas. <br>

        This is your account: <br>

        <strong>Username :</strong> {{ $addUserdata['username'] }} <br>
        <strong>Password :</strong> {{ $addUserdata['password'] }}
    </p>

</div>