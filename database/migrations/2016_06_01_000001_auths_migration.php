<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AuthsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_auth_codes', function (Blueprint $table) {
            $table->string('id', 100)->primary();
            $table->uuid('user_id')->index();
            $table->unsignedBigInteger('client_id');
            $table->text('scopes')->nullable();
            $table->boolean('revoked');
            $table->dateTime('expires_at')->nullable();
        });

        Schema::create('oauth_access_tokens', function (Blueprint $table) {
            $table->string('id', 100)->primary();
            $table->uuid('user_id')->nullable()->index();
            $table->unsignedBigInteger('client_id');
            $table->string('name')->nullable();
            $table->text('scopes')->nullable();
            $table->boolean('revoked');
            $table->timestampsTz();
            $table->dateTime('expires_at')->nullable();
        });

        Schema::create('oauth_refresh_tokens', function (Blueprint $table) {
            $table->string('id', 100)->primary();
            $table->string('access_token_id', 100);
            $table->boolean('revoked');
            $table->dateTime('expires_at')->nullable();
        });

        Schema::create('oauth_clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('user_id')->nullable()->index();
            $table->string('name');
            $table->string('secret', 100)->nullable();
            $table->text('redirect');
            $table->boolean('personal_access_client');
            $table->boolean('password_client');
            $table->boolean('revoked');
            $table->timestampsTz();
        });

        Schema::create('oauth_personal_access_clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->timestampsTz();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oauth_auth_codes');
        Schema::dropIfExists('oauth_access_tokens');
        Schema::dropIfExists('oauth_refresh_tokens');
        Schema::dropIfExists('oauth_clients');
        Schema::dropIfExists('oauth_personal_access_clients');
    }
}
