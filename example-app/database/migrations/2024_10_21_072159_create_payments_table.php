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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Khóa chính
             // Mã tham chiếu đơn hàng từ bảng trip_detail
            $table->foreignId('trip_detail_id')
                ->constrained('trip_details')
                ->onDelete('cascade');
            $table->decimal('amount', 15, 2); // Số tiền giao dịch
            $table->string('bank_code'); // Mã ngân hàng
            $table->string('bank_tran_no')->nullable(); // Mã giao dịch của ngân hàng
            $table->string('card_type')->nullable(); // Loại thẻ
            $table->timestamp('pay_date'); // Ngày thực hiện thanh toán
            $table->string('response_code'); // Mã phản hồi
            $table->string('transaction_no'); // Mã giao dịch của VNPAY
            $table->string('transaction_status'); // Trạng thái giao dịch
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
