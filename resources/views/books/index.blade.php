@extends('layouts.main')

@section('main-container')

<div class="container">
    <div class="form__tabs__wrap">
        <h1>Book List</h1>
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
        <a href="{{route('books.add')}}"><button type="button" class="btn">Add New</button></a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <td>Title</td>
                    <td>Release Date</td>
                    <td>Number of pages</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if (count($books) > 0)
                @foreach($books as $data)
                <tr>
                    <td>{{ $data['title']}}</td>
                    <td>{{ $data['release_date']}}</td>
                    <td>{{ $data['number_of_pages']}}</td>
                    <td><a href="{{ route('books.edit',$data['id'])}}">Edit</a> | <a
                            href="{{ route('books.delete',$data['id'])}}">Delete</a></td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>


@endsection