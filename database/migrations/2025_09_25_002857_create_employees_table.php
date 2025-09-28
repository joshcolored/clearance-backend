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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('employeeId')->unique();
            $table->string('ntlogin')->unique();
            $table->string('department');
            $table->date('resignationDate');
            $table->enum('status', ['active', 'in_clearance', 'cleared'])->default('in_clearance');
            $table->string('createdBy')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
