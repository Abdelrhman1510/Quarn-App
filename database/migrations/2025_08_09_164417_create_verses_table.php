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
        Schema::create('verses', function (Blueprint $table) {
             $table->id();
        $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade'); 
        $table->integer('verse_number'); // رقم الآية
        $table->text('text_ar'); // نص الآية بالعربي
        $table->text('text_en')->nullable(); // الترجمة بالإنجليزي
        $table->longText('tafseer')->nullable();
            $table->longText('tafseer_en')->nullable();
 // التفسير
        $table->string('audio_url')->nullable(); // رابط التلاوة
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verses');
    }
};
