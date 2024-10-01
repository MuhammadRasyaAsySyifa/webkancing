<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    protected $fillable = [
        'nama', 'deskripsi', 'harga', 'gambar','deskripsilayanan','include','penting','kategori','durasi'
    ];
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'id_jasa');
    }
 // Metode untuk menyimpan gambar
 public function saveImage($image)
 {
     // Generate nama unik untuk gambar
     $imageName = time().'.'.$image->extension();

     // Simpan gambar ke dalam direktori 'public/images'
     $image->move(public_path('images'), $imageName);

     // Simpan nama gambar ke dalam atribut 'gambar' pada model Jasa
     $this->gambar = $imageName;
     $this->save();
 }
}