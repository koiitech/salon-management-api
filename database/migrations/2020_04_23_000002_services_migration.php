<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ServicesMigration extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('categories', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name')->comment('Tên nhóm');
      $table->string('image')->comment('Tên nhóm');
      $table->text('description')->comment('Mô tả');
      $table->integer('index')->default(0)->comment('Vị trí của menu');
      $table->timestamps();
      $table->softDeletes();
      $table->uuid('salon_id')->nullable()->comment('Thuộc về Salon');
      $table->foreign('salon_id')
        ->references('id')->on('salons')
        ->onDelete('cascade');
    });

    Schema::create('services', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name')->comment('Tên service');
      $table->text('description')->comment('Chi tiết của service');
      $table->string('image')->nullable()->comment('Hình ảnh');
      $table->integer('price')->comment('Giá service');
      $table->integer('minutes')->comment('Thời gian làm service');
      $table->timestamps();
      $table->softDeletes();
      
      $table->uuid('category_id')->nullable()->comment('Danh mục chứa');
      $table->foreign('category_id')
      ->references('id')->on('categories')
      ->onDelete('cascade');
    });
    
    Schema::create('extras', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name')->comment('Tên extra');
      $table->text('description')->comment('Mô tả');
      $table->string('image')->nullable()->comment('Hình ảnh');
      $table->integer('index')->default(0)->comment('Bị trí của extra');
      $table->timestamps();
      $table->softDeletes();

      $table->uuid('service_id')->nullable()->comment('Thuộc về Salon');
      $table->foreign('service_id')
        ->references('id')->on('services')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('extras');
    Schema::dropIfExists('services');
    Schema::dropIfExists('categories');
  }
}
