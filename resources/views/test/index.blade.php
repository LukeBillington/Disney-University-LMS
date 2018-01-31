@extends('layouts.app')
@section('content')
  <h1>Quizzes</h1>
  @if($open)
    <h2>Open quizzes</h2>
    <ul class="quizzes">
      @foreach ($open as $quiz)
        <li>
          <h3>
            <a href="{{ route('test-view', $quiz->id) }}">
            {{ $quiz->title }}
            </a>
          </h3>
          <dl>
            <dt>Questions</dt>
            <dd>{{ $quiz->questions->count() }}</dd>
          </dl>
        </li>
      @endforeach
    </ul>
  @endif

  @if($complete)
    <h2>Completed quizzes</h2>
    <ul class="quizzes">
      @foreach ($complete as $quiz)
        <li>
          <h3>
            <a href="{{ route('test-view', $quiz[0]->id) }}">
              {{ $quiz[0]->title }}
            </a>
          </h3>
          <dl>
            <dt>Score</dt>
            <dd>{{ $quiz[1] }}/{{ $quiz[0]->questions->count() }}</dd>
          </dl>
        </li>
      @endforeach
    </ul>
  @endif
@endsection
