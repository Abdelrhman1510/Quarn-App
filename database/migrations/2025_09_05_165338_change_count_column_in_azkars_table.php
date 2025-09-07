<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('azkars', function (Blueprint $table) {
        $table->string('count')->default('1')->change();
    });
}

public function down()
{
    Schema::table('azkars', function (Blueprint $table) {
        $table->integer('count')->default(1)->change();
    });
}
};
