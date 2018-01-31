<li>
  <h3>
    <a href="{{ route('admin-quiz-view', ['quiz_id' => $quiz->id]) }}">
      {{ $quiz->title }}
    </a>
  </h3>
  <dl>
    <dt>Questions</dt>
    <dd>{{ $quiz->questions->count() }}</dd>
  </dl>
</li>
