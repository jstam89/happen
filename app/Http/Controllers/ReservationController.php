<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

        $reservations = Reservation::orderBy('id')->get();

        return view('reservation.index')->with('reservations', $reservations);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return void
     */
    public function create(Request $request)
    {

        $date = $request->input('reserved_date');

        if ( ! $date) {

            return redirect('/reservation')->withStatus('Kies een datum');

        }

        $reservation                = new Reservation();
        $reservation->quantity      = $request->input('quantity');
        $reservation->reserved_date = $request->input('reserved_date');
        $reservation->user_id       = $request->user()->id;

        $reservation->save();

        return redirect('/reservation')->withStatus('Tafel gereserveerd');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return Response
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
        $reservations = Reservation::all();

        return view('reservation.manage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Reservation $reservation
     *
     * @return Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Reservation              $reservation
     *
     * @return Response
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
     * @return Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
