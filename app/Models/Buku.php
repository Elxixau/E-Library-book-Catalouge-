<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    

    protected $fillable = ['judul', 'penulis', 'tahun_terbit', 'pdf_path', 'gambar_sampul', 'id_kategori'];

    public $timestamps = true;

    /**
     * Define the relationship with the KategoriBuku model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriBuku::class);
    }

    public function category()
    {
        return $this->belongsTo(KategoriBuku::class, 'id_kategori');
    }

    // Define the relationship with KategoriBuku
    public function kategoriBukus()
    {
        return $this->belongsToMany(KategoriBuku::class, 'id', 'kategori');
    }
    
    
}
