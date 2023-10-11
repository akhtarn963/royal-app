@extends('layouts.main')

@section('main-container')

<div class="container">
    <div class="form__tabs__wrap">
        <h1>Authors List</h1>
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

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Gender</td>
                    <td>Birth Place</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $author['first_name']}}</td>
                    <td>{{ $author['last_name']}}</td>
                    <td>{{ $author['gender']}}</td>
                    <td>{{ $author['place_of_birth']}}</td>
                </tr>
                <tr>
                    <td>
                        <h3>Book List</h3>
                    </td>
                </tr>
                @if (count($author['books']) > 0)
                @foreach($author['books'] as $data)
                <tr>
                <tr>
                    <td>{{ $data['title']}}</td>
                    <td>{{ $data['release_date']}}</td>
                    <td>{{ $data['number_of_pages']}}</td>
                    <td><a href="{{ route('author.book.delete',[$author['id'],$data['id']])}}">Delete</a></td>
                </tr>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>


@endsection