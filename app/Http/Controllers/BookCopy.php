<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookCopy extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $books = Book::all();

        foreach ($books as $book) {

            $borrowedCopies=DB::table('book_copies')
                ->where('book_id', $book->id)
                ->count();
            $borrowedCopiesReserve=DB::table('book_copies')
                ->where('book_id', $book->id)
                ->where('status','borrowed')
                ->count();
            $reservationsCount = DB::table('reservations')
                ->where('book_id', $book->id)
                ->count();
            // Vous pouvez maintenant utiliser $borrowedCopies et $reservationsCount pour chaque livre
            // ...

            // Ou bien, vous pouvez ajouter ces informations au modèle Book lui-même
            $book->borrowedCopies = $borrowedCopies;
            $book->reservationsCount = $reservationsCount;
            $book->borrowedCopiesReserve =$borrowedCopiesReserve;
        }

        return view('booksReserve', compact('books'));
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
