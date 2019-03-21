<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class BidangKerja extends Model
{
    public $table = 'bidangkerja';
    public $timestamps = false;
    protected $fillable = [
        'nama_kerja','jenis_kerja','tarif'
    ];
}
?>