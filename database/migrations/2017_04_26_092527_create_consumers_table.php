<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateConsumersTable
 */
class CreateConsumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('email', 80)->unique();
            $table->string('password', 255);
            $table->string('first_name', 60);
            $table->string('last_name', 60)->nullable();
            $table->string('phone_number', 60)->nullable();
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
        Schema::drop('consumers');
    }
}
