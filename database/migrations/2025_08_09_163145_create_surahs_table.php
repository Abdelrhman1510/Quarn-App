<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surahs', function (Blueprint $table) {
        $table->id();
        $table->string('name_ar'); // اسم السورة بالعربي
        $table->string('name_en'); // اسم السورة بالإنجليزي
        $table->integer('order'); // ترتيب السورة في المصحف
        $table->integer('total_verses'); // عدد الآيات
        $table->string('type'); // مكية أو مدنية
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surahs');
    }
};
