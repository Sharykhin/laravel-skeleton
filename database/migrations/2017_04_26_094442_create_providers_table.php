<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProvidersTable
 */
class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('email', 80)->unique();
            $table->string('password', 255);
            $table->string('shop_name', 80);
            $table->string('location1', 255);
            $table->string('location2', 255)->nullable();
            $table->string('phone_number', 60)->nullable();
            $table->string('proprietors_name', 60)->nullable();
            $table->string('main_reception_contact', 60)->nullable();
            $table->string('profile_photo_url', 255)->nullable();
            $table->string('activate_token', 255)->nullable();
            $table->boolean('is_active')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('providers');
    }
}
