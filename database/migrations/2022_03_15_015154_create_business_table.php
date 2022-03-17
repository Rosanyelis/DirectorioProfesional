<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('subcategory_id');
            $table->uuid('sectores_id');
            $table->string('name');
            $table->string('description');
            $table->string('url_logo');
            $table->string('sitio_web')->nullable();;
            $table->string('phone');
            $table->string('email');
            $table->boolean('delivery');
            $table->string('direccion');
            $table->string('url_catalogo')->nullable();;
            $table->string('url_instagram')->nullable();
            $table->string('url_facebook')->nullable();
            $table->timestamps();


            $table->foreign('sectores_id')
                    ->references('id')
                    ->on('sectores')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('subcategory_id')
                    ->references('id')
                    ->on('subcategories')
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
        Schema::dropIfExists('business');
    }
}
