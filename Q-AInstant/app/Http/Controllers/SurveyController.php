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
     * Show all survey, with the count of answers and if it's open or not
     *
     */
    public function index()
    {
        $surveys = Survey::All();

        if ($surveys->count() == 0) {
            return view('teacher')->with('surveys', $surveys);
        } else {
            foreach ($surveys as $survey) {
                $questions = Question::where('survey_id', '=', $survey->id)->get();

                foreach ($questions as $question) {
                    $answers[$survey->id] = Answer::where('question_id', '=', $question->id)->count();
                }
            }
            return view('teacher')->with('surveys', $surveys)->with('nbanswers', $answers);
        }
    }

    // Open the selected Survey
    public function open($id)
    {

        $open = Survey::where('open', '1')->first();

        if ($open != null) {
            return redirect('/teacher');
        } else {
            Survey::where('id', '=', $id)->first()->update(['open' => 1]);
            return redirect('/teacher');
        }
    }

    // Close the selected Survey
    public function close($id)
    {

        Survey::where('id', '=', $id)->first()->update(['open' => 0]);

        return redirect('/teacher');

    }

    /**
     * Create a new survey
     *
     */
    public function create(Request $request)
    {

        $survey = new Survey;
        $survey->name = $request->name;
        $survey->save();


        return redirect('addSurvey');
    }

    /**
     * Show the "AddSurvey" page
     *
     */
    public function createindex()
    {
        $QuestionNumber = 1;
        return view('addSurvey')->with('Qn', $QuestionNumber);
    }

    // Store the new survey with all questions (10 max)
    public function store(Request $request)
    {
        //create a new survey and all his questions
        $oneShotReset = rand(0000,9999);
        $survey = new Survey;
        $survey->name = $request->name;
        $survey->oneShotReset = $oneShotReset;
        $survey->save();

        foreach ($request->question as $entitled) {
            $question = new Question;
            $question->entitled = $entitled;
            $question->survey_id = $survey->id;
            $question->save();
        }

        return redirect('/teacher');

    }

    // Show the "Open" Survey, to answer
    /* BUG
    Only the first question are checked if you have already answer it.
    It's int the if part.

    idea for resolve the bug : check if the $answer array is empty, if yes, don't enter in the foreach
        (if you try to remove the if(isset($answer[$key]) ). It will working but add an other bug :
        Error offset 0 if you don't have answers the survey.
    */
    public function show(Request $request)
    {
        $survey = Survey::where('open', '1')->first();
        if ($survey == null) {
            return view('doSurvey')->with('survey', $survey);
        }
            $questions = Question::where('survey_id', $survey->id)->get();

            foreach ($questions as $question)
            {
                $answers[] = Answer::where('question_id', '=', $question->id)->where('client', '=', $request->getClientIp())->get();
            }
            foreach ($answers as $key => $answer)
            {
                // check only if the first answer is answered by the same ip
                if(isset($answer[$key]) )
                {
                    if ($answer[$key]->client != null)
                    {
                        return view('alreadyDone');
                    }
                }

            }
            return view('doSurvey')->with('survey', $survey)->with('questions', $questions);

    }

    // Save all the answers of the current survey
    public function answer(Request $request)
    {
        $ip = $request->getClientIp();

        foreach ($request->answer as $key => $question) {
            $answer = new Answer;
            $answer->question_id = $key;
            $answer->client = $ip;
            if ($question == null) {
                continue;
            } else {
                $answer->answer = $question;
                $answer->save();
            }
        }
        $thanksmessage = "Merci d'avoir répondu au questionnaire";

        return view('thanks')->with('thanks', $thanksmessage);
    }

    //return the survey with all his questions and answers
    public function results($id)
    {

        $surveys = Survey::where('id', "=", $id)->first();
        $questions = Question::where('survey_id', "=", $id)->get();

        foreach ($questions as $question) {
            $answers[$question->id] = Answer::where('question_id', '=', $question->id)->get();
        }

        return view('resultSurvey')->with('surveys', $surveys)->with('questions', $questions)->with('answers', $answers);
    }

    // delete the Survey $id from the database, with all the question and answers linked to him
    public function delete($id)
    {
        $survey = Survey::where('id', "=", $id)->first();
        $questions = Question::where('survey_id', "=", $id)->get();
        foreach ($questions as $question) {
           Answer::where('question_id', '=', $question->id)->get()->each->delete();
        }
        Question::where('survey_id', "=", $id)->get()->each->delete();
        Survey::where('id', "=", $id)->delete();

        return redirect('teacher');
    }

    // delete questions of the same client, and reload a new code to reset answers
    public function delAnswers(Request $request)
    {
        $codesurvey = $open = Survey::where('open', '1')->first();

        if ($request->code == $codesurvey->oneShotReset)
        {
             Answer::where('client', '=', $request->getClientIp())->delete();
             // change the code of survey
            $oneShotReset = rand(0000,9999);
            Survey::where('open', '1')->update(['oneShotReset'=> $oneShotReset]);

            return redirect('/');
        }else
        {
            return view('alreadyDone');
        }


    }
}
