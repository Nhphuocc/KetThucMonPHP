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
        Schema::create('tensach', function (Blueprint $table) {
            $table->id();
            $table->string('ten_sach');
            $table->foreignId('tacgia_id')->constrained('tacgia')->onDelete('cascade');
            $table->string('Noi_dung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tensach');
    }
};
