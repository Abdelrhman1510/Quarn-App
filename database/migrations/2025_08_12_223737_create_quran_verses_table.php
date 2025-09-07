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
        Schema::create('quran_verses', function (Blueprint $table) {
           $table->id();
        $table->integer('jozz');              // الجزء
        $table->integer('sura_no');            // رقم السورة
        $table->string('sura_name_en');        // اسم السورة بالإنجليزي
        $table->string('sura_name_ar');        // اسم السورة بالعربي
        $table->integer('page');                // صفحة المصحف
        $table->integer('line_start');         // بداية السطر (اختياري)
        $table->integer('line_end');           // نهاية السطر (اختياري)
        $table->integer('aya_no');              // رقم الآية
        $table->text('aya_text');               // نص الآية الأصلي (بخط المصحف)
        $table->text('aya_text_emlaey');        // نص الآية (مصحح/مبسط)
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quran_verses');
    }
};
