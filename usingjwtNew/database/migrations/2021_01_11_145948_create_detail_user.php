<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_user', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('name');
            $table->date('birth_date');
            $table->date('join_date');
            $table->foreignId('position_id')->constrained('position');
            $table->bigInteger('NIK')->uniqid();
            $table->string('NPWP')->uniqid();
            $table->string('email')->unique();
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
        Schema::dropIfExists('detail_user');
    }
}
