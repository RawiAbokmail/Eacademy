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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('first_name')->after('user_id');
            $table->string('last_name')->after('first_name');
            $table->string('email')->after('last_name');
            $table->string('company_name')->nullable()->after('email');
            $table->string('country')->after('company_name');
            $table->string('street_address1')->after('country');
            $table->string('street_address2')->nullable()->after('street_address1');
            $table->string('town')->after('street_address2');
            $table->string('state')->nullable()->after('town');
            $table->string('postcode')->after('state');
            $table->string('phone')->after('postcode');
            $table->text('order_note')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'first_name','last_name','email','company_name','country',
                'street_address1','street_address2','town','state','postcode',
                'phone','order_note'
            ]);
        });
    }
};
