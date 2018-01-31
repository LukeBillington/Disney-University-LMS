<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Http\Requests\CreateQuiz;

class QuizWizard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    // List all quizzes
    public function index() {
      return view('quiz.index')->withQuizzes(Quiz::all());
    }

    // View quiz
    public function view($quiz_id) {
        return view('quiz.view')->withQuiz(Quiz::findOrFail($quiz_id));
    }

    // Creates a quiz
    public function create(CreateQuiz $request) {
        $quiz = Quiz::create([
            'title' => $request->input('title'),
        ]);
        return redirect()->route('admin-quiz-view', ['quiz_id' => $quiz->id]);
    }

    // Edits a quiz
    public function edit(CreateQuiz $request, $quiz_id) {
        $quiz = Quiz::findOrFail($quiz_id);
        $quiz->title = $request->input('title');
        $quiz->save();
        return redirect()->route('admin-quiz-index');
    }
}
