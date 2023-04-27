@extends('konsumen.layouts.master')
@section('title','List Keranjang')
@section('description','Halaman Daftar Keranjang')
@section('content')
<div class="container m-auto">
    <div class="mt-[100px] grid grid-cols-3 border-b-2 pb-5">
        <h1></h1>
        <h1 class="text-center font-bold text-2xl">Keranjang Belanja</h1>
        <div class="text-right">
            <div class="flex float-right items-center gap-3">
                <h1 class="">
                    Tambah Koleksi
                </h1>
                <div class="">
                    <div id="dropdownToggle"
                        class="bg-[#850000] w-11 h-11 text-white rounded-full flex justify-center items-center cursor-pointer"
                        data-dropdown-toggle="dropdown">
                        +
                    </div>
                    <div id="dropdown"
                        class="hidden rounded-lg border-2 border-[#850000] bg-[#BBBBBB] p-5">
                        <form action="/konsumen/tambahAcara" method="post">
                            @csrf
                            <div>
                                <p class="text-left font-extrabold">
                                    Nama Koleksi
                                </p>
                                <input name="Nama" type="text"
                                    class="shadow mt-3 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="">
                                <button type="submit" class="bg-[#850000] text-white px-8 py-2 rounded mt-8">
                                    Ok
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-4 mt-12 gap-7 mx-auto">
        <a href="/konsumen/keranjang">
            <div>
                <div class="rounded-md shadow-3xl">
                    <img src="images/secure.png" alt="" class="w-full aspect-square">
                </div>
                <h1 class="font-bold mt-5">
                    Semua Produk
                </h1>
            </div>
        </a>
        @foreach ($daftarAcara as $acara)
            <a href="">
                <div>
                    <div class="rounded-md shadow-3xl">
                        <img src="images/secure.png" alt="" class="w-full aspect-square">
                    </div>
                    <h1 class="font-bold mt-5">
                        {{$acara->Nama}}
                    </h1>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
