<h1>Your Email has been used for Registration</h1>

<p>
    Hi {{ $userData['responder_name'] }}  your email <b>{{  $userData['email'] }}</b>

    Please click Confirmed to verify your Account <br>
    <button style="color:blue"><a href="{{ $userData['link'] }}"> Confirmed </a></button>
</p>