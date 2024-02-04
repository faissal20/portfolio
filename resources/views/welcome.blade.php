@extends('layouts.app')
@section('content')
    
<div class="container">
    <h1>
        Hello Tasnim 🌻
    </h1>
    <p>
        I hope you are doing well. <br /><br />
        I know I did something wrong this morning but it's just because you are the first thought in my mind when I wake
        up. <br /><br />
        I hope you will forgive me.
    </p>

    <form action="" method="post" id="form">
        @csrf
        <div class="input hidden" id="messageInput">
            <label for="message">leave a message for me </label>
            <input type="text" placeholder="Message" id="message" name="message">
        </div>
        <button type="submit"  class="primary-btn">Forgive me !</button>
    </form>
</div>

@endsection
