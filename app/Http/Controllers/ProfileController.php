<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{

    /**
     * Show the form for editing the profile.
     *
     * @return View
     */
    public function edit()
    {
        $orders = auth()->user()->orders()->get();

        return view('profile.edit')->with('orders', $orders);
    }

    /**
     * Update the profile
     *
     * @param $request
     *
     * @return RedirectResponse
     */
    public function update($request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus('Profiel is aangepast');
    }

    /**
     * Change the password
     *
     * @param $request
     *
     * @return RedirectResponse
     */
    public function password($request)
    {
        $request->user()->fill([
            'password' => Hash::make($request->get('password'))
        ])->save();

        return back()->withPasswordStatus('Wachtwoord is veranderd');
    }
}
