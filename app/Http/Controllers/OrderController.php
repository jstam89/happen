<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
        $orders = $request->input('cart');

        if ( ! $orders) {

            return redirect('/order')->withStatus('Geen menu geselecteerd');

        }

        foreach ($orders as $product) {

            $order             = new Order();
            $order->menu_id    = $product['menu_id'];
            $order->quantity   = $product['quantity'];
            $order->user_id    = $request->user()->id;
            $order->ordered_at = Carbon::now();

            $order->save();
        }

        return redirect('/order')->withStatus('Uw menu is besteld');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public
    function show(
        $id
    ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public
    function edit(
        $id
    ) {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public
    function update(
        Request $request,
        $id
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return void
     */
    public
    function destroy(
        $id
    ) {
        dd($menu->id);
    }
}
