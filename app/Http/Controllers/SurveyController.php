<?php

namespace App\Http\Controllers;

use App\Survey;
use App\SurveyQuestion;
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
        $surveys   = Survey::orderBy('id', 'asc')->get();
        $questions = SurveyQuestion::all();

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
        $input = $request->all();

        $survey           = new Survey();
        $survey->name     = $input['name'];
        $survey->type     = $input['type'];
        $survey->isActive = $input['isActive'] === 'on';
        $survey->save();

        return redirect()->route('survey.index')
                         ->withStatus(__('Survey toegevoegd.'));

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return Factory|View
     */
    public function show($id)
    {
        return view('surveys.show',
            ['survey' => Survey::with('questions')->findOrFail($id)]);
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
