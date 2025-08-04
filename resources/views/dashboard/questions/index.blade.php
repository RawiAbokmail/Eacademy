<x-dashboard-layout>

    <div class="top p-3"  style="display: flex; justify-content: space-between; align-items: center;">
            <div><h1>All Questions</h1></div>
            <div><button class="btn btn-dark"><a style="color: #fff" href="{{ route('dashboard.quizzes.questions.create', $quiz) }}">
                Add New Question
            </a> </button></div>
        </div>

        @if(session('success'))
            <div class="alert alert-{{ session('type') ?? 'success' }} alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

         <div class="container p-2">
            <div class="mb-3"><h2><b>Questions for: </b> {{ $quiz->title }}</h2>
            </div>
             <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Content</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                    <tr>
                        <td>{{ $question->content }}</td>
                        <td>{{ $question->question_type }}</td>
                        <td>
                            <a href="{{ route('dashboard.quizzes.questions.edit', [$quiz, $question->id]) }}" class="btn btn-sm btn-info">Edit</a>
                            <form method="POST" action="{{ route('dashboard.quizzes.questions.destroy', [$quiz, $question->id]) }}" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete question?')">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


        </div>


</x-dashboard-layout>
