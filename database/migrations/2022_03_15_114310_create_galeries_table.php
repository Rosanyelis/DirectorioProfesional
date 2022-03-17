<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('ciudades_id')->nullable();
            $table->uuid('sectores_id')->nullable();
            $table->uuid('business_id')->nullable();
            $table->string('url_imagen');
            $table->timestamps();

            $table->foreign('ciudades_id')
                    ->references('id')
                    ->on('ciudades')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('sectores_id')
                    ->references('id')
                    ->on('sectores')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('business_id')
                    ->references('id')
                    ->on('business')
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
        Schema::dropIfExists('galeries');
    }
}
