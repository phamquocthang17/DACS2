<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    public function up()
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('code'); 
        $table->string('name'); 
        $table->text('description')->nullable();
        $table->timestamps();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Liên kết với bảng users
    });
}

public function down()
{
    Schema::dropIfExists('categories');
}

}
