@extends('layouts.app')


@section('content')
    <div class="section login">
        <div class="card">
            <h1>Hi you ! <span class="waving">👋</span></h1>

            @if (session('status'))
                <div class="alert error" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input">
                    <label for="usernaem">username</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" placeholder="username"
                        class="@error('username') error @endif">
                        <div class="error-message">
                            @error('username')
                                wrong username 😔
                            @enderror
                        </div>
                </div>
                <div class="input">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" {{ old('password') }}
                        placeholder="the secret word"
                        class="@error('password') error @endif">
                        <div class="error-message">
                            @error('password')
                                wrong secret 😔
                            @enderror
                        </div>
                </div>
                <button type="submit"
                        class="btn-primary">Continue</button>
            </form>
        </div>
    </div>
@endsection
