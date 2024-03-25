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
        Schema::create('offboarding_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->enum('portal_type', ['Employee Self-Service Portal','Manager-Self-Service Portal']);
            $table->enum('type_of_request', ['Resignation', 'Retirement', 'Contractual Breach', 'Offload', 'Involuntary Resignation'])->default('Resignation');
            $table->enum('status', ['New', 'Approved', 'Pending', 'Denied'])->default('New');
            $table->longText('description')->nullable();
            $table->string('files')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offboarding_requests');
    }
};
