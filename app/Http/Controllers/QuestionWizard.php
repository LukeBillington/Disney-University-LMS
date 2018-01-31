<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Question;
use App\Http\Requests\CreateQuestion;

class QuestionWizard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    // View question
    public function view($question_id) {
        return view('question.view')->withQuestion(Question::findOrFail($question_id));
    }

    // Creates a question
    public function create(CreateQuestion $request, $quiz_id) {
        $quiz = Quiz::findOrFail($quiz_id);
        $question = Question::create([
            'quiz_id' => $quiz->id,
            'prompt' => $request->input('prompt'),
            'answer_text' => $request->input('answer_text'),
            'resource_url' => $request->input('resource_url'),
        ]);
        return redirect()->route('admin-question-view', ['question_id' => $question->id]);
    }

    // Edits a question
    public function edit(CreateQuestion $request, $question_id) {
        $question = Question::findOrFail($question_id);
        $question->prompt = $request->input('prompt');
        $question->answer_id = $request->input('answer_id');
        $question->answer_text = $request->input('answer_text');
        $question->resource_url = $request->input('resource_url');
        $question->save();
        return redirect()->route('admin-quiz-view', ['quiz_id' => $question->quiz->id]);
    }
}
