@extends('layouts.main')

@section('main-container')

<div class="container">
    <div class="form__tabs__wrap">
        <h1>Add Author</h1>
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
        <form action="{{ route('post.author') }}" method="POST">
            @csrf
            <div class="form__grp">
                <label for="email">First Name</label>
                <input type="text" id="first_name" name="first_name" placeholder="Your first name" class="form-control">
            </div>
            <div class="form__grp">
                <label for="email">Last Name</label>
                <input type="text" id="last_name" name="last_name" placeholder="Your last name" class="form-control">
            </div>
            <div class="form__grp">
                <label for="email">DOB</label>
                <input type="date" id="birthday" name="birthday" placeholder="Your birthday" class="form-control">
            </div>
            <div class="form__grp">
                <label for="email">bio</label>
                <input type="text" id="biography" name="biography" placeholder="Your biography" class="form-control">
            </div>
            <div class="form__grp">
                <label for="email">Gender</label>
                <select class="form-control" name="gender">
                    <option value="male">Male</option>
                    <option value="female">FeMale</option>
                </select>
            </div>
            <div class="form__grp">
                <label for="email">Place of birth</label>
                <input type="text" id="place_of_birth" name="place_of_birth" placeholder="Your place of birth"
                    class="form-control">
            </div>
            <div class="create__btn">
                <button type="submit" class="cmn--btn">
                    <span>Add</span>
                </button>
            </div>

        </form>
    </div>
</div>


@endsection