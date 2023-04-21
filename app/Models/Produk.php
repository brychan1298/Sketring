<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'Produk';
    protected $primaryKey = 'IdProduk';
    protected $guarded = ['IdProduk'];

    public function User() {
        return $this->belongsTo(User::class,'IdUser');
    }

    public function Keranjang()
    {
        return $this->HasMany(Keranjang::class,'IdKeranjang');
    }
}
