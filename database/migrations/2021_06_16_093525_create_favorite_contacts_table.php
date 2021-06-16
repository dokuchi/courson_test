<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('contact_id')->index();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('contact_id')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_contacts');
    }
}
