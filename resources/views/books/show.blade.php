@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1>{{ $book->title }}</h1>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/photos/' . $book->photo_filename) }}" class="img-fluid" alt="{{ $book->title }}">
            </div>
            <div class="col-md-8">
                <p><strong>Author:</strong> {{ $book->author }}</p>
                <p><strong>Course Code:</strong> {{ $book->course_code }}</p>
                <p><strong>Price:</strong> ${{ number_format($book->price, 2) }}</p>
                <p><strong>Condition:</strong> {{ $book->condition }}</p>
                <p><strong>Description:</strong></p>
                <p>{{ $book->description }}</p>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Listings</a>
            </div>
        </div>
    </div>
</div>
@endsection