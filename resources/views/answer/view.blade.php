@extends('layouts.app')
@section('content')
  <h1>Answer: {{ $answer->response }}</h1>
  <ul id="breadcrumbs">
    <li><a href="{{ route('admin-quiz-index') }}">Quizzes</a></li>
    <li><a href="{{ route('admin-quiz-view', ['quiz_id' => $answer->question->quiz->id]) }}">Quiz</a></li>
    <li><a href="{{ route('admin-question-view', ['question_id' => $answer->question->id]) }}">Question</a></li>
  </ul>

  <h2>Edit answer</h2>
  <form method="post" action="{{ route('admin-answer-edit', ['answer_id' => $answer->id]) }}">
    {{ csrf_field() }}
    <p>
      <label for="response">Response</label>
      <textarea id="response" name="response" required>{{ $answer->response }}</textarea>
      @if ($errors->has('response'))
        <span>{{ $errors->first('response') }}
      @endif
    </p>
    <p>
      <button type="submit">Save changes</button>
    </p>
  </form>
@endsection
