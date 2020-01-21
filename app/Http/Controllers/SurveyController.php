<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $surveys = Survey::all();

        return view('surveys.index')->with('surveys', $surveys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('surveys.create');
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
        Survey::create([
            'name'     => $request->name,
            'type'     => $request->type,
            'isActive' => $request->isActive === 'on',
        ]);

        return redirect()->route('survey.index')
                         ->withStatus('Survey toegevoegd.');

    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Factory|View
     */
    public function show(Request $request)
    {

        return view('surveys.show',

            ['survey' => Survey::with('questions')->findOrFail(1)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Survey $survey
     *
     * @return void
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     *
     * @param Survey  $survey
     *
     * @return void
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Survey $survey
     *
     * @return void
     */
    public function destroy(Survey $survey)
    {
        //
    }
}
