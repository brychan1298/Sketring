<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'Keranjang';
    protected $primaryKey = 'IdKeranjang';
    protected $guarded = ['IdKeranjang'];

    public function Acara() {
        return $this->belongsTo(Acara::class,'IdAcara');
    }

    public function Produk() {
        return $this->belongsTo(Produk::class,'IdProduk');
    }
}
