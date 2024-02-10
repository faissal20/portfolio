@extends('layouts.app')

@section('content')
<div class="section">
    <div class="card">
        <h4>
            Welcome {{ auth()->user()->name }}
        </h4>
    </div>
</div>
@endsection
