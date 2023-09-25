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
        Schema::create('employee', function (Blueprint $table) {
            $table->integer('id', false, true)->autoIncrement();
            $table->string('name', 50);
            $table->string('surname', 50)->comment('Last name');
            $table->string('email', 50)->unique();
            $table->string('phone', 10);
            $table->enum('status', ['Hired', 'Laid off', 'Resigned', 'Retired'])->default('Hired');
            $table->date('birthday')->nullable();
            $table->float('salary', 8, 2)->default(0.00);
            $table->date('joined_at');
            $table->date('left_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
