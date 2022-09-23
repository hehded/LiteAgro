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
        Schema::create('field', function (Blueprint $table) {
            $table->id();
            $table->foreign('company_id')->references('id')->on('company');
            $table->string('address', 512);
            $table->text('area');
            $table->string('type');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field');
    }
};
