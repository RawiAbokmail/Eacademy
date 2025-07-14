<?php

namespace App\Console\Commands;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Console\Command;

class SyncTeachers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:teachers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
          $teachersUsers = User::where('role', 'teacher')->get();

    foreach ($teachersUsers as $user) {
        $exists = Teacher::where('user_id', $user->id)->exists();

        if (!$exists) {
            Teacher::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'image' => $user->image,
                'job' => $user->job,
                'description' => $user->description,
                'bio' => $user->bio,
            ]);
        }
    }

    $this->info('Sync completed!');
    }
}
