<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('auth_role', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('role_id');
        //     // $table->foreignId('role_id')->references('id')->on('role');
        //     $table->unsignedBigInteger('application_id');
        //     // $table->foreignId('application_id')->references('id')->on('application');
        //     $table->unsignedBigInteger('user_id');
        //     $table->timestamps();
        // });

        Schema::create('auth_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('role_id')->constrained('role');
            $table->foreignId('application_id')->constrained('application');
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
        Schema::dropIfExists('auth_role');
    }
}
