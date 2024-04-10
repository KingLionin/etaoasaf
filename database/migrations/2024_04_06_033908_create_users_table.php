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
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
        });
    
        /*
        $department = Department::Create(['department_name' => 'Human Resource']);

        $position = Position::Create(['position_name' => 'Manager']);
        */

        /*
        // Create a new Employee instance
        $employee = new Employee();
        $employee->department_id = $department->id;
        $employee->position_id = $position->id;
        $employee->employee_lastname = 'Villanueva';
        $employee->employee_firstname = 'Jefferson';
        $employee->employee_middlename = 'Agagdang';
        $employee->date_of_birth = '2001-10-23';
        $employee->age = 22;
        $employee->gender = 'Male';
        $employee->email = 'admin@gmail.com';
        $employee->contact_number = '1234567890';
        $employee->address = 'Address';
        $employee->civil_status = 'Single';
        $employee->work_status = 'Day Shift';
        $employee->work_type = 'Office';
        $employee->save();
        */

        $employee = new Employee();
        // Create a new User instance
        User::create([
            'employee_id' => '1',
            'email' => 'admin@gmail.com',
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
