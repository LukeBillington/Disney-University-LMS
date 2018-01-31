@extends('layouts.app')
@section('content')
  <h1>Quizzes</h1>

  <form class="form-highlight" method="post" action="{{ route('admin-quiz-create') }}">
    <h2>Create quiz</h2>
    {{ csrf_field() }}
    <p>
      <label for="title">Title</label>
      <input type="text" id="title" name="title" value="{{ old('title') }}" required>
      @if ($errors->has('title'))
        <span>{{ $errors->first('title') }}
      @endif
    </p>
    <p>
      <button type="submit">Create quiz</button>
    </p>
  </form>
  <h2>All quizzes</h2>
  <ul class="quizzes">
  @foreach ($quizzes as $quiz)
    @include('quiz.module')
  @endforeach
  </ul>
@endsection
