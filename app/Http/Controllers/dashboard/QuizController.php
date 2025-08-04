<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::with('course')->paginate(10);
        return view('dashboard.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('dashboard.quizzes.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'duration' => 'required|integer|min:1',
            'starts_at' => 'required|date',
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        Quiz::create([
            'duration' => $request->duration,
            'starts_at' => $request->starts_at,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'course_id' => $request->course_id,
        ]);

        return redirect()
        ->route('dashboard.quizzes.index')
        ->with('success', 'Quiz created successfully.')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Quiz $quiz)
    // {
    //     $questions = $quiz->questions()->with('options')->get();
    //     return view('dashboard.quizzes.show', compact('quiz', 'questions'));
    // }

    public function show(Quiz $quiz)
    {
        $quiz->load('questions.options');

        return view('dashboard.quizzes.show', compact('quiz'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        $courses = Course::all();
        return view('dashboard.quizzes.edit', compact('quiz', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'duration' => 'required|integer|min:1',
            'starts_at' => 'required|date',
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $quiz->update([
            'duration' => $request->duration,
            'starts_at' => $request->starts_at,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'course_id' => $request->course_id,
        ]);

        return redirect()
        ->route('dashboard.quizzes.index')
        ->with('success', 'Quiz updated successfully.')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()
        ->route('dashboard.quizzes.index')
        ->with('success', 'Quiz deleted successfully.')
        ->with('type', 'danger');
    }

    /**
     * Display the results of the specified quiz.
     */
    public function results(Quiz $quiz)
    {
        $students = $quiz->users()->with('profile')->get();
        $totalScore = $quiz->questions->sum('score');

        return view('dashboard.quizzes.results', compact('quiz', 'students', 'totalScore'));
    }

    public function showResults(Quiz $quiz, User $user)
    {
        if(!$user->quizzes->contains($quiz->id)){
            abort(404, 'This user has not taken this quiz.');
        }

        $questions = $quiz->questions()->with(['options', 'answers' => function ($query) use ($user) {
        $query->where('user_id', $user->id);
        }])->get();

        return view('dashboard.quizzes.show-results', compact('quiz', 'user', 'questions'));
    }

    // public function submit(Request $request, Quiz $quiz)
    // {


    //    $user = Auth::user();

    // foreach ($quiz->questions as $question) {
    //     $input = $request->input('answers.' . $question->id);

    //     if ($question->question_type === 'mcq' || $question->question_type === 'true_false') {
    //         // نوع يحتوي على اختيارات ⇒ نخزن في option_id
    //         Answer::create([
    //             'user_id' => $user->id,
    //             'quiz_id' => $quiz->id,
    //             'question_id' => $question->id,
    //             'option_id' => $input,
    //         ]);
    //     } elseif ($question->question_type === 'text') {
    //         // نوع نص ⇒ نخزن في text_answer
    //         Answer::create([
    //             'user_id' => $user->id,
    //             'quiz_id' => $quiz->id,
    //             'question_id' => $question->id,
    //             'text_answer' => $input,
    //         ]);
    //     }
    // }

    // $user->quizzes()->updateExistingPivot($quiz->id, [
    //     'submitted_at' => now(),
    // ]);

    //     return redirect()
    //         ->route('quizzes.results', $quiz)
    //         ->with('success', 'Quiz submitted successfully.')
    //         ->with('type', 'success');
    // }

    // public function start(Quiz $quiz)
    // {
    //     if ($quiz->starts_at > now()) {
    //         return redirect()
    //             ->route('dashboard.quizzes.show', $quiz)
    //             ->with('error', 'Quiz has not started yet.');
    //     }

    //     if ($quiz->users()->where('user_id', Auth::id())->exists()) {
    //         return redirect()
    //             ->route('dashboard.quizzes.show', $quiz)
    //             ->with('error', 'You have already started this quiz.');
    //     }

    //     return view('dashboard.quizzes.start', compact('quiz'));
    // }

    // public function start(Quiz $quiz)
    // {

    //     return view('quizzes.start', compact('quiz'));
    // }


}
