<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Order;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $menus = Menu::orderBy('id', 'asc')->get();

        return view('order.index')->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     * @return Factory|View
     */
    public function create()
    {
        //
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
     * @return Factory|View
     * @throws Exception
     */
    public function show()
    {


        $orders = Order::all();

        return view('order.overview')->with('orders', $orders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
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
