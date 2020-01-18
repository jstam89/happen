<?php

namespace App\Http\Controllers;

use App\Events\OrderConfirmed;
use App\Menu;
use App\Order;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
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
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $order             = new Order();
        $order->user_id    = auth()->user()->id;
        $order->menu_id    = '1';
        $order->quantity   = '5';
        $order->ordered_at = Carbon::now();
        $order->save();

        OrderConfirmed::dispatch($order);

        return response()->json('Uw menu is besteld', 201);
    }


    /**
     * Display the specified resource.
     *
     * @return Factory|View
     * @throws Exception
     */
    public function show()
    {

        $orders = Order::with('user')->get();

        return view('order.manage')->with('orders', $orders);
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
        die('order met id: ' . $id . ' aanpassen');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     *
     * @return void
     * @throws Exception
     */
    public function destroy(Order $order)
    {
        //check of de request van gebruiker komt of van de admin
        //als van gebruiker redirect to profile
        //als van admin redirect naar order overzicht
        $order->delete();

        return redirect()->route('orders.manage')
                         ->withStatus(__('Order succesvol verwijderd.'));
    }

    public function saveSession(Request $request)
    {
        $request->session()->put('menus', $request->all());
    }
}
