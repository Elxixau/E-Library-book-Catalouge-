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
            $table->dropColumn('file_buku'); // Hapus kolom file_buku
            $table->string('pdf_path')->after('sinopsis'); // Tambahkan kolom pdf_path
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
            $table->string('file_buku')->after('sinopsis'); // Kembalikan kolom file_buku
            $table->dropColumn('pdf_path'); // Hapus kolom pdf_path
        });
    }
};
