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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug');
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('tahun_terbit');
            $table->tinyInteger('jumlah_halaman');
            $table->foreignId('kategori_id')
                  ->constrained('kategoris')
                  ->onDelete('cascade');
            $table->string('email');
            $table->integer('jumlah_baca');
            $table->string('url_pdf');
            $table->timestamps();

            $table->foreign('email')->references('email')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bukus', function(Blueprint $table) {
            $table->dropForeign('email');
            $table->dropForeign('kategori_id');
        });

        Schema::dropIfExists('bukus');
    }
};
