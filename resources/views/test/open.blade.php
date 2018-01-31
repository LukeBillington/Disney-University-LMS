@extends('layouts.app')
@section('content')
  <h1>{{ $quiz->title }}</h1>
  <form method="post" action="{{ route('test-grade', ['quiz_id' => $quiz->id]) }}">
    {{ csrf_field() }}
    <h2>Questions</h2>
    <ol class="questions">
      @foreach ($quiz->questions as $question)
        <li>
          <h3>{{ $question->prompt }}</h3>
          <ul class="answers test">
          @foreach ($question->answers as $answer)
            <li>
              <label>
                <input type="radio" name="{{ $question->id }}" value="{{ $answer->id }}">
                {{ $answer->response }}
              <label>
            </li>
          @endforeach
          </ul>
        </li>
      @endforeach
    </ol>
    <p>
      <button type="submit">Submit answers</button>
    </p>
  </form>
@endsection
