<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('path'); // Đường dẫn lưu trữ ảnh
            $table->string('caption')->nullable(); // Mô tả ảnh, có thể để trống
            $table->unsignedBigInteger('post_id'); // ID của post liên kết
            $table->timestamps();
        
            // Thiết lập khóa ngoại cho post_id để liên kết với bảng posts
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
