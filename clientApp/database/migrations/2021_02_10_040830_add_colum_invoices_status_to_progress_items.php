<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumInvoicesStatusToProgressItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('progress_items', function (Blueprint $table) {
            $table->foreignId('invoice_status_id')->nullable()->constrained('progress_status')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('progress_items', function (Blueprint $table) {
            $table->foreignId('invoice_status_id')->nullable()->constrained('progress_status')->onDelete('cascade')->onUpdate('cascade');
        });
    }
}
