<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->onDelete('cascade');
            $table->foreignId('matakuliah_id')->constrained('matakuliah')->onDelete('cascade');
            $table->integer('nilai');
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists('nilai'); }
};
