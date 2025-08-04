@extends('layouts.master')
@section('title', 'Quiz Start')
@section('content')


<div class="container">
    <h2>{{ $quiz->title }}</h2>
    <p>{{ $quiz->description }}</p>

    <form method="POST" action="{{ route('quizzes.submit', $quiz->id) }}">
        @csrf

        @foreach($quiz->questions as $question)
            <div class="mb-4">
                <strong>{{ $loop->iteration }}. {{ $question->content }}</strong>

                {{-- نوع السؤال: اختيار من متعدد --}}
                @if($question->question_type === 'mcq')
                    @foreach($question->options as $option)
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="answers[{{ $question->id }}]"
                                   value="{{ $option->id }}"
                                   id="q{{ $question->id }}_{{ $option->id }}">
                            <label class="form-check-label" for="q{{ $question->id }}_{{ $option->id }}">
                                {{ $option->content }}
                            </label>
                        </div>
                    @endforeach

                {{-- نوع السؤال: صح أو خطأ --}}
                @elseif($question->question_type === 'true_false')
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $question->options->where('content', 'True')->first()->id }}">
                        <label class="form-check-label">True</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $question->options->where('content', 'False')->first()->id }}">
                        <label class="form-check-label">False</label>
                    </div>

                {{-- نوع السؤال: إجابة نصية --}}
                @elseif($question->question_type === 'text')
                    <textarea name="answers[{{ $question->id }}]" class="form-control" rows="3"></textarea>
                @endif
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Submit Quiz</button>
    </form>
</div>

@endsection
