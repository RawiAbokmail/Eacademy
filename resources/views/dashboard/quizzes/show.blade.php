<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Show Quiz</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    {{-- <div class="container mt-4">
        @if(isset($quiz) && $quiz->questions->count())
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Questions for : <strong style="color: #202336">{{ $quiz->title }}</strong></h3>
                </div>
                <div class="card-body">
                    <ol>
                        @foreach($quiz->questions as $question)
                            <li class="mb-3">
                                <strong>{{ $question->content }}</strong>
                                @if($question->options && count($question->options))
                                    <ul class="list-group mt-2">
                                        @foreach($question->options as $option)
                                            <li class="list-group-item{{ $option->is_true ? ' list-group-item-success' : '' }}">
                                                {{ $option->content }}
                                                @if($option->is_true)
                                                    <span class="badge bg-success ms-2">Correct</span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        @else
            <div class="alert alert-info">
                No questions found for this quiz.
            </div>
        @endif
    </div> --}}

    <div class="container">
    <h2>{{ $quiz->title }}</h2>

    <form action="{{ route('dashboard.quizzes.submit', $quiz) }}" method="POST">
        @csrf
        
        @foreach($quiz->questions as $question)
    <div class="mb-4">
        <p><strong>{{ $loop->iteration }}. {{ $question->content }}</strong></p>

        @if ($question->question_type === 'mcq')
            @foreach($question->options as $option)
                <div>
                    <label>
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}">
                        {{ $option->content }}
                    </label>
                </div>
            @endforeach

        @elseif ($question->question_type === 'true_false')
            {{-- <div>
                <label>
                    <input type="radio" name="answers[{{ $question->id }}]" value="true"> true
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="answers[{{ $question->id }}]" value="false"> false
                </label>
            </div> --}}

            @foreach($question->options as $option)
                <label>
                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}">
                    {{ $option->content }}
                    </label><br>
            @endforeach

        @elseif ($question->question_type === 'text')
            <input type="text" name="answers[{{ $question->id }}]" class="form-control" placeholder="أدخل إجابتك هنا">
        @endif
    </div>
    @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


</x-dashboard-layout>
