@extends('umkm.layouts.master')
@section('title', 'Tarik Saldo Konsumen')
@section('description', 'Halaman Tarik Saldo Konsumen')
@section('content')
<style>
    .textJudul {
        text-align: center;
        margin: 0;
        flex-grow: 1;
    }

    hr {
        border: 0.1px solid rgb(110, 110, 110);
    }
</style>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

<div class="container m-auto mt-[100px]">
    <div class="judulAddProduk flex items-center justify-center">
        <a href="/tarikSaldoUMKM">
            <svg class="w-10 h-10" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <title>ionicons-v5-a</title>
                    <polyline points="244 400 100 256 244 112"
                        style="fill:none;stroke:#850000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px">
                    </polyline>
                    <line x1="120" y1="256" x2="412" y2="256"
                        style="fill:none;stroke:#850000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px">
                    </line>
                </g>
            </svg>
        </a>
        <h2 class="textJudul text-4xl font-black">Tarik Saldo</h2>
    </div>

    <hr class="my-8">

    <div class="flex justify-center">
        <div class="relative btn-container bal flex w-1/6 items-center justify-center" x-data="{ show: true }">
            <h1 class="font-bold text-[#850000] text-xl">Rp</h1>
            <h1 class="money text-[#850000] text-4xl px-2 font-bold" id="saldo">35.000</h1>
        </div>
    </div>

    <div class="mx-32 pb-6">
        <h1 class="mt-16 text-2xl">E-Money</h1>
        <hr class="h-px my-3 bg-gray-500 border-0">

        <select id="debit" class="bg-[#F3F3F3] shadow-md text-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4">
            <option selected disabled>Pilih E-Money</option>
            <option value="OVO">OVO</option>
            <option value="GoPay">GoPay</option>
            <option value="DANA">DANA</option>
            <option value="Shopeepay">Shopeepay</option>
            <option value="BNI">BNI</option>
        </select>

        <input type="text" id="nominal" placeholder="Rp Jumlah" class="p-2 text-lg w-1/3 border-b-2 border-gray-400 outline-none focus:border-black my-8">


    </div>

    <div class="flex justify-center my-10">
        <button class="text-xl px-8 bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">
            TARIK
        </button>
    </div>
</div>
@endsection
