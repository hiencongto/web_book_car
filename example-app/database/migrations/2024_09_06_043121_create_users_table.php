<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\CommonConstant;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone')->unique();
            $table->integer('role')->default(CommonConstant::ROLE['customer']); //1 customer, 2 driver, 0 admin
            $table->string('ID_number')->nullable();
//            $table->foreignId('provider_id')
//                ->nullable()
//                ->constrained('providers')
//                ->cascadeOnUpdate()
//                ->cascadeOnDelete();
            $table->integer('confirm_token');
            $table->foreignId('status_id')
                ->constrained('statuses')
                ->cascadeOnUpdate();
            $table->integer('old_status_id')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
