@extends('template')

@section('style')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
@endsection

@section('title', isset($book) ? 'Edit' : 'Create')

@section('content')

    <form action="{{isset($book) ? route('edit') : route('create')}}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{isset($book) ? $book->id : ''}}">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{isset($book) ? $book->title : ''}}">

        <label for="author">Author</label>
        <input type="text" id="author" name="author" value="{{isset($book) ? $book->author : ''}}">

        <label for="ISBN">ISBN</label>
        <input type="text" id="ISBN" name="ISBN" value="{{isset($book) ? $book->ISBN : ''}}">

        <label for="price">Price</label>
        <input type="number" name="price" id="price" value="{{isset($book) ? $book->price : ''}}">

        <label for="publishingCompany">Publishing Company</label>
        <input type="text" name="publishingCompany" id="publishingCompany" value="{{isset($book) ? $book->publishingCompany : ''}}">

        <label for="releaseYear">Release Year</label>
        <input type="text" name="releaseYear" id="releaseYear" value="{{isset($book) ? $book->releaseYear : ''}}">

        <input type="submit" value="{{isset($book) ? 'Update' : 'Create'}}">
        <a class="back" href="{{route('view.index')}}"> < Back</a>
    </form>

@endsection
