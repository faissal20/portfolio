@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        Tasnim
    </h1>

    <p>
        So many sunflowers in this world, but you are the one that shines the most. 🌻
    </p>

    <form action="" method="post" id="form">
        @csrf
        <div class="input" id="messageInput">
            <label for="message">leave a message for me </label>
            <textarea type="text" placeholder="Message" rows="4" cols="50" id="message" name="message"></textarea>
        </div>
        <button type="submit"  class="primary-btn">Send</button>
    </form>

</div>

@endsection