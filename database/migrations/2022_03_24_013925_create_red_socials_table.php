<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('red_socials', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('business_id')->nullable();
            $table->string('red_social');
            $table->string('redsocial_url')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('red_socials');
    }
}
