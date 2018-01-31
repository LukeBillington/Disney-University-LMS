@extends('layouts.app')
@section('content')
  <h1>Question: {{ $question->prompt }}</h1>
  <ul id="breadcrumbs">
    <li><a href="{{ route('admin-quiz-index') }}">Quizzes</a></li>
    <li><a href="{{ route('admin-quiz-view', ['quiz_id' => $question->quiz->id]) }}">Quiz</a></li>
  </ul>

  <form class="form-highlight" method="post" action="{{ route('admin-question-edit', ['question_id' => $question->id]) }}">
    <h2>Edit question</h2>
    {{ csrf_field() }}
    <p>
      <label for="prompt">Prompt</label>
      <textarea id="prompt" name="prompt" required>{{ $question->prompt }}</textarea>
      @if ($errors->has('prompt'))
        <span>{{ $errors->first('prompt') }}
      @endif
    </p>
    <p>
      <label for="answer_id">Correct answer</label>
      <select id="answer_id" name="answer_id">
        <option>None</option>
        @foreach ($question->answers as $answer)
          <option value="{{ $answer->id }}"{{ $question->answer_id == $answer->id ? ' selected' : '' }}>
            {{ $answer->response }}
          </option>
        @endforeach
      </select>
    </p>
    <p>
      <label for="answer_text">Answer text</label>
      <textarea id="answer_text" name="answer_text">{{ $question->answer_text }}</textarea>
      @if ($errors->has('answer_text'))
        <span>{{ $errors->first('answer_text') }}
      @endif
    </p>
    <p>
      <label for="resource_url">Resource URL</label>
      <input type="text" id="resource_url" name="resource_url" value="{{ $question->resource_url }}">
      @if ($errors->has('resource_url'))
        <span>{{ $errors->first('resource_url') }}
      @endif
    </p>
    <p>
      <button type="submit">Save changes</button>
    </p>
  </form>

  <h2>All answers</h2>
  <ul class="answers">
  @foreach ($question->answers as $answer)
    @include('answer.module')
  @endforeach
  </ul>

  <h2>Create answer</h2>
  <form method="post" action="{{ route('admin-answer-create', ['question_id' => $question->id]) }}">
    {{ csrf_field() }}
    <p>
      <label for="response">Response</label>
      <textarea id="response" name="response" required>{{ old('response') }}</textarea>
      @if ($errors->has('response'))
        <span>{{ $errors->first('response') }}
      @endif
    </p>
    <p>
      <button type="submit">Create answer</button>
    </p>
  </form>
@endsection
