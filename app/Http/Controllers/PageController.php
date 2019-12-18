<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class PageController extends Controller
{

    /**
     * @return Factory|View
     */
    public function home()
    {
        //
    }

    /**
     * Display menus page
     *
     * @return View
     */
    public function menus()
    {
        $menus = Menu::orderBy('id', 'asc')->get();

        return view('order.create.menus')->with('menus', $menus);
    }

    /**
     * @return Factory|View
     */
    public function order()
    {
        $menus = Menu::orderBy('id', 'asc')->get();

        return view('order.index')->with('menus', $menus);
    }

    /**
     * Display reviews page
     *
     * @return View
     */
    public function overview()
    {
        return view('order.overview');
    }

    /**
     * Display reservation page
     *
     * @return View
     */
    public function reservation()
    {
        return view('reservation.submit');
    }

}
