<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('quiz_user', function (Blueprint $table) {
            $table->float('score')->nullable()->after('quiz_id');
            $table->timestamp('submitted_at')->nullable()->after('score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quiz_user', function (Blueprint $table) {
            $table->dropColumn(['score', 'submitted_at']);
        });
    }
};
