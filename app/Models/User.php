<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'IdUser';
    protected $fillable = [
        'Nama',
        'Email',
        'password',
        'Alamat',
        'Role',
        'IdKota',
        'Nohp',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Regency()
    {
        return $this->belongsTo(Regency::class,'IdKota');
    }

    public function Produk()
    {
        return $this->HasMany(Produk::class,'IdUser');
    }

    // public function getAuthPassword()
    // {
    //     return $this->Password;
    // }

    // public function validateCredentials(array $credentials)
    // {
    //     $plain = $credentials['password'];
    //     return $this->hasher->check($plain, $this->getAuthPassword());
    // }
}
