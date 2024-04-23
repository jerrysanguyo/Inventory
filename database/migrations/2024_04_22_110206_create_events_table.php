<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('venue');
            $table->date('event_date');
            $table->time('venue_time_start');
            $table->time('venue_time_end');
            $table->string('address');
            $table->string('point_person');
            $table->string('mobile_number');
            $table->string('remarks');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
