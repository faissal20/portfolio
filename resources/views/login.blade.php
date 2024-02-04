@extends('layouts.app')


@section('content')
    <h1>Hi you !</h1>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input">
            <label for="secret">password</label>
            <input type="secret" name="secret" id="secret" placeholder="the secret word" class="@error('secret') error @endif">
            @error('secret')
                <div class="error-message">wrong secret 😔</div>
            @enderror
            <button type="submit" class="primary-btn">Continue</button>
        </div>
    </form>

@endsection
