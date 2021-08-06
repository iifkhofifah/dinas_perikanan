<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilIkan extends Model
{
    use HasFactory;

    protected $table = 'hasiltangkapikans';
    protected $primaryKey = 'id_hasil';
    protected $fillable = [
        'lokasi_id',
        'tgl',
        'jenis_ikan',
        'alat_tangkap',
        'volume_kg',
        'harga_kg',
        'total_harga',
    ];

    public $timestamps = false;

    public function lokasi()
    {
        return $this->hasOne(Lokasi::class, 'id_lokasi', 'lokasi_id');
    }

    public function dataikan()
    {
        return $this->belongsTo(DataIkan::class, 'jenis_ikan', 'id_ikan');
    }
    public function jenisalat()
    {
        return $this->belongsTo(JenisAlat::class, 'alat_tangkap', 'id_alat');
    }
}
