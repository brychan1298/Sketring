<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        User::create([
                'IdUser' => 1,
                'Email' => 'umkm1@gmail.com',
                'IdKota' => '3173',
                'password' => Hash::make('umkm1'),
                'Nama' => 'Bibi Katering',
                'Alamat' => 'Jl. Sudirman No. 123, Kav. 45-46, Jakarta Pusat, 12345, Indonesia',
                'Nohp' => '081122334455',
                'FotoProfil' => 'umkm1.png',
                'Role' => 'umkm',
                // 'Saldo' => '0.00'
        ]);

        $oldPath = 'public/images/umkm1.png';
        $fileExtension = File::extension($oldPath);
        $newName = 'umkm1.'.$fileExtension;
        $newPathWithName = 'storage/app/public/'.$newName;
        File::copy($oldPath , $newPathWithName);

        User::create([
                'IdUser' => 2,
                'Email' => 'umkm2@gmail.com',
                'IdKota' => '3173',
                'password' => Hash::make('umkm2'),
                'Nama' => 'Enak Katering',
                'Alamat' => 'Jl. MH Thamrin No. 678, Kelurahan Gondangdia, Kecamatan Menteng, Jakarta Pusat, 54321, Indonesia',
                'Nohp' => '086670788099',
                'FotoProfil' => 'umkm2.png',
                'Role' => 'umkm',
                // 'Saldo' => '0.00'
        ]);
        $oldPath = 'public/images/umkm2.png';
        $fileExtension = File::extension($oldPath);
        $newName = 'umkm2.'.$fileExtension;
        $newPathWithName = 'storage/app/public/'.$newName;
        File::copy($oldPath , $newPathWithName);

        User::create([
                'IdUser' => 3,
                'Email' => 'umkm3@gmail.com',
                'IdKota' => '3173',
                'password' => Hash::make('umkm3'),
                'Nama' => 'Berkah Katering',
                'Alamat' => 'Jl. Hayam Wuruk No. 80, Kelurahan Mangga Besar, Kecamatan Taman Sari, Jakarta Pusat, 10560, Indonesia',
                'Nohp' => '0821436587091',
                'FotoProfil' => 'umkm3.png',
                'Role' => 'umkm',
                // 'Saldo' => '0.00'
        ]);
        $oldPath = 'public/images/umkm3.png';
        $fileExtension = File::extension($oldPath);
        $newName = 'umkm3.'.$fileExtension;
        $newPathWithName = 'storage/app/public/'.$newName;
        File::copy($oldPath , $newPathWithName);

        User::create([
                'IdUser' => 4,
                'Email' => 'umkm4@gmail.com',
                'IdKota' => '3173',
                'password' => Hash::make('umkm4'),
                'Nama' => 'Delicious Catering',
                'Alamat' => 'Jl. Kebon Sirih No. 45, Jakarta Pusat, 98765, Indonesia',
                'Nohp' => '0832165498702',
                'FotoProfil' => 'umkm4.png',
                'Role' => 'umkm',
                // 'Saldo' => '0.00'
        ]);

        $oldPath = 'public/images/umkm4.png';
        $fileExtension = File::extension($oldPath);
        $newName = 'umkm4.'.$fileExtension;
        $newPathWithName = 'storage/app/public/'.$newName;
        File::copy($oldPath , $newPathWithName);
    }
}
