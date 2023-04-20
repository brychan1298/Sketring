@extends('konsumen.layouts.master')
@section('title', 'Detail Produk')
@section('description', 'Detail dari produk')
@section('content')
    <div class="container mt-[100px] mx-auto">
        <div class="flex">
            <div class="w-1/2">
                <img src="" alt="">
            </div>
            <div class="w-1/2 p-4">
                <h1 class="text-4xl font-black">
                    PAKET NASI HAINAM
                </h1>
                <h1 class="text-[#DC0000] text-2xl font-bold">
                    Rp. 25,000 / Porsi
                </h1>
                <p class="text-sm my-4">
                    Nasi putih aromatik dengan potongan ayam empuk, minyak jahe dan saus cabe segar - hidangan khas Hainan
                    yang lezat dan nikmat.
                </p>

                <div>
                    Rating
                </div>
                <div class="my-4 text-[#850000] font-bold text-lg">
                    Pengiriman
                    <div class="flex">
                        <div class="py-1 px-5 my-1 border-[#850000] border-2 rounded-xl">
                            DELIVERY
                        </div>
                    </div>
                </div>

                <div class="text-[#850000] font-bold text-lg">
                    Keranjang:
                </div>
                <select name="" id="" class="bg-[#850000] text-white py-2 px-5 rounded-xl">
                    <option value="">PILIH KERANJANG</option>
                </select>

                <div class="text-[#850000] font-bold text-lg mt-2">
                    Jumlah:
                </div>
                <div class="custom-number-input h-10 w-32">
                    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                        <button data-action="decrement"
                            class="bg-[#850000] h-full w-20 rounded-l cursor-pointer outline-none">
                            <span class="m-auto text-2xl font-thin text-white">−</span>
                        </button>
                        <input type="number"
                            class="outline-none text-center focus:outline-none text-center w-full text-md border-2 border-[#850000]"
                            name="custom-input-number" value="0"></input>
                        <button data-action="increment"
                            class="bg-[#850000] h-full w-20 rounded-r cursor-pointer">
                            <span class="m-auto text-2xl font-thin text-white">+</span>
                        </button>
                    </div>
                </div>

                <div class="flex gap-3 mt-7 font-black">
                    <button class="bg-white border-2 border-[#DC0000] text-[#DC0000] py-1 px-4 rounded-lg">
                        MASUKKAN KERANJANG
                    </button>
                    <button class="bg-[#DC0000] text-white py-1 px-4 rounded-md">
                        BELI SEKARANG
                    </button>
                </div>

                <div class="mt-5">
                    <h1 class="text-[#850000]">TOKO:</h1>
                    <div class="flex items-center gap-3">
                        <img src="" alt="">
                        <div>
                            <h1 class="text-xl font-black">Terrace Lupita</h1>
                            <div class="flex gap-3">
                                <a href="" class="text-decoration-none border-2 text-[#850000] rounded-md border-[#850000] py-1 px-3 bg-white">
                                    Chat
                                </a>
                                <a href="" class="text-decoration-none border-2 text-[#850000] rounded-md border-[#850000] py-1 px-3 bg-white">
                                    Lihat Toko
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
