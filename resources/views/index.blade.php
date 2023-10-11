@extends('layouts.main')

@section('main-container')

<div class="container">

    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if ((session('error')))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <h3>Inverted Navbar</h3>
    <p>An inverted navbar is black instead of gray.</p>
</div>


@endsection