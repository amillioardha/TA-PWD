<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Pekerja extends Model
{
    public $table = 'pekerja';
    public $timestamps = false;
    protected $fillable = [
        'nama_lengkap','bidang_kerja','jenis_kelamin','no_hp','alamat'
    ];
}
?>