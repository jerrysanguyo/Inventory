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
        Schema::create('deployments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrined('inventories');
            $table->foreignId('department_id')->constrained('departments');
            $table->string('assigned_to')->nullable();
            $table->foreignId('issued_by')->constrained('users');
            $table->foreignId('deploy_by')->constrained('users');
            $table->date('deploy_date')->nullable();
            $table->string('received_by')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deployments');
    }
};
