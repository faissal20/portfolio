@extends('layouts.app')
@section('content')
    <div class="container">
        
        <h1>
            Good Morning My Everything !
        </h1>

        <p>
            You know since you are busy this days. 
        </p>

        <form action="" method="post" id="form">
            @csrf
            <div class="input hidden" id="messageInput">
                <label for="message">leave a message for me </label>
                <input type="text" placeholder="Message" id="message" name="message">
            </div>
            <button type="submit" class="primary-btn">Forgive me !</button>
        </form>
    </div>
@endsection
