<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('ntlogin')->unique()->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password');
            $table->string('role')->default('employee'); // e.g., super_admin, hr, it, team_leader, ...
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};
