@extends('layouts.app')
@section('content')
  <h1>Quiz: {{ $quiz->title }}</h1>
  <ul id="breadcrumbs">
    <li><a href="{{ route('admin-quiz-index') }}">Quizzes</a></li>
  </ul>

  <form class="form-highlight" method="post" action="{{ route('admin-quiz-edit', ['quiz_id' => $quiz->id]) }}">
    <h2>Edit quiz</h2>
    {{ csrf_field() }}
    <p>
      <label for="title">Title</label>
      <input type="text" id="title" name="title" value="{{ $quiz->title }}" required>
      @if ($errors->has('title'))
        <span>{{ $errors->first('title') }}
      @endif
    </p>
    <p>
      <button type="submit">Save changes</button>
    </p>
  </form>

  <h2>All questions</h2>
  <ol class="questions">
  @foreach ($quiz->questions->all() as $question)
    @include('question.module')
  @endforeach
  </ol>

  <h2>Create question</h2>
  <form method="post" action="{{ route('admin-question-create', ['quiz_id' => $quiz->id]) }}">
    {{ csrf_field() }}
    <p>
      <label for="prompt">Prompt</label>
      <textarea id="prompt" name="prompt" value="{{ old('prompt') }}" required></textarea>
      @if ($errors->has('prompt'))
        <span>{{ $errors->first('prompt') }}
      @endif
    </p>
    <p>
      <label for="answer_text">Answer text</label>
      <textarea id="answer_text" name="answer_text">{{ old('answer_text') }}</textarea>
      @if ($errors->has('answer_text'))
        <span>{{ $errors->first('answer_text') }}
      @endif
    </p>
    <p>
      <label for="resource_url">Resource URL</label>
      <input type="text" id="resource_url" name="resource_url" value="{{ old('resource_url') }}">
      @if ($errors->has('resource_url'))
        <span>{{ $errors->first('resource_url') }}
      @endif
    </p>
    <p>
      <button type="submit">Create question</button>
    </p>
  </form>
@endsection
