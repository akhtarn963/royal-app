@extends('layouts.main')

@section('main-container')

<div class="container">
    <div class="form__tabs__wrap">
        <h1>Edit Book</h1>
        <form action="{{ route('books.update',$book['id']) }}" method="POST">
            @csrf
            <div class="form__grp">
                <label for="email">Author </label>
                <select id="author" name="author" placeholder="Your author" class="form-control">
                    @foreach($authors as $data)
                    <option value="{{$data['id']}} "
                        {{ $data['id'] == $book['author']['id'] ? 'selected="selected"' : '' }}>{{$data['first_name']}}
                        {{$data['last_name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form__grp">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Book Title" class="form-control"
                    value="{{$book['title']}}">
            </div>
            <div class="form__grp">
                <label for="release_date">Release Date</label>
                <input type="date" id="release_date" name="release_date" placeholder="Your release_date"
                    class="form-control" value="{{$book['release_date']}}">
            </div>
            <div class="form__grp">
                <label for="description">description</label>
                <input type="text" id="description" name="description" placeholder="Your description"
                    class="form-control" value="{{$book['description']}}">
            </div>
            <div class="form__grp">
                <label for="isbn">isbn</label>
                <input type="text" id="isbn" name="isbn" placeholder="Your isbn" class="form-control"
                    value="{{$book['isbn']}}">
            </div>
            <div class="form__grp">
                <label for="format">format</label>
                <input type="text" id="format" name="format" placeholder="Your format" class="form-control"
                    value="{{$book['format']}}">
            </div>
            <div class="form__grp">
                <label for="number_of_pages">number_of_pages</label>
                <input type="number" id="number_of_pages" name="number_of_pages" placeholder="number_of_pages"
                    class="form-control" value="{{$book['number_of_pages']}}">
            </div>
            <div class="create__btn">
                <button type="submit" class="cmn--btn">
                    <span>Update</span>
                </button>
            </div>

        </form>
    </div>
</div>


@endsection