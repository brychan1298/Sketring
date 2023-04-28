<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;
    protected $table = 'TransaksiDetail';
    protected $primaryKey = 'Id';
    protected $guarded = ['Id'];

    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class,'IdTransaksi');
    }
    public function Produk() {
        return $this->belongsTo(Produk::class,'IdProduk');
    }
    public function Acara() {
        return $this->belongsTo(Acara::class,'IdAcara');
    }
}
