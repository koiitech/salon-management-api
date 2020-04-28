<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersMigration extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name');
      $table->string('email')->unique();
      $table->string('avatar')->nullable();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->rememberToken();
      $table->timestampsTz();
      $table->softDeletesTz();
    });

    Schema::create('employees', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name');
      $table->string('email')->unique();
      $table->string('avatar')->nullable();
      $table->string('phone')->nullable();
      $table->date('birthday')->nullable();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->rememberToken();
      $table->timestampsTz();
      $table->softDeletesTz();

      $table->uuid('brand_id')->comment('Brand');
      $table->foreign('brand_id')->references('id')->on('brands');
      $table->uuid('salon_id')->nullable()->comment('Thuộc về Salon');
      $table->foreign('salon_id')->references('id')->on('salons');
    });

    Schema::create('customers', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name');
      $table->string('email')->unique();
      $table->string('avatar')->nullable();
      $table->string('phone')->nullable();
      $table->date('birthday')->nullable();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->rememberToken();
      $table->timestampsTz();
      $table->softDeletesTz();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}
