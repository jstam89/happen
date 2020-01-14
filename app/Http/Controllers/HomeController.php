<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index()
    {

        $users = User::orderBy('id', 'desc')->get();

        return view('dashboard')->with('users', $users);

    }
}
