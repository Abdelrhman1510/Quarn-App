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
        Schema::create('hadiths', function (Blueprint $table) {
          $table->id();
    $table->string('book')->index();
    $table->integer('chapter_number')->nullable();
    $table->text('chapter_title_ar')->nullable();
    $table->text('chapter_title_en')->nullable(); // بدل string بخليها text
    $table->longText('arabic_text');
    $table->longText('english_text')->nullable();
    $table->string('grade')->nullable();
    $table->string('reference')->nullable();
    $table->string('in_book_reference')->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hadiths');
    }
};
