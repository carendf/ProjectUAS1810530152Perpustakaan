<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabelPinjaman extends Model
{
    //
    protected $table='table_peminjaman';
    protected $fillable=['nama','no_telepon','jumlah','kd_buku'];
    public function data_buku(){
        return $this->belongsTo(TabelBuku::class,'kd_buku');
    }

}
