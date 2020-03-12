<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateReceivingSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiving_sessions', function (Blueprint $table) {
            $table->uuid('pk')->primary()->default(Str::uuid());
            $table->enum('kind', ['importing', 'restoring', 'collecting']);
            $table->dateTime('executed_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->uuid('user_pk');

            $table->foreign('user_pk')->references('pk')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receiving_sessions');
    }
}
