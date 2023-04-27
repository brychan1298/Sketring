<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;
    protected $table = 'Acara';
    protected $primaryKey = 'IdAcara';
    protected $guarded = ['IdAcara'];

    public function Keranjang()
    {
        return $this->HasMany(Keranjang::class,'IdKeranjang');
    }

    public function User() {
        return $this->belongsTo(User::class,'IdUser');
    }

}
