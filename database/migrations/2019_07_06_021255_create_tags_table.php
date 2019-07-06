<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_tag');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('artikel_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_tag');
            $table->unsignedInteger('id_artikel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('artikel_tag');
    }
}
