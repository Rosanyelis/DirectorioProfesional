<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaggablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taggables', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('business_id');
            $table->uuid('tags_id');
            $table->timestamps();

            $table->foreign('business_id')
                    ->references('id')
                    ->on('business')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('tags_id')
                    ->references('id')
                    ->on('tags')
                    ->onUpdate('cascade')
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
        Schema::dropIfExists('taggables');
    }
}
