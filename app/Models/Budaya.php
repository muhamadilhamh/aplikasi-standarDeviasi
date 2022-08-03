<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budaya extends Model
{
    protected $fillable = [
        'nama_budaya','slug' ,'deskripsi','video','gambar','provinsi_id','kategori_id'
    ];
    protected $with = [
        'provinsi'
    ];
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
