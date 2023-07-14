<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $users = User::where('Role', 'umkm')
        //         ->where('IdUser', 1)->get();

        // foreach ($users1 as $umkm) {
            // produk umkm1
            Produk::create([
                'IdUser' => 1,
                'Nama' => 'Nasi Goreng',
                'FotoProduk' => 'nasiGoreng.jpg',
                'Deskripsi' => 'Nasi yang digoreng dengan bumbu dan diberi topping seperti telur, ayam, dan sayuran.',
                'Harga' => 15000,
                'Rating' => 4,
                'MinOrder' => 25,
                'MaxOrder' => 100
            ]);
            Storage::disk('public')->put('filename', 'nasiGoreng.jpg');

            // $oldPath = 'images/nasiGoreng.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'nasiGoreng.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 1,
                'Nama' => 'Mie Ayam',
                'FotoProduk' => 'mieAyam.jpg',
                'Deskripsi' => 'Mie kuning yang disajikan dengan irisan ayam, pangsit, dan kuah.',
                'Harga' => 20000,
                'Rating' => 4,
                'MinOrder' => 10,
                'MaxOrder' => 100
            ]);
            Storage::disk('public')->put('filename', 'mieAyam.jpg');

            // $oldPath = 'images/mieAyam.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'mieAyam.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);


            Produk::create([
                'IdUser' => 1,
                'Nama' => 'Lontong Sayur',
                'FotoProduk' => 'lontongSayur.jpg',
                'Deskripsi' => 'Hidangan tradisional Indonesia yang terdiri dari potongan lontong (nasi ketan yang direbus dan dibungkus daun pisang) yang disajikan dengan kuah gurih berbasis santan dan sayuran seperti rebung, tahu, tempe, dan daun singkong.',
                'Harga' => 17000,
                // 'Rating' => '',
                'MinOrder' => 30,
                'MaxOrder' => 85
            ]);
            Storage::disk('public')->put('filename', 'lontongSayur.jpg');

            // $oldPath = 'images/lontongSayur.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'lontongSayur.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 1,
                'Nama' => 'Nasi Kuning',
                'FotoProduk' => 'nasiKuning.jpg',
                'Deskripsi' => 'Nasi yang terbuat dari beras yang dimasak dengan santan, rempah-rempah, dan kunyit, memberikan warna kuning yang khas dengan berbagai lauk-pauk, seperti ayam goreng, telur, serundeng, dan acar.',
                'Harga' => 16500,
                'Rating' => 5,
                'MinOrder' => 45,
                'MaxOrder' => 120
            ]);
            Storage::disk('public')->put('filename', 'nasiKuning.jpg');

            // $oldPath = 'images/nasiKuning.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'nasiKuning.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 1,
                'Nama' => 'Kwetiau Goreng',
                'FotoProduk' => 'kwetiauGoreng.jpg',
                'Deskripsi' => 'Mie kwetiau yang digoreng dengan berbagai bahan seperti daging, seafood, sayuran, dan rempah-rempah dengan tambahan seperti telur, udang, irisan daging, tauge, dan daun bawang.',
                'Harga' => 19500,
                'Rating' => 5,
                'MinOrder' => 30,
                'MaxOrder' => 150
            ]);
            Storage::disk('public')->put('filename', 'kwetiauGoreng.jpg');

            // $oldPath = 'images/kwetiauGoreng.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'kwetiauGoreng.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);
        // }

            // produk umkm2
            Produk::create([
                'IdUser' => 2,
                'Nama' => 'Nasi Liwet',
                'FotoProduk' => 'nasiLiwet.jpg',
                'Deskripsi' => 'Nasi yang nasi yang dimasak dengan santan, daun salam, lengkuas, bawang merah dengan lauk-pauk ayam goreng, telur, ikan teri, tempe, dan labu siam atau daun pepaya.',
                'Harga' => 25000,
                'Rating' => 5,
                'MinOrder' => 50,
                'MaxOrder' => 400
            ]);
            Storage::disk('public')->put('filename', 'nasiLiwet.jpg');

            // $oldPath = 'images/nasiLiwet.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'nasiLiwet.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 2,
                'Nama' => 'Sate Madura',
                'FotoProduk' => 'sateMadura.jpeg',
                'Deskripsi' => 'Sate daging ayam yang disajikan dengan lontong, irisan timun, dan bawang merah, serta disiram dengan bumbu kacang yang melimpah.',
                'Harga' => 30000,
                // 'Rating' => '',
                'MinOrder' => 20,
                'MaxOrder' => 90
            ]);
            Storage::disk('public')->put('filename', 'sateMadura.jpeg');

            // $oldPath = 'images/sateMadura.jpeg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'sateMadura.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 2,
                'Nama' => 'Rendang',
                'FotoProduk' => 'rendang.jpg',
                'Deskripsi' => 'Potongan daging sapi yang dimasak secara perlahan dalam campuran rempah-rempah yang kaya seperti serai, lengkuas, jahe, bawang merah, bawang putih, cabai.',
                'Harga' => 35000,
                // 'Rating' => '',
                'MinOrder' => 15,
                'MaxOrder' => 125
            ]);
            Storage::disk('public')->put('filename', 'rendang.jpg');

            // $oldPath = 'images/rendang.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'rendang.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 2,
                'Nama' => 'Gulai',
                'FotoProduk' => 'gulai.jpg',
                'Deskripsi' => 'Gulai yang dibuat dengan memasak bahan-bahan dalam campuran rempah-rempah yang kaya seperti serai, daun jeruk, cabai, kunyit, jahe, bawang merah, bawang putih, dan santan kelapa.',
                'Harga' => 17500,
                'Rating' => 3,
                'MinOrder' => 25,
                'MaxOrder' => 100
            ]);
            Storage::disk('public')->put('filename', 'gulai.jpg');

            // $oldPath = 'images/gulai.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'gulai.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 2,
                'Nama' => 'Telur Balado',
                'FotoProduk' => 'telurBalado.jpg',
                'Deskripsi' => 'Telur rebus yang dilumuri dengan bumbu balado pedas.',
                'Harga' => 8000,
                'Rating' => 4,
                'MinOrder' => 35,
                'MaxOrder' => 250
            ]);
            Storage::disk('public')->put('filename', 'telurBalado.jpg');

            // $oldPath = 'images/telurBalado.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'telurBalado.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            // produk umkm3
            Produk::create([
                'IdUser' => 3,
                'Nama' => 'Pempek Palembang',
                'FotoProduk' => 'pempek.jpg',
                'Deskripsi' => 'Pempek terbuat dari adonan ikan yang dicampur dengan tepung kanji, air, dan garam disajikan dengan kuah cuko, yang terbuat dari cabai, gula, air asam, bawang putih, dan garam.',
                'Harga' => 15000,
                'Rating' => 5,
                'MinOrder' => 50,
                'MaxOrder' => 355
            ]);
            Storage::disk('public')->put('filename', 'pempek.jpg');

            // $oldPath = 'images/pempek.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'pempek.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 3,
                'Nama' => 'Spaghetti Bolognese',
                'FotoProduk' => 'spageti.png',
                'Deskripsi' => 'Spaghetti dengan saus yang terbuat dari daging giling, bawang bombay, tomat, dan bumbu segar.',
                'Harga' => 30000,
                // 'Rating' => '',
                'MinOrder' => 17,
                'MaxOrder' => 255
            ]);
            Storage::disk('public')->put('filename', 'spageti.png');

            // $oldPath = 'images/spageti.png';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'spageti.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 3,
                'Nama' => 'Kue Sus',
                'FotoProduk' => 'kueSus.jpg',
                'Deskripsi' => 'Kue yang terbuat dari adonan pasta choux yang dipanggang hingga mengembang dan berongga di bagian dalamnya.',
                'Harga' => 7500,
                // 'Rating' => '',
                'MinOrder' => 20,
                'MaxOrder' => 125
            ]);
            Storage::disk('public')->put('filename', 'kue.jpg');

            // $oldPath = 'images/kue.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'kue.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 3,
                'Nama' => 'Ayam Teriyaki',
                'FotoProduk' => 'ayamTeriyaki.jpg',
                'Deskripsi' => 'Daging ayam yang dimarinasi dengan campuran saus teriyaki yang terbuat dari kecap manis, mirin, sake dan gula.',
                'Harga' => 21500,
                'Rating' => 5,
                'MinOrder' => 55,
                'MaxOrder' => 342
            ]);
            Storage::disk('public')->put('filename', 'ayamTeriyaki.jpg');

            // $oldPath = 'images/ayamTeriyaki.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'ayamTeriyaki.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 3,
                'Nama' => 'Soto Betawi',
                'FotoProduk' => 'sotoBetawi.jpg',
                'Deskripsi' => 'Soto gurih dengan kuah santan berisi daging sapi, jeroan sapi dan organ sapi lainnya, seperti mata sapi, torpedo, dan hati.',
                'Harga' => 22000,
                'Rating' => 4,
                'MinOrder' => 12,
                'MaxOrder' => 150
            ]);
            Storage::disk('public')->put('filename', 'sotoBetawi.jpg');

            // $oldPath = 'images/sotoBetawi.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'sotoBetawi.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            // produk umkm4
            Produk::create([
                'IdUser' => 4,
                'Nama' => 'Teh Lemon',
                'FotoProduk' => 'tehLemon.jpg',
                'Deskripsi' => 'Minuman yang terbuat dari campuran teh dan perasan lemon atau irisan lemon segar.',
                'Harga' => 12000,
                'Rating' => 3,
                'MinOrder' => 20,
                'MaxOrder' => 105
            ]);
            Storage::disk('public')->put('filename', 'tehLemon.jpg');

            // $oldPath = 'images/tehLemon.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'tehLemon.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 4,
                'Nama' => 'Mie Goreng',
                'FotoProduk' => 'mieGoreng.jpg',
                'Deskripsi' => 'Hidangan mie yang digoreng dengan berbagai bumbu dan bahan tambahan lainnya seperti daging ayam, udang, atau daging sapi, serta sayuran seperti wortel, kol, atau kacang polong.',
                'Harga' => 20000,
                // 'Rating' => '',
                'MinOrder' => 20,
                'MaxOrder' => 305
            ]);
            Storage::disk('public')->put('filename', 'mieGoreng.jpg');

            // $oldPath = 'images/mieGoreng.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'mieGoreng.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 4,
                'Nama' => 'Capcay',
                'FotoProduk' => 'capcay.jpg',
                'Deskripsi' => 'Sayuran yang dipotong-potong dan ditumis dengan bumbu-bumbu seperti bawang putih, bawang merah, saus tiram, dan kecap manis.',
                'Harga' => 28000,
                'Rating' => 5,
                'MinOrder' => 25,
                'MaxOrder' => 115
            ]);
            Storage::disk('public')->put('filename', 'capcay.jpg');

            // $oldPath = 'images/capcay.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'capcay.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 4,
                'Nama' => 'Fuyunghai',
                'FotoProduk' => 'fuyunghai.jpg',
                'Deskripsi' => 'Disajikan dengan saus khusus seperti saus cuka atau saus tomat di atasnya sehingga memiliki rasa gurih, lezat, dan tekstur yang lembut dari adonan telur yang setelah digoreng.',
                'Harga' => 21500,
                'Rating' => 4,
                'MinOrder' => 55,
                'MaxOrder' => 342
            ]);
            Storage::disk('public')->put('filename', 'fuyunghai.jpg');

            // $oldPath = 'images/fuyunghai.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'fuyunghai.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);

            Produk::create([
                'IdUser' => 4,
                'Nama' => 'Sop Iga',
                'FotoProduk' => 'sopIga.jpg',
                'Deskripsi' => 'Sop iga sapi yang dimasak dalam kaldu yang kaya dengan bumbu-bumbu seperti bawang putih, bawang merah, jahe, lada, dan rempah-rempah lainnya.',
                'Harga' => 32000,
                'Rating' => 5,
                'MinOrder' => 12,
                'MaxOrder' => 150
            ]);
            Storage::disk('public')->put('filename', 'sopIga.jpg');

            // $oldPath = 'images/sopIga.jpg';
            // $fileExtension = File::extension($oldPath);
            // $newName = 'sopIga.'.$fileExtension;
            // $newPathWithName = './.storage/app/public'.$newName;
            // File::copy($oldPath , $newPathWithName);
        // }
    }
}
