<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataIkan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ikan';
    protected $table = 'dataikans';
    protected $fillable = [
        'nama_ikan',
        'harga_ikan',
        'lokasi_id',
    ];
    public $timestamps = true;

    public function lokasi()
    {
        return $this->hasOne(Lokasi::class, 'id_lokasi', 'lokasi_id');
    }
    public function hasilikan()
    {
        return $this->hasMany(HasilIkan::class, 'jenis_ikan', 'id_ikan');
    }
}
