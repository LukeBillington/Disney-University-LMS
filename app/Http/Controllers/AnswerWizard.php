<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Http\Requests\CreateAnswer;

class AnswerWizard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    // View answer
    public function view($answer_id) {
        return view('answer.view')->withAnswer(Answer::findOrFail($answer_id));
    }

    // Creates an answer
    public function create(CreateAnswer $request, $question_id) {
        $question = Question::findOrFail($question_id);
        $answer = Answer::create([
            'question_id' => $question->id,
            'response' => $request->input('response'),
        ]);
        return redirect()->route('admin-question-view', ['question_id' => $question->id]);
    }

    // Edits an answer
    public function edit(CreateAnswer $request, $answer_id) {
        $answer = Answer::findOrFail($answer_id);
        $answer->response = $request->input('response');
        $answer->save();
        return redirect()->route('admin-question-view', ['question_id' => $answer->question->id]);
    }
}
