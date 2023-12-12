<?php

namespace App\Http\Controllers;

use App\DTO\ReservationResponse;
use App\Models\BookCopy;
use App\Models\Borrow;
use App\Models\Member;
use App\Models\Reservation;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();

        $reservationResponse = $reservations->map(function ($reservation) {
            return new ReservationResponse(
                $reservation->id,
                $reservation->book->title,
                $reservation->book->isbn,
                $reservation->member->first_name,
                $reservation->member->last_name,
                $reservation->reserved_at,
                $reservation->canceled_at ?? '',
                $reservation->expired_at??''
            );
        });

        return view('reservations', [
            'reservations' => $reservationResponse,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id_book,$id_member){

        $book = Book::findOrFail($id_book);
        $member = Member::findOrFail($id_member); // Make sure you have a Member model

        // Check if the book is still in stock
        if ($book->stock > 0) {
            // Create a new reservation
            Reservation::create([
                'book_id' => $book->id,
                'member_id' => $member->id,
                'reserved_at' => now(),
                'expired_at'=>now()

            ]);

            // Decrease the stock of the book
            $book->decrement('stock');

            // You can redirect the user or show a success message
            return redirect()->route('reservations.show',$id_member)->with('success', 'Book reserved successfully!');
        } else {
            // The book is out of stock
            return redirect()->route('reservations.show',$id_member)->with('error', 'Sorry, the book is out of stock.');
        }



    }

    public function showReservableBooks()
    {
        $reservableBooks = Book::where('stock', '>', 0)->get();

        return view('showReservableBooks', compact('reservableBooks'));
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
        $reservations=Reservation::where("member_id",$id)
            ->get();
        $reservationResponse = $reservations->map(function ($reservation) {
            return new ReservationResponse(
                $reservation->id,
                $reservation->book->title,
                $reservation->book->isbn,
                $reservation->member->first_name,
                $reservation->member->last_name,
                $reservation->reserved_at

            );
        });

        return view('reservationMembers', [
            'reservations' => $reservationResponse,
        ]);


    }

    public function getReservationByMembersId(string $id){

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
    $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('reservations.index');
    }
    public function destroyByMember(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        //get id_member from session
        return redirect()->route('reservations.show',2);
    }



    public function acceptReservation($reservationId)
    {
        // Récupérer la réservation
        $reservation = Reservation::findOrFail($reservationId);

        // Vérifier si la réservation est toujours en attente d'acceptation
        

        // Créer une ligne dans la table Borrow
        $borrow = Borrow::create([
            'book_id' => $reservation->book_id,
            'book_copy_id' => $this->findAvailableCopy($reservation->book_id),
            'member_id' => $reservation->member_id,
            'borrow_date' => now(),
            'return_date' => null, // La date de retour sera mise à jour lorsque le livre sera retourné
            'status' => 'borrowed', // Vous pouvez utiliser un état ou un autre champ selon vos besoins
        ]);

        // Marquer la réservation comme acceptée en mettant à jour les champs appropriés

        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'La réservation a été acceptée avec succès.');
    }

    // ...

    // Fonction pour trouver une copie de livre disponible
    private function findAvailableCopy($bookId)
    {
        $availableCopy = BookCopy::where('book_id', $bookId)
            ->whereDoesntHave('borrows', function ($query) {
                $query->where('status', 'emprunté');
            })
            ->first();

        if ($availableCopy) {
            return $availableCopy->id;
        }

        // Gérer le cas où aucune copie disponible n'est trouvée (peut-être générer une exception ou un message d'erreur)
        // ...

        return null;
    }
}
