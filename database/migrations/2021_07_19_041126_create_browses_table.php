<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrowsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('browses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable()->default(null);
            $table->text('other_images')->nullable()->default(null);
            $table->string('video')->nullable()->default(null);
            $table->string('country');
            $table->string('title');
            $table->text('context');
            $table->integer('created_by')->unsigned;
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
        Schema::dropIfExists('browses');
    }
}
