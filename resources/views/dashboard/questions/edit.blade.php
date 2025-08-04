<x-dashboard-layout>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Question</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Edit Question for Quiz: {{ $quiz->title }}</h2>

        <form action="{{ route('dashboard.quizzes.questions.update', [$quiz, $question->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="score" class="form-label">Question Score</label>
                <input type="number" name="score" id="score" class="form-control" min="1" value="{{ old('score', $question->score ?? 1) }}" required>
            </div>

            {{-- Question Text --}}
            <div class="mb-3">
                <label for="content" class="form-label">Question Text</label>
                <textarea name="content" id="content" class="form-control" required>{{ old('content', $question->content) }}</textarea>
            </div>

            {{-- Question Type --}}
            <div class="mb-3">
                <label for="question_type" class="form-label">Question Type</label>
                <select name="question_type" id="question_type" class="form-control" required onchange="toggleOptions()">
                    <option value="mcq" {{ $question->question_type == 'mcq' ? 'selected' : '' }}>Multiple Choice</option>
                    <option value="true_false" {{ $question->question_type == 'true_false' ? 'selected' : '' }}>True / False</option>
                    <option value="text" {{ $question->question_type == 'text' ? 'selected' : '' }}>Text Answer</option>
                </select>
            </div>

            {{-- MCQ Options --}}
            <div id="mcq-options" style="display: none;">
                <h5>Options</h5>
                @foreach ($question->options as $i => $option)
                    <div class="mb-2">
                        <input type="text" name="options[{{ $i }}][content]" class="form-control" value="{{ $option->content }}" required>
                        <div class="form-check mt-1">
                            <input type="radio" name="correct_option" value="{{ $i }}" class="form-check-input"
                                {{ $option->is_correct ? 'checked' : '' }}>
                            <label class="form-check-label">Correct Answer</label>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- True/False Options --}}
            <div id="true-false-options" style="display: none;">
                <label class="form-label">Select the correct answer:</label>
                <div class="form-check">

                    <label class="form-check-label"> <input class="form-check-input" type="radio" name="correct_option_tf" value="true"
                        {{ $question->correct_answer == 'true' ? 'checked' : '' }}> True</label>

                </div>
                <div class="form-check">

                    <label class="form-check-label"> <input class="form-check-input" type="radio" name="correct_option_tf" value="false"
                        {{ $question->correct_answer == 'false' ? 'checked' : '' }}> False</label>
                </div>
            </div>

            {{-- Submit --}}
            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary mt-3">Update Question</button>
            <a href="{{ route('dashboard.quizzes.questions.index', $quiz) }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>

    @section('scripts')
<script>
        function toggleOptions() {
            const type = document.getElementById('question_type').value;
            const mcqDiv = document.getElementById('mcq-options');
            const tfDiv = document.getElementById('true-false-options');

            mcqDiv.style.display = (type === 'mcq') ? 'block' : 'none';
            tfDiv.style.display = (type === 'true_false') ? 'block' : 'none';

            mcqDiv.querySelectorAll('input').forEach(input => {
                input.disabled = (type !== 'mcq');
            });
            tfDiv.querySelectorAll('input').forEach(input => {
                input.disabled = (type !== 'true_false');
            });
        }

        document.addEventListener('DOMContentLoaded', toggleOptions);
    </script>

    @endsection
</x-dashboard-layout>
