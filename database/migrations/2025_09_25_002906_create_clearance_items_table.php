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
        Schema::create('clearance_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('department');
            $table->string('taskName');
            $table->text('description');
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->string('assignedTo')->nullable();
            $table->string('completedBy')->nullable();
            $table->timestamp('completedAt')->nullable();
            $table->text('signature')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clearance_items');
    }
};
