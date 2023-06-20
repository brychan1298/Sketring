@extends('umkm.layouts.master')
@section('title', 'UMKM Beranda')
@section('description', 'Halaman Beranda UMKM')
@section('content')
    <style>
        #bannerUMKM {
            position: relative;
        }

        #bannerUMKM::before {
            content: "";
            background-image: url('/images/bg_beranda_umkm.png');
            background-size: cover;
            position: absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            opacity: 0.4;
        }

        #bannerUMKM-child {
            position: relative;

        }
    </style>

    <div class="container m-auto mt-[140px]" id="bannerUMKM">
        <div class="rounded-md shadow-3xl py-10" id="bannerUMKM-child">
            <p class="font-semibold text-center text-lg">
                {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
            </p>
            <h1 class="font-normal text-3xl mt-3 text-center ">
                Halo, <label class="font-black drop-shadow-lg shadow-black text-[#850000]">{{ Auth::User()->Nama }}</label>
            </h1>
            <div
                class="rounded-md
                shadow-3xl py-5 px-5
                bg-[#FFDB89] lg:mx-[26vw] mx-[5vw]
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

    <div class="container m-auto mt-[60px] mb-[90px]">
        <div class="grid lg:grid-cols-2 gap-x-20 max-sm:mx-7">
            <div class="">
                <div class="flex justify-between">
                    <div>
                        <h1 class="text-3xl font-bold max-sm:text-xl">
                            Produk di Toko Anda
                        </h1>
                        <h1 class="mt-4 text-[#8F8F8F] max-sm:text-sm">
                            {{ $Produk->count() }} Produk tersedia di
                            <a href="" class="text-decoration-none text-[#850000] hover:underline">
                                toko anda
                            </a>
                        </h1>
                    </div>

                    <div class="mt-5">
                        <a href="/umkm/dashboard"
                            class="bg-[#850000] text-white py-2 px-10 max-sm:px-7 rounded-md max-sm:text-sm">
                            Selengkapnya
                        </a>
                    </div>
                </div>


                <div class="grid sm:grid-cols-3 max-sm:grid-cols-2 gap-5 mt-12">
                    @foreach ($ProdukUMKM as $Produk)
                        <div class="rounded-md shadow-3xl">
                            <img src="{{ asset('storage/' . $Produk->FotoProduk) }}" alt=""
                                class="w-full sm:h-[20vw] max-sm:h-[24vw] object-cover rounded-md xl:h-[9.4vw] lg:h-[12vw]">
                            <div class="p-4">
                                <h1 class="font-black my-1 h-12">{{ $Produk->Nama }}</h1>
                                <p class="font-normal text-xs mt-3 h-8">{{ $Produk->Deskripsi }}</p>
                                <div class="flex justify-between mt-4">
                                    <h1 class="text-[#850000] text-sm">
                                        @currency($Produk->Harga)
                                    </h1>
                                    <div class="flex justify-between items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="#8F8F8F"
                                                d="m12 18.275l-4.15 2.5q-.275.175-.575.15t-.525-.2q-.225-.175-.35-.438t-.05-.587l1.1-4.725L3.775 11.8q-.25-.225-.312-.513t.037-.562q.1-.275.3-.45t.55-.225l4.85-.425l1.875-4.45q.125-.3.388-.45t.537-.15q.275 0 .537.15t.388.45l1.875 4.45l4.85.425q.35.05.55.225t.3.45q.1.275.038.563t-.313.512l-3.675 3.175l1.1 4.725q.075.325-.05.588t-.35.437q-.225.175-.525.2t-.575-.15l-4.15-2.5Z" />
                                        </svg>
                                        <div class="text-sm">
                                            @if ($Produk->Rating == 0)
                                                N/A
                                            @else
                                                {{ $Produk->Rating }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="rounded-xl shadow-3xl max-lg:mt-10">
                <div class="bg-[#850000] rounded-t-xl px-7 py-2">
                    <h1 class="text-2xl text-white">
                        Chat
                    </h1>
                </div>
                <div class="mx-7 py-5 items-center justify-between">
                    @php
                        $countId = 0;
                    @endphp
                    @foreach ($lastChatRaw as $chatIds)
                        <a href="/konsumen/chat/{{ $chatIds->IdUser }}"
                            class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                            <div class="flex-shrink-0">
                                <img class="w-16 h-16 rounded-full"
                                    src="{{ asset('storage/' . $chatIds->FotoProfil) }}" />
                            </div>
                            <div class="ml-2">
                                <h1 class="text-lg font-semibold text-left">{{ $chatIds->Nama }}</h1>
                                <p class="text-sm text-left text-gray-500">
                                    {{ \Illuminate\Support\Str::limit($chatIds->text, 30, '...') }}</p>
                            </div>
                            <div class="ml-auto notif">
                                @if ($unread[$countId]->Count > 0)
                                    <span
                                        class="flex justify-center w-6 h-6 text-white bg-red-500 rounded-full">{{ $unread[$countId]->Count }}</span>
                                @endif
                            </div>
                        </a>
                        <div class="my-3 border border-gray-300 border-solid line"></div>
                        @php
                            $countId++;
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
