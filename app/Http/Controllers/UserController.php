<?php

namespace App\Http\Controllers;

use App\Events\NewUserHasRegistered;
use App\Http\Requests\UserRequest;
use App\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param User $model
     *
     * @return View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Store a newly created user in storage
     *
     * @param Request $request
     * @param User    $model
     *
     * @return
     */
    public function store(Request $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])
                               ->all());

        NewUserHasRegistered::dispatch($request->all());

        return redirect()->route('user.index')
                         ->withStatus('Gebruiker succesvol geregistreerd');
    }

    /**
     * Show the form for creating a new user
     *
     * @return View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Show the form for editing the specified user
     *
     * @param User $user
     *
     * @return RedirectResponse
     */
    public function edit(User $user)
    {
        if ($user->id === 1) {

            return redirect()->route('user.index');

        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified user in storage
     *
     * @param UserRequest $request
     *
     * @param User        $user
     *
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                    ->except([$hasPassword ? '' : 'password']
                    ));

        return redirect()->route('user.index')
                         ->withStatus('Gebruiker succesvol bijgewerkt');
    }

    /**
     * Remove the specified user from storage
     *
     * @param User $user
     *
     * @return void
     *
     * @throws Exception
     */
    public function destroy(User $user)
    {
        if ($user->id === 1) {

            return abort(403);

        }

        $user->delete();

        return redirect()->route('user.index')
                         ->withStatus('Gebruiker succesvol verwijderd');
    }
}
