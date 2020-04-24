<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SalonsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Ngành nghề kinh doanh
        Schema::create('businesses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image');
            $table->softDeletesTz()->nullable()->comment('Xóa tạm');
            $table->timestampsTz();
        });

        // Tiện ích
        Schema::create('facilities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->timestampsTz();
            $table->softDeletesTz()->nullable()->comment('Xóa tạm');
        });

        Schema::create('brands', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->comment('Tên tiệm');
            $table->text('description')->nullable()->comment('Mô tả');
            $table->text('logo')->nullable()->comment('Logo');
            $table->text('cover')->nullable()->comment('Ảnh cover');
            $table->string('address')->nullable();
            $table->timestampsTz();

            $table->uuid('user_id')->nullable()->comment('Thuộc về Salon');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
        // Salon
        Schema::create('salons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->comment('Tên tiệm');
            $table->text('cover')->nullable()->comment('Ảnh cover');
            $table->text('logo')->nullable()->comment('Logo');
            $table->string('address')->nullable();
            $table->float('latitude', 10, 6)->nullable()->comment('Kinh độ');
            $table->float('longitude', 10, 6)->nullable()->comment('Vĩ độ');
            $table->text('description')->nullable()->comment('Mô tả');
            $table->json('opening_hours')->nullable()->comment('Giờ mở cửa');
            $table->timestampsTz();
            $table->softDeletesTz()->nullable()->comment('Xóa tạm');
            $table->string('brand_id', 42)->nullable()->comment('ID thương hiệu (nếu có)');
            $table->foreign('brand_id')
                ->references('id')->on('brands')
                ->onDelete('cascade');

            $table->uuid('user_id')->nullable()->comment('Thuộc về Salon');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

        /**
         * Bảng liên kết ngành nghề kinh doanh của salon ( n-n )
         */
        Schema::create('salons_businesses', function (Blueprint $table) {
            // $table->uuid('id')->primary();
            $table->uuid('salon_id');
            $table->uuid('business_id');
            $table->foreign('salon_id')
                ->references('id')->on('salons')
                ->onDelete('cascade');
            $table->foreign('business_id')
                ->references('id')->on('businesses')
                ->onDelete('cascade');
        });

        /**
         * Bảng liên kết Salons - Facilities ( n-n )
         */
        Schema::create('salons_facilities', function (Blueprint $table) {
            $table->string('salon_id', 42);
            $table->string('facility_id', 42);
            $table->foreign('salon_id')
                ->references('id')->on('salons')
                ->onDelete('cascade');
            $table->foreign('facility_id')
                ->references('id')->on('facilities')
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
        Schema::dropIfExists('salons_facility');
        Schema::dropIfExists('salons_businesses');
        Schema::dropIfExists('salons');
        Schema::dropIfExists('brands');
        Schema::dropIfExists('facility');
        Schema::dropIfExists('businesses');
    }
}
