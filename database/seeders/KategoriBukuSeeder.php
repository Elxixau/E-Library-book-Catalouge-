<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriBuku;

class KategoriBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoriData = [
            ['kategori' => 'Fiksi'],
            ['kategori' => 'Non-Fiksi'],
            ['kategori' => 'Romance'],
            ['kategori' => 'Science Fiction'],
            // Tambahkan jenis kategori lainnya sesuai kebutuhan
        ];

        KategoriBuku::insert($kategoriData);
    
    }
}
