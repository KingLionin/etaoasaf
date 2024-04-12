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
        Schema::connection('mysql')->create('offboarding_requests', function (Blueprint $table) {
            
            $table->id();
            $table->integer('employee_id');
            $table->enum('portal_type', ['Employee Self-Service Portal','Manager-Self-Service Portal']);
            $table->boolean('knowledge_transfer')->default(false);
            $table->enum('type_of_request', ['Resignation', 'Retirement', 'Contractual Breach', 'Offload', 'Involuntary Resignation']);
            $table->enum('status', ['New', 'Approved', 'Pending', 'Denied']);
            $table->longText('description')->nullable();
            $table->string('files')->nullable();
            $table->timestamps();
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
