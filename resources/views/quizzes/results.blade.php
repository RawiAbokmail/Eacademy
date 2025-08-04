<x-dashboard-layout>
    <div class="container">
        <h2 class="mb-3"> Quizzes Results : {{ $quiz->title }}</h2>

        <div class="alert alert-info">
            <strong> Total marks :</strong> {{ $totalScore }}
        </div>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Student name</th>
                    <th>Mark</th>
                    <th>Submission date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td><a href="{{ route('dashboard.quizzes.show-results', ['quiz' => $quiz, 'user' => $student->id]) }}">
                        {{ $student->name }}
                        </a></td>
                        
                        <td>
                            {{ $student->pivot->score ?? '—' }} / {{ $totalScore }}
                        </td>
                        <td>
                            {{ $student->pivot->submitted_at ? \Carbon\Carbon::parse($student->pivot->submitted_at)->format('Y-m-d H:i') : 'Not submitted' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No students have taken this quiz yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-dashboard-layout>
