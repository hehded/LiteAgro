<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->foreign('company_id')->references('id')->on('company');
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('field_id')->references('id')->on('field');
            $table->time('timeStart');
            $table->time('timeEnd');
            $table->string('type');
            $table->string('description', 512);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
};
