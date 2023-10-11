@extends('layouts.main')

@section('main-container')

<div class="container">
    <div class="form__tabs__wrap">
        <h1>Books List</h1>
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
                    <td>Title</td>
                    <td>Release Date</td>
                    <td>Number of pages</td>
                </tr>
            </thead>
            <tbody>
                @if (count($books) > 0)
                @foreach($books as $data)
                <tr>
                    <td>{{ $data['title']}}</td>
                    <td>{{ $data['release_date']}}</td>
                    <td>{{ $data['number_of_pages']}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>


@endsection