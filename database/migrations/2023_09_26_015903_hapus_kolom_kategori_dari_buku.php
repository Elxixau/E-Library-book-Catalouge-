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
    Schema::table('buku', function (Blueprint $table) {
        $table->dropColumn('kategori'); // Menghapus kolom 'kategori' dari tabel 'buku'
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('buku', function (Blueprint $table) {
        $table->text('kategori')->nullable(); // Mengembalikan kolom 'kategori' dengan tipe TEXT
    });
}

};
