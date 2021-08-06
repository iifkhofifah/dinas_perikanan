<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lokasi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'lokasi_id','id_lokasi');
    }
    public function alat()
    {
        return $this->belongsTo(JenisAlat::class,'lokasi_id','id_lokasi');
    }
    public function ikan()
    {
        return $this->belongsTo(DataIkan::class,'lokasi_id','id_lokasi');
    }
}
