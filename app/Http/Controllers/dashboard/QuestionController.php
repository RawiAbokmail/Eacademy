<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Quiz $quiz)
    {
        $questions = $quiz->questions()->latest()->get();
        return view('dashboard.questions.index', compact('quiz', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Quiz $quiz)
    {
        return view('dashboard.questions.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request, Quiz $quiz)
    {

    $question = $quiz->questions()->create([
        'content' => $request->get('content'),
        'question_type' => $request->question_type,
        'score' => $request->score,
    ]);
    // Create the question options based on the question type

    if ($request->question_type === 'mcq') {
        foreach ($request->options as $index => $optionData) {
            $question->options()->create([
                'content' => $optionData['content'],
                'is_true' => $index == $request->correct_option,
            ]);
        }
    } elseif ($request->question_type === 'true_false') {
        $question->options()->create([
            'content' => 'True',
            'is_true' => $request->correct_option_tf === 'true',
        ]);
        $question->options()->create([
            'content' => 'False',
            'is_true' => $request->correct_option_tf === 'false',
        ]);
    } elseif ($request->question_type === 'text') {

        $question->options()->create([
            'content' => 'text_answer',
            'is_true' => true,
        ]);
    }

        return redirect()
            ->route('dashboard.quizzes.questions.index', $quiz)
            ->with('success', 'Question created successfully.')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz, Question $question)
    {
        return view('dashboard.questions.edit', compact('quiz', 'question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionRequest $request, Quiz $quiz, Question $question)
    {

        $question->update([
            'content' => $request->content,
            'question_type' => $request->question_type,
            'score' => $request->score,
        ]);

         if (in_array($question->question_type, ['mcq', 'true_false'])) {
        $question->options()->delete();
    }

    if ($request->question_type === 'mcq') {
        foreach ($request->options as $index => $opt) {
            $question->options()->create([
                'content' => $opt['content'],
                'is_true' => ($request->correct_option == $index),
            ]);
        }
    }

    if ($request->question_type === 'true_false') {
        $question->options()->create([
            'content' => 'True',
            'is_true' => $request->correct_option_tf === 'true',
        ]);
        $question->options()->create([
            'content' => 'False',
            'is_true' => $request->correct_option_tf === 'false',
        ]);
    }

        return redirect()
            ->route('dashboard.quizzes.questions.index', $quiz)
            ->with('success', 'Question updated successfully.')
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz, Question $question)
    {
        $question->delete();

        return redirect()
            ->route('dashboard.quizzes.questions.index',  ['quiz' => $quiz])
            ->with('success', 'Question deleted successfully.')
            ->with('type', 'danger');
    }
}