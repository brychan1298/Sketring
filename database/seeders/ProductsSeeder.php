<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        // }
    }
}
