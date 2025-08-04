<x-dashboard-layout>


    <h2> Student Results : {{ $user->name }} In Quiz : {{ $quiz->title }}</h2>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>The Question</th>
            <th>Chosen Answer</th>
            <th>Correct Answer</th>
            <th>Is The Answer correct</th>
        </tr>
    </thead>
    <br>
    <tbody>
        @foreach($questions as $question)
            @php
                $answer = $question->answers->first();
                $correctOption = $question->options->where('is_true', 1)->first();
                $studentOption = $question->options->where('id', $answer->option_id ?? 'empty')->first();
            @endphp

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $question->content ?? '-' }}</td>
                <td>{{ $studentOption->content ?? $answer->text_answer ?? '-' }}</td>
                <td>{{ $correctOption->content ?? '-' }}</td>
                <td>
                    @if ($correctOption && $studentOption && $correctOption->id === $studentOption->id)
                         Correct
                    @else
                         Incorrect
                    @endif
                </td>
            </tr>

        @endforeach
    </tbody>
</table>



</x-dashboard-layout>
