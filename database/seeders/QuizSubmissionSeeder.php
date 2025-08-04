<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class QuizSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // أنشئ كويز تجريبي إن لم يكن موجودًا
        $quiz = Quiz::firstOrCreate([
            'title' => 'Test Quiz',
        ], [
            'slug' => Str::slug('Test Quiz'),
            'duration' => 30,
            'course_id' => 1, // ضع أي رقم موجود عندك
            'starts_at' => now(),
        ]);

        // أنشئ 5 مستخدمين طلاب
        for ($i = 1; $i <= 5; $i++) {
            $user = User::create([
                'name' => "Student $i",
                'email' => "student$i@example.com",
                'password' => bcrypt('password'),
                'role' => 'student',
            ]);

            // اربط الطالب بالكويز مع نتيجة
            DB::table('quiz_user')->insert([
                'quiz_id' => $quiz->id,
                'user_id' => $user->id,
                'score' => rand(5, 10), // علامة عشوائية
                'submitted_at' => Carbon::now()->subMinutes(rand(1, 60)),
            ]);
        }
    }
}
