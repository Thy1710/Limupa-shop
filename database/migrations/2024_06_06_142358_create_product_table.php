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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên điện thoại
            $table->text('description')->nullable(); // Mô tả sản phẩm
            $table->integer('price'); // Giá sản phẩm
            $table->integer('promotion'); // Khuyến mãi
            $table->integer('quantity'); // Số lượng trong kho
            $table->string('color')->nullable(); // Màu sắc sản phẩm
            $table->integer('ram'); // RAM (đơn vị: GB)
            $table->integer('storage')->default(0); // Bộ nhớ (đơn vị: GB)
            $table->string('display')->default(0); // Màn hình (kích thước và loại)
            $table->integer('battery_capacity'); // Dung lượng pin (mAh)
            $table->string('operating_system'); // Hệ điều hành
            $table->string('image')->nullable(); // Đường dẫn đến ảnh sản phẩm
            $table->string('status'); // Trạng thái của sản phẩm
            $table->timestamps(); // Thời gian tạo và cập nhật bản ghi
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null'); // Khóa ngoại đến bảng categories
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
