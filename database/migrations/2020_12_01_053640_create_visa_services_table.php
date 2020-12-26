<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_services', function (Blueprint $table) {
            $table->id();
            $table->integer('visa_id');
            $table->string('title');
            $table->text('image')->nullable();
            $table->text('visa_detail');
            $table->date('date')->nullable();
            $table->string('comment')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('visa_services');
    }
}
