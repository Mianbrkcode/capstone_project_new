<h1>Your Email has been used for Registration</h1>

<p>
    Hi {{ $addUserdata['responder_name'] }} </b>

    Your email was successfully registered in emergency response system E-ligtas. <br><br>

    This is your account: <br>

    Email : {{ $addUserdata['email'] }} <br>
    Username : {{ $addUserdata['username'] }} <br>
    Password : {{ $addUserdata['password'] }} <br><br>

    Click here to verify and proceed to login. <br>
    <button style="color:blue"><a href="{{ $addUserdata['link'] }}"> Confirm Account </a></button>

</p>


