<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Employee;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_lastname');
            $table->string('employee_firstname');
            $table->string('employee_middlename');
            $table->date('date_of_birth');
            $table->integer('age');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('email')->unique();
            $table->string('contact_number');
            $table->text('address');
            $table->enum('civil_status', ['Single', 'Married', 'Divorced', 'Widowed', 'Separated']);
            $table->string('position');
            $table->string('department');
            $table->enum('work_status', ['Day Shift', 'Night Shift', 'Evening Shift', 'Rotating Shift', 'Split Shift', 'Fixed Shift', 'Weekend Shift', 'On-call Shift', '12-Hour Shift', 'Seasonal Shift']);
            $table->enum('work_type', ['Remote', 'Office']);
            $table->softDeletes();
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
