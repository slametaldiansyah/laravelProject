<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_status', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *2021_01_11_041510_create_progress_status_table.php
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progress_status');
    }
}