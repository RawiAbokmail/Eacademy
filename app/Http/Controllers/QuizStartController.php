<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizStartController extends Controller
{
     public function start(Quiz $quiz)
    {

        return view('quizzes.start', compact('quiz'));
    }

     public function submit(Request $request, Quiz $quiz)
    {


       $user = Auth::user();

    foreach ($quiz->questions as $question) {
        $input = $request->input('answers.' . $question->id);

        if ($question->question_type === 'mcq' || $question->question_type === 'true_false') {
            // نوع يحتوي على اختيارات ⇒ نخزن في option_id
            Answer::create([
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'question_id' => $question->id,
                'option_id' => $input,
            ]);
        } elseif ($question->question_type === 'text') {
            // نوع نص ⇒ نخزن في text_answer
            Answer::create([
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'question_id' => $question->id,
                'text_answer' => $input,
            ]);
        }
    }

    $user->quizzes()->updateExistingPivot($quiz->id, [
        'submitted_at' => now(),
    ]);

        return redirect()
            ->route('quizzes.results', $quiz)
            ->with('success', 'Quiz submitted successfully.')
            ->with('type', 'success');
    }
}
