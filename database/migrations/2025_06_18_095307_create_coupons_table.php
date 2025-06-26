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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->decimal('min_price_use', 10, 2)->default(0);
            $table->integer('use_times')->default(0);
            $table->integer('limit_use')->default(1);
            $table->enum('type_discount', ['percent', 'fixed']); // خصم اما نسبة مئوية مثلا خصم 10% أو مبلغ ثابت مثلا خصم 50 ريال
            $table->decimal('amount_discount', 10, 2);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
