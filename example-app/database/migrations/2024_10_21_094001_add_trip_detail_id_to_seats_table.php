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
        Schema::table('seats', function (Blueprint $table) {
            $table->unsignedBigInteger('trip_detail_id')->nullable(); // Hoặc không nullable tùy vào yêu cầu của bạn

            // Nếu bạn muốn thêm khóa ngoại
            $table->foreign('trip_detail_id')
                ->references('id')->on('trip_details')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seats', function (Blueprint $table) {
            //
        });
    }
};
