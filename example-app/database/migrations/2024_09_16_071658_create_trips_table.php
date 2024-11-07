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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('car_id')
                ->constrained('cars')
                ->cascadeOnDelete();
            $table->foreignId('destination_id')
                ->constrained('cities')
                ->cascadeOnDelete();
            $table->foreignId('source_id')
                ->constrained('cities')
                ->cascadeOnDelete();
            $table->string('time_start'); // lưu dạng timestemp
            $table->string('time_end');
            $table->float('fare')->unsigned();
            $table->integer('seat')->unsigned();
            $table->foreignId('status_id')
                ->constrained('statuses')
                ->cascadeOnUpdate();
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
