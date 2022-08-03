<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $fillable = [
        // 'nama_provinsi','slug','koordinat','jumlah_budaya','geojson','geojson_id'
        'nama_provinsi','kode','slug','koordinat','jumlah_budaya','geojson','geojson_id'

 ];
 public function budaya()
    {
      return $this->hasMany(Budaya::class);
    }
}
