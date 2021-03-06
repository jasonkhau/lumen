<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('pk')->primary()->default(DB::raw('UUID()'));
            $table->string('id', 6)->unique();
            $table->string('password');
            $table->string('api_token', 400)->nullable()->default(Null);
            $table->string('name', 30);
            $table->boolean('is_active')->default(true);
            $table->enum('role', ['admin', 'merchandiser', 'manager', 'staff', 'inspector', 'mediator']);
            $table->dateTime('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->uuid('workplace_pk');

            $table->foreign('workplace_pk')->references('pk')->on('workplaces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
