@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        Good Morning My Everything !
    </h1>

    <p>
        You know since you are busy this days. I just want to say Good Luck, Be Happy and Have a nice day.
    </p>
    <p>
        Aslo I am thinking of you all the time. 
    </p>
    
    <br>

    <p>
        * since you didn't see the message this morning I will wish you a BUENAS NOCHES MI TODO and maybe tomorrow I will more things. 
    </p>

    <form action="" method="post" id="form">
        @csrf
        <div class="input" id="messageInput">
            <label for="message">leave a message for me </label>
            <textarea type="text" placeholder="Message" rows="4" cols="50" id="message" name="message"></textarea>
        </div>
        <button type="submit"  class="btn-primary">Send</button>
    </form>

</div>

@endsection