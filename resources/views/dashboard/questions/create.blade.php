<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Question</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

<div class="container">
    <h2>Add New Question for Quiz: {{ $quiz->title }}</h2>

    <form action="{{ route('dashboard.quizzes.questions.store', $quiz) }}" method="POST">
        @csrf

        <div class="mb-3">
        <label for="score" class="form-label">Question Score</label>
        <input type="number" name="score" id="score" class="form-control" min="1" value="{{ old('score', $question->score ?? 1) }}" required>
        </div>

        {{-- Question Text --}}
        <div class="mb-3">
            <label for="content" class="form-label">Question Text</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content') }}</textarea>
        </div>

        {{-- Question Type --}}
        <div class="mb-3">
            <label for="question_type" class="form-label">Question Type</label>
            <select name="question_type" id="question_type" class="form-control" required onchange="toggleOptions()">
                <option value="mcq" {{ old('question_type') == 'mcq' ? 'selected' : '' }}>Multiple Choice</option>
                <option value="true_false" {{ old('question_type') == 'true_false' ? 'selected' : '' }}>True / False</option>
                <option value="text" {{ old('question_type') == 'text' ? 'selected' : '' }}>Text Answer</option>
            </select>
        </div>

        {{-- MCQ Options --}}
        <div id="mcq-options" style="display: none;">
            <h5>Options</h5>
            @for ($i = 1; $i <= 4; $i++)
                <div class="mb-2">
                    <input type="text" name="options[{{ $i }}][content]" class="form-control" placeholder="Option {{ $i }}" required>
                    <div class="form-check mt-1">

                        <label class="form-check-label"> <input type="radio" name="correct_option" value="{{ $i }}" class="form-check-input"> Correct Answer</label>
                    </div>
                </div>
            @endfor
        </div>

        {{-- True/False Options --}}
        <div id="true-false-options" style="display: none;">
            <label class="form-label">Select the correct answer:</label>
            <div class="form-check">
                <label class="form-check-label"> <input class="form-check-input" type="radio" name="correct_option_tf" value="true"> True</label>
            </div>
            <div class="form-check">
                <label class="form-check-label"> <input class="form-check-input" type="radio" name="correct_option_tf" value="false"> False</label>
            </div>
        </div>

        {{-- Submit --}}
        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-success mt-3">Save Question</button>
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

        // إظهار وإخفاء حسب النوع
        mcqDiv.style.display = (type === 'mcq') ? 'block' : 'none';
        tfDiv.style.display = (type === 'true_false') ? 'block' : 'none';

        // إدارة حقول MCQ
        const mcqInputs = mcqDiv.querySelectorAll('input');
        mcqInputs.forEach(input => {
            input.disabled = (type !== 'mcq');
            if (type === 'mcq') {
                input.setAttribute('required', 'required');
            } else {
                input.removeAttribute('required');
            }
        });

        // إدارة حقول True/False
        const tfInputs = tfDiv.querySelectorAll('input');
        tfInputs.forEach(input => {
            input.disabled = (type !== 'true_false');
            if (type === 'true_false') {
                input.setAttribute('required', 'required');
            } else {
                input.removeAttribute('required');
            }
        });
    }

    // تشغيل عند تحميل الصفحة
    document.addEventListener('DOMContentLoaded', toggleOptions);
</script>

@endsection



</x-dashboard-layout>
