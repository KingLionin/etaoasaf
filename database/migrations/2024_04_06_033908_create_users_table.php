<?php

use App\Models\User;
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
        Schema::connection('employeeinfo')->create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar')->nullable();
            $table->string('token', 500)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name' => 'admin',
            'email' => 'admin@ess25.workfolio.com',
            'password' => Hash::make('123456'),
            'email_verified_at' => now(),
            'avatar' => 'avatar-1.jpg',
            'token' => 'JbUxwlz9rTcbLl0bBGi959uVccdOKYOottL9arNaMmgislZwvAjJMxjYyeiI',
            'remember_token' => 'Uz3jr5QOeBxUUt7ZmyIL89CDXVeBielU4ETJgVQYLp2dVZrIrwOfN19IHTWy',
            'created_at' => '2024-04-13 15:27:52',
            'updated_at' => '2024-04-13 16:17:32',
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
