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
        <a href="{{route('author.add')}}"><button type="button" class="btn">Add New</button></a>
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
                @if (count($authors) > 0)
                @foreach($authors as $data)
                <tr>
                    <td>{{ $data['first_name']}}</td>
                    <td>{{ $data['last_name']}}</td>
                    <td>{{ $data['gender']}}</td>
                    <td>{{ $data['place_of_birth']}}</td>
                    <td><a href="{{ route('author.view',$data['id'])}}">View</a> | <<a
                            href="{{ route('author.edit',$data['id'])}}">Edit</a> | <a
                                href="{{ route('author.delete',$data['id'])}}">Delete</a></td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>


@endsection