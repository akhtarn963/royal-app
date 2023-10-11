@extends('layouts.main')

@section('main-container')

<div class="container">
    <div class="form__tabs__wrap">
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if ((session('message')))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form__grp">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your email address" class="form-control"
                    required autofocus>
            </div>
            <div class="form__grp">
                <label for="toggle-password9">Password</label>
                <input id="toggle-password9" type="password" placeholder="Your Password" name="password"
                    class="form-control" required>
                <span id="#password" class="fa fa-fw fa-eye field-icon toggle-password9"></span>
            </div>
            <div class="create__btn">
                <button type="submit" class="cmn--btn">
                    <span>Login</span>
                </button>
            </div>

        </form>
    </div>
</div>


@endsection