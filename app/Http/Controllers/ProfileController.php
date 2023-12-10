<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function show(string $id){
        $member = DB::table('members')
            ->where("id", $id)
            ->get();
        foreach ($member as $m) {
            $m->bookCopy = DB::table('borrows')
                ->join('book_copies', 'book_copies.id', '=', 'borrows.book_copy_id')
                ->join('books', 'books.id', '=', 'book_copies.book_id')
                ->where('borrows.member_id', $id)
                ->select('book_copies.status', 'books.title', 'borrows.borrow_date')->get();
        }

//        $user->bookCopy=
        return view('profile', compact('member'));
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
