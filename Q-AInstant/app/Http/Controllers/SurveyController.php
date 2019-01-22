<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::All();
        return view('teacher')->with('surveys', $surveys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // https://stackify.com/laravel-eloquent-tutorial/
        $survey = new Survey;
        $survey->name = $request->name;
        $survey->description = $request->description;

        $survey->save();

        /* or try this ?
        Survey::create(array(
            'name' => $survey->name,
            'description' => $survey->description,
            'created_at' => time(),
            'update_at' => time()
        ));
        */
        return redirect('addSurvey');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //select a table of all the surveys
        $surveys = surveys::all;
        return view('teacher')->with('surveys', $surveys);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$survey = surveys::where('id', "=", "$id")->first();
        $survey = surveys::where('id', "=", "$id");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function results($id){

        //return the survey with all his questions and answers

        $surveys = Survey::where('id', "=", $id)->first();
        $questions = Question::where('survey_id', "=", $id)->get();
        $idquestion = Question::where('survey_id', "=", $id)->first();
        $answers = Answer::where('question_id', "=", "$idquestion->id")->get();
        return view ('resultSurvey')->with('surveys', $surveys)->with('questions', $questions)->with('answers', $answers)->with('idq', $idquestion);
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
