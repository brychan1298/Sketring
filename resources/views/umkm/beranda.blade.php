@extends('umkm.layouts.master')
@section('title', 'UMKM Beranda')
@section('description', 'Halaman Beranda UMKM')
@section('content')

    <div class="container m-auto mt-[140px]">
        <div class="rounded-md shadow-3xl py-10">
            <p class="text-[#C0C0C0] font-semibold text-center ">
                {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
            </p>
            <h1 class="font-normal text-3xl mt-3 text-center ">
                Halo, <label class="font-black">{{ Auth::User()->Nama }}</label>
            </h1>
            <div
                class="rounded-md
                shadow-3xl py-5 px-5
                bg-[#FFDB89] mx-[26vw]
                mt-12 flex justify-between
                text-[#850000] font-bold">
                <div class="">
                    <h1>Saldo</h1>
                    <h1>
                        <label>@currency(Auth::User()->Saldo)</label>
                    </h1>
                </div>
                <div class="border-l-2 pl-4 border-[#850000]">
                    <h1>
                        @php
                            $Produk = App\Models\Produk::where('IdUser', Auth::User()->IdUser);
                        @endphp
                        {{ $Produk->count() }}
                    </h1>
                    <h1>Produk</h1>
                </div>
                <div class="border-l-2 pl-4 border-[#850000]">
                    <h1>
                        @php
                            $Pesanan = App\Models\TransaksiDetail::where('Status', 2);
                        @endphp
                        {{ $Pesanan->count() }}
                    </h1>
                    <h1>Pesanan Menunggu</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container m-auto mt-[60px]">
        <div class="grid grid-cols-2 gap-x-20">
            <div>
                <h1 class="text-3xl font-bold">
                    Produk di Toko Anda
                </h1>
                <h1 class="mt-4 text-[#8F8F8F]">
                    {{ $Produk->count() }} Produk tersedia di
                    <a href="" class="text-decoration-none text-[#850000] hover:underline">
                        toko anda
                    </a>
                </h1>

                <div class="grid grid-cols-3 gap-5 mt-12">
                    @foreach ($ProdukUMKM as $Produk)
                        <div class="rounded-md shadow-3xl">
                            <img src="{{ asset('storage/' . $Produk->FotoProduk) }}" alt="" class="w-full h-[8.8vw]">
                            <div class="p-4">
                                <h1 class="font-black my-1 h-12">{{$Produk->Nama}}</h1>
                                <p class="font-normal text-xs mt-3 h-8">{{$Produk->Deskripsi}}</p>
                                <div class="flex justify-between mt-4">
                                    <h1 class="text-[#850000] text-sm">
                                        @currency($Produk->Harga)
                                    </h1>
                                    <div class="flex justify-between items-center">
                                        <svg width="18" height="13" viewBox="0 0 18 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 0C4.90909 0 1.41545 2.54455 0 6.13636C1.41545 9.72818 4.90909 12.2727 9 12.2727C13.0909 12.2727 16.5845 9.72818 18 6.13636C16.5845 2.54455 13.0909 0 9 0ZM9 10.2273C6.74182 10.2273 4.90909 8.39455 4.90909 6.13636C4.90909 3.87818 6.74182 2.04545 9 2.04545C11.2582 2.04545 13.0909 3.87818 13.0909 6.13636C13.0909 8.39455 11.2582 10.2273 9 10.2273ZM9 3.68182C7.64182 3.68182 6.54545 4.77818 6.54545 6.13636C6.54545 7.49455 7.64182 8.59091 9 8.59091C10.3582 8.59091 11.4545 7.49455 11.4545 6.13636C11.4545 4.77818 10.3582 3.68182 9 3.68182Z"
                                                fill="#C0C0C0" />
                                        </svg>
                                        <div class="text-sm">25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5">
                    <a href="/umkm/dashboard" class="bg-[#850000] text-white py-2 px-10 rounded-md">
                        Selengkapnya
                    </a>
                </div>
            </div>

            <div class="rounded-xl shadow-3xl">
                <div class="bg-[#850000] rounded-t-xl px-7 py-2">
                    <h1 class="text-2xl text-white">
                        Chat
                    </h1>
                </div>
                <div class="mx-7 py-5 flex border-b-2 items-center justify-between">
                    <div class="flex gap-5">
                        <img class="w-12 h-12 rounded-full bg-gray" src="">
                        <div class="">
                            <h1 class="font-semibold">
                                Samsul Katering
                            </h1>
                            <p class="font-normal text-sm text-[#8F8F8F]">
                                Selamat pagi, pesanan yang tadi siang sudah fix ya jadinya ???
                            </p>
                        </div>
                    </div>
                    <div>
                        1
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
