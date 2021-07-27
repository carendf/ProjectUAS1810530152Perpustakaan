<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabelBuku extends Model
{
    //
    protected $table ='table_buku';
    protected $fillable=['judul','pengarang','penerbit','jumlah'];
}
