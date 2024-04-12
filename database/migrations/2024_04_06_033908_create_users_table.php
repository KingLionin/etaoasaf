<?php

use App\Models\User;
use App\Models\Main\Employee;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mysql')->create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->timestamps();
        });

        User::create([
            'employee_id' => '1',
            'username' => 'admin1',
            'password' => Hash::make('admin123'),
            'created_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
