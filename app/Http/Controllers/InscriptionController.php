<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inscriptions', [
            'inscriptions' => Inscription::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inscription');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        Inscription::create($request->all());

        return view('welcome');
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
        Inscription::destroy($id);

        return redirect()->route('inscriptions.index');
    }


    public function accept(string $id)
    {
        $inscription = Inscription::find($id);

        $RegisterController = new RegisterController();

        $RegisterController->create($inscription->toArray());

        $memberController = new MemberController();


        $memberController->createMember($inscription);



        Inscription::destroy($id);

        return redirect()->route('members.index');
    }
}
