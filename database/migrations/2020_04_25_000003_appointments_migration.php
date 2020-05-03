<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppointmentsMigration extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('appointments', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->uuid('customer_id')->nullable();
      $table->uuid('salon_id');
      $table->uuid('employee_id')->nullable()->comment('Nhân viên được chọn');
      $table->dateTime('scheduled_at')->comment('Thời gian hẹn');
      $table->dateTime('checkedin_at')->nullable()->comment('Thời gian checkin');
      $table->dateTime('started_at')->nullable()->comment('Thời gian bắt đầu');
      $table->dateTime('finished_at')->nullable()->comment('Thời gian hoàn thành');
      $table->timestampsTz();

      $table->foreign('customer_id')->references('id')->on('customers');
      $table->foreign('salon_id')->references('id')->on('salons');
      $table->foreign('employee_id')->references('id')->on('employees');
    });

    Schema::create('appointment_details', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->uuid('appointment_id');
      $table->uuid('service_id');
      $table->timestampsTz();

      $table->foreign('appointment_id')->references('id')->on('appointments');
      $table->foreign('service_id')->references('id')->on('services');
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
