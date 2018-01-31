<li>
    <h3>
      <a href="{{ route('admin-question-view', ['question_id' => $question->id]) }}">
        {{ $question->prompt }}
      </a>
    </h3>
    <ul class="answers">
      @foreach ($question->answers as $answer)
        @include('answer.module')
      @endforeach
    </ul>
    <dl>
      @if($question->answer_text)
        <dt>Answer Text</dt>
        <dd>{{ $question->answer_text }}</dd>
      @endif
      @if($question->resource_url)
        <dt>Resource</dt>
        <dd>
          <a href="{{ $question->resource_url }}" target="_blank">{{ $question->resource_title }}</a>
          <span>{{ parse_url($question->resource_url)['host'] }}</span>
        </dd>
      @endif
    </dl>
  </a>
</li>
