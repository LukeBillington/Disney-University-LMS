<li>
  @if($answer->id == $answer->question->answer_id)
    <strong>Correct: </strong>
  @endif
  <a href="{{ route('admin-answer-view', [
      'answer_id' => $answer->id,
    ]) }}">
    {{ $answer->response }}
  </a>
</li>
