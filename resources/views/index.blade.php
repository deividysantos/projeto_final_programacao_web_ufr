@extends('template')

@section('style')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('title', 'Dashboard')

@section('content')
    <a class="btn" href="{{route('view.create')}}">Sign in a new book</a>

    @foreach($books as $book)
        <div class="book">
            <p class="nameBook">{{ $book->title }}</p>
            <div>
                <p><span>Author:</span> {{ $book->author }}</p>
                <p><span>ISBN:</span> {{ $book->ISBN }}</p>
                <p><span>Price:</span> {{ $book->price }}</p>
                <p><span>Publishing Company:</span> {{ $book->publishingCompany }}</p>
                <p><span>Release Year:</span> {{ $book->releaseYear }}</p>
            </div>

            <div class="options">
                <a class="edit" href="{{route('view.edit', $book->id)}}"><x-eos-edit class="svg"/></a>

                <a class="delete" href="{{route('delete', $book->id)}}"><x-eos-delete class="svg"/></a>
            </div>

        </div>

    @endforeach
@endsection
