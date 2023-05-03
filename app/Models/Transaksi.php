<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'Transaksi';
    protected $primaryKey = 'IdTransaksi';
    protected $guarded = ['IdTransaksi'];

    public function User() {
        return $this->belongsTo(User::class,'IdUser');
    }
    public function TransaksiDetail() {
        return $this->hasMany(TransaksiDetail::class,'Id');
    }
}
