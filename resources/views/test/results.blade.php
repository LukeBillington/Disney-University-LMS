@extends('layouts.app')
@section('content')
  <h1>Results: {{ $quiz->title }}</h1>
  <h2>Questions</h2>
  <ol class="questions">
    @foreach ($quiz->questions as $question)
      <li>
        <h3>
          @if($results[$question->id]['correct'])
            <strong>Correct: </strong>
          @else
            <strong>Incorrect: </strong>
          @endif
          {{ $question->prompt }}
        </h3>
        <ul class="answers">
        @foreach ($question->answers as $answer)
          <li>
            @if($answer->id == $results[$question->id]['answer'])
              <strong>Correct answer: </strong>
            @elseif ($answer->id == $results[$question->id]['user_answer'])
              <strong>Selected answer: </strong>
            @endif
            {{ $answer->response }}
          </li>
        @endforeach
        </ul>
        <p>{{ $question->answer_text }}</p>
      </li>
    @endforeach
  </ol>
  @if(!empty($resources))
    <h2>Suggested resources</h2>
    <ul class="resources">
      @foreach ($resources as $resource)
        <li>
          <a href="{{ $resource[1] }}" target="_blank">{{ $resource[0] }}</a>
          <span>{{ parse_url($resource[1])['host'] }}</span>
        </li>
      @endforeach
    </ul>
  @endif
  <p>
    <a href="{{ route('portal-index') }}">
      <button>Done</button>
    </a>
  </p>
@endsection
