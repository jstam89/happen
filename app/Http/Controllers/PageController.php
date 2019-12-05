<?php

namespace App\Http\Controllers;

use App\Menu;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class PageController extends Controller
{

    /**
     * @return Factory|View
     */
    public function home() //get record of tomorrow for ordering
    {
        $menus = Menu::whereDate('takeout_date', '>', Carbon::now())
                     ->orderBy('takeout_date', 'asc')
                     ->get();

        return view('order.index')->with('menus', $menus);
    }

    /**
     * Display reviews page
     *
     * @return View
     */
    public function menus()
    {
        $menus = Menu::orderBy('id', 'asc')->get();

        return view('order.create.menus')->with('menus', $menus);
    }

    /**
     * Display reviews page
     *
     * @return View
     */
    public function review()
    {
        return view('order.reviews');
    }

    /**
     * Display tables page
     *
     * @return View
     */
    public
    function tables()
    {
        return view('pages.tables');
    }

    /**
     * Display notifications page
     *
     * @return View
     */
    public
    function notifications()
    {
        return view('pages.notifications');
    }

    /**
     * Display rtl page
     *
     * @return View
     */
    public
    function rtl()
    {
        return view('pages.rtl');
    }

    /**
     * Display typography page
     *
     * @return View
     */
    public
    function typography()
    {
        return view('pages.typography');
    }

    /**
     * Display upgrade page
     *
     * @return View
     */
    public
    function upgrade()
    {
        return view('pages.upgrade');
    }
}
