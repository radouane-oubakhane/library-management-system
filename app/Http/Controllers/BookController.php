<?php

namespace App\Http\Controllers;

use App\DTO\BookResponse;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return 'List of books from the database using the books model';

        $books = Book::all();

        $book_responses = $books->map(function ($book) {
            return new BookResponse(
                $book->id,
                $book->title,
                $book->author->first_name,
                $book->author->last_name,
                $book->bookCategory->name,
                $book->isbn,
                $book->description,
                $book->stock,
                $book->publisher,
                $book->published_at,
                $book->language,
                $book->edition,
            );
        });

        return view('books', [
            'books' => $book_responses
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
