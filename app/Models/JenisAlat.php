<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAlat extends Model
{

    use HasFactory;
    protected $primaryKey = 'id_alat';
    protected $table = 'alattangkaps';
    protected $fillable = [
        'nama_alat', 'lokasi_id'
    ];
    public function lokasi()
    {
        return $this->hasOne(Lokasi::class, 'id_lokasi', 'lokasi_id');
    }
    public function hasilalat()
    {
        return $this->hasMany(HasilIkan::class, 'alat_tangkap', 'id_alat');
    }
}
