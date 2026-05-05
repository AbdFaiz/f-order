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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('cust_name');
            $table->string('table_no', 5);
            $table->date('order_date');
            $table->time('order_time');
            $table->string('status', 50)->default('pending');
            $table->decimal('total_price', 15, 2);
            $table->foreignId('waitress_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('cashier_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
