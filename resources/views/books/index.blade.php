@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Book Listings</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Listing</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="row">
            @forelse($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/photos/' . $book->photo_filename) }}" class="card-img-top" alt="{{ $book->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">Author: {{ $book->author }}</p>
                            <p class="card-text">Course: {{ $book->course_code }}</p>
                            <p class="card-text">Price: ${{ number_format($book->price, 2) }}</p>
                            <p class="card-text">Condition: {{ $book->condition }}</p>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No books listed yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection