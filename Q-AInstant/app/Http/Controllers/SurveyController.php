<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Survey;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\String_;
use PHPUnit\Framework\Constraint\Attribute;

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
        foreach ($surveys as $survey)
        {
            $questions = Question::where('survey_id', '=',$survey->id)->get();

            foreach ($questions as $question)
            {
                $answers[$survey->id] = Answer::where('question_id', '=', $question->id)->count();
            }
           // pour chaque tableau, liste les questions

                //pour chaque question, compte les réponses
            // $Acompter = Answer::where('question_id', '=', )->count();
        }

        return view('teacher')->with('surveys', $surveys)->with('nbanswers', $answers);
    }
    public function open($id){

        $open = Survey::where('open', '1')->first();

        if($open != null)
        {
            return redirect('/teacher');
        }
        else{
            Survey::where('id', '=', $id)->first()->update(['open' => 1]);
            return redirect('/teacher');
        }
     }

    public function close($id){


        Survey::where('id', '=', $id)->first()->update(['open' => 0]);
        //
        return redirect('/teacher');
        //self::results($id);
        //return view('')
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //Faire un tableau contenant toutes les questions et les parcourires avec un foreach ?
        // ou je sais pas. faire mieux ? :)

        // https://stackify.com/laravel-eloquent-tutorial/
        $survey = new Survey;
        $survey->name = $request->name;


        //$survey->description = $request->description;

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

    public function createindex(){
        $QuestionNumber = 1;
        return view('addSurvey')->with('Qn', $QuestionNumber);
    }


    // all the honor are given to "Jarodo Mexico, the best Bro"
    public function store(Request $request)
    {
        //create a new survey and all his questions

        $survey = new Survey;
        $survey->name = $request->name;
        $survey->save();

        foreach ($request->question as $entitled)
        {
            $question = new Question;
            $question->entitled = $entitled;
            $question->survey_id = $survey->id;
            $question->save();
        }

        return redirect('/teacher');

        // have all the question in a table


        //foreach Qnumber stock la question dans le tableau -> store ?
        // check les relations pour stocker les questions


        //$survey->save();

        //$surveys = Survey::all();
      //return view('teacher')->with('surveys', $surveys);
    }

    public function show()
    {
        $survey = Survey::where('open','1')->first();
        $questions = Question::where('survey_id', $survey->id)->get();

        return view('doSurvey')->with('survey', $survey)->with('questions', $questions);
    }

    public function answer(Request $request)
    {

        foreach($request->answer as $key=>$question)
        {
            // ajout des questions dans la BDD
            $answer = new Answer;
            $answer->question_id = $key;
            $answer->answer = $question;
            $answer->save();
        }

        return redirect('/');
    }


    public function results($id){

        //return the survey with all his questions and answers

        $surveys = Survey::where('id', "=", $id)->first();
        $questions = Question::where('survey_id', "=", $id)->get();

        foreach($questions as $question) {
            $answers[$question->id] = Answer::where('question_id', '=', $question->id)->get();
        }


        return view ('resultSurvey')->with('surveys', $surveys)->with('questions', $questions)->with('answers', $answers);
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
