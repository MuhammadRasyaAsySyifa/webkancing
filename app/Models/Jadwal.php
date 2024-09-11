<?php

// app/Models/Jadwal.php

// app/Models/Jadwal.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jasa',
        'tanggal',
        'jam',
        'durasi'
    ];

    // Menambahkan relasi ke model Jasa
    public function jasa()
    {
        return $this->belongsTo(Jasa::class, 'id_jasa');
    }

}


