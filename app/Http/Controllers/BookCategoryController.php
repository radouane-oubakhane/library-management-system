<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('book-categories', [
            'book-categories' => BookCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-book-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        BookCategory::create($request->all());

        return redirect()->route('book-categories.index');
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
        return view('edit-category', [
            'category' => BookCategory::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = BookCategory::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('book-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = BookCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('book-categories.index');
    }
}
