<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('trip_detail_id');
            $table->text('comment');
            $table->timestamps();

            // Khóa ngoại cho customer_id và trip_detail_id nếu cần thiết
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('trip_detail_id')->references('id')->on('trip_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
