<?php

use App\Models\User;
use App\Models\Employee;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('avatar');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
        });
         // Create a new Employee instance
         $employee = new Employee();
         $employee->employee_lastname = 'Villanueva';
         $employee->employee_firstname = 'Jefferson';
         $employee->employee_middlename = 'Agagdang';
         $employee->date_of_birth = '1990-01-01';
         $employee->age = 30;
         $employee->gender = 'Male';
         $employee->email = 'admin@gmail.com';
         $employee->contact_number = '1234567890';
         $employee->address = 'Address';
         $employee->civil_status = 'Single';
         $employee->position = 'Manager';
         $employee->department = 'Human Resource';
         $employee->work_status = 'Day Shift';
         $employee->work_type = 'Office';
         $employee->save();

        User::create(['employee_id' => $employee->id, 'email' => $employee->email, 'password' => Hash::make('admin123'),'email_verified_at'=>'2022-10-10 17:04:58','avatar' => 'avatar-1.jpg','created_at' => now(),]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
