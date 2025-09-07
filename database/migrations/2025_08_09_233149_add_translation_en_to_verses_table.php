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
    Schema::table('verses', function (Blueprint $table) {
        $table->text('translation_en')->nullable();
    });
}

public function down()
{
    Schema::table('verses', function (Blueprint $table) {
        $table->dropColumn('translation_en');
    });
}
};
