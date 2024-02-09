@extends('layouts.app')


@section('content')

    <h1>Hi you !</h1>
    <div class="section">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input">
                <label for="secret">password</label>
                <input type="secret" name="secret" id="secret" placeholder="the secret word" class="@error('secret') error @endif">
                @error('secret')
                    <div class="error-message">wrong secret 😔</div>
                @enderror
                <button type="submit" class="btn-pirmary">Continue</button>
            </div>
        </form>
    </div>

@endsection
