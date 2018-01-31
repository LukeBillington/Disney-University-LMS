<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use \App\Quiz;
use App\Http\Requests\GradeTest;

class TestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.cast');
    }

    public function index() {
        $open = [];
        $complete = [];
        foreach (Auth::user()->quizzes as $quiz) {
            if($quiz->pivot->status == 'completed') {
                array_push($complete, [$quiz, $quiz->pivot->points]);
            } else {
                array_push($open, $quiz);
            }
        }
        return view('test.index')
          ->withOpen($open)
          ->withComplete($complete);
    }

    public function view($quiz_id) {
        $quiz = Quiz::findOrFail($quiz_id);
        $quiz_user = $quiz->users()->findOrFail(Auth::user()->id);
        if($quiz_user->pivot->status == 'completed') {
            return $this->results($quiz);
        } else {
            return $this->open($quiz);
        }
    }

    private function open($quiz) {
        $quiz->users()->updateExistingPivot(Auth::user()->id, [
            'status' => 'opened',
        ]);
        return view('test.open')->withQuiz($quiz);
    }

    public function grade(GradeTest $request, $quiz_id) {
        $quiz = Quiz::findOrFail($quiz_id);
        $points = 0;
        foreach ($quiz->questions as $question) {
            $question->users()->attach(Auth::user()->id, ['answer_id' => $request->input($question->id)]);
            if($question->answer_id == $request->input($question->id)) {
                $points += 1;
            }
        }
        $quiz->users()->updateExistingPivot(Auth::user()->id, [
            'status' => 'completed',
            'points' => $points,
        ]);
        return $this->results($quiz);
    }

    private function results($quiz) {
        $results = [];
        $resources = [];

        foreach ($quiz->questions as $question) {
          $question_user = $question->users()->findOrFail(Auth::user()->id);
          $user_answer = $question_user->pivot->answer_id;
          $correct = $user_answer == $question->answer_id;
          $results[$question->id] = [
            'answer' => $question->answer_id,
            'user_answer' => $user_answer,
            'correct' => $correct,
          ];
          if(!$correct && $question->resource_url) {
            array_push($resources, [$question->resource_title, $question->resource_url]);
          }
        }
        return view('test.results')->withQuiz($quiz)
          ->withResults($results)
          ->withResources(array_map("unserialize", array_unique(array_map("serialize", $resources))));
    }
}
