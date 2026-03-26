<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'course_code' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'condition' => 'required|in:New,Good,Fair,Poor',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $photoPath = $request->file('photo')->store('photos', 'public');
        $photoFilename = basename($photoPath);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'course_code' => $request->course_code,
            'price' => $request->price,
            'condition' => $request->condition,
            'description' => $request->description,
            'photo_filename' => $photoFilename,
        ]);

        return redirect()->route('books.index')->with('success', 'Book listing added successfully!');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }
}
