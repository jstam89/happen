<?php

namespace App\Http\Controllers;

use App\Reservation;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $reservations = Reservation::all();

        return view('reservation.index')->with('reservations', $reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return
     */
    public function create(Request $request)
    {
        $date = $request->input('reserved_date');

        if ( ! $date) {

            return redirect()->route('reservation.index')
                             ->withStatus('Kies een datum');

        }

        Reservation::create([
            'quantity'      => $request->quantity,
            'reserved_date' => $request->reserved_date,
            'user_id'       => $request->user()->id,
        ]);

        return redirect()->route('reservation.index')
                         ->withStatus('Tafel is gereserveerd');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return Factory|View
     */
    public function show()
    {
        $reservations = Reservation::with('user')->get();

        return view('reservation.manage')->with('reservations', $reservations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Reservation $reservation
     *
     * @return void
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request     $request
     * @param Reservation $reservation
     *
     * @return void
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reservation $reservation
     *
     * @return
     * @throws Exception
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.manage')
                         ->withStatus('Reservering succesvol verwijderd');
    }
}
