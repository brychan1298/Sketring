@extends('konsumen.layouts.master')
@section('title', 'Toko')
@section('description', 'Halaman Toko')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function filterData() {
        var selectedTipeHarga = document.getElementById("TipeHarga").value;

        $.ajax({
            type: "GET",
            url: '/konsumen/toko/filter-produk',
            data: {
                TipeHarga: selectedTipeHarga
            },
            success: function(data) {
                $('#produk').html(data);
            }
        })
    }
</script>

<style>
</style>

<div class="container px-[8vw] mx-auto mt-[120px] md:mt-[195px]">
    <div class="flex flex justify-between gap-48  items-center">
        <div class="flex flex-col gap-5">
            <div class="">
                <div class="flex flex-col justify-center gap-2">
                    <h1 class="namaToko text-4xl font-bold">
                        {{ strlen($detailToko->Nama) > 15 ? substr($detailToko->Nama, 0, 15) . '...' : $detailToko->Nama }}
                    </h1>

                    <div class="flex gap-2 items-center">
                        <div class="statusBuka gap-2 text-lg w-fit h-fit text-green-900 bg-[#C8F8C8] font-bold px-3 py-px rounded-full flex items-center">
                            <div class="w-[12px] h-[12px] bg-[#00880D] rounded-full"></div>
                            Buka
                        </div>
                        <div class="">
                            <p class="my-px text-lg break-normal">
                                {{$detailToko->Alamat}}, {{$detailToko->Regency->name}}, {{$detailToko->Regency->Province->name}}

                            </p>
                        </div>
                    </div>

                    <div class="">
                        <p class="my-px text-lg">
                            {{$detailToko->Nohp}}
                        </p>
                        <p class="my-px text-lg">
                            {{$detailToko->Email}}
                        </p>
                    </div>
                </div>
            </div>
            <a href="/konsumen/chat/{{$detailToko->IdUser}}"
                class="flex gap-1 text-decoration-none mt-2.5 w-fit border-2 hover:bg-[#850000] hover:text-white text-[#850000] rounded-xl border-[#850000] py-1.5 px-3 bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                </svg>
                Chat
            </a>
        </div>
        <div class="h-56 w-56 flex-shrink-0">
            <img class="block w-full h-full object-cover rounded-lg" src="{{ asset('storage/' . $detailToko->FotoProfil) }}" alt="" >
        </div>
    </div>

    <div class="relative flex py-5 items-center mt-12">
        <div class="flex-grow border-t-2 border-[#850000]"></div>
        <span class="flex-shrink mx-4 font-bold text-xl text-[#850000]">Produk</span>
        <div class="flex-grow border-t-2 border-[#850000]"></div>
    </div>

    {{-- <div class="flex justify-end">
        <div class="flex flex-row gap-[1vw] w-max items-center justify-center">
            <p class="font-bold text-[#850000] text-xl">Urutkan</p>
            <select id="TipeHarga" onchange="filterData()"
                class="filterProduk w-[10vw] bg-[#FFF6C3] border border-[#FFDB89] text-[#850000] font-bold text-lg rounded-[10px] border-2 focus:ring-[#DC0000] focus:border-[#DC0000] block w-full px-3 py-2">
                <option selected value="ASC">Terbaru</option>
                <option value="ASC">Harga Terendah</option>
                <option value="DESC">Harga Tertinggi</option>
            </select>
        </div>
    </div> --}}

    <p class="text-[#850000] font-bold text-2xl py-5"> Semua Produk</p>

    {{-- <div id="produk">
        @include('konsumen.toko-filter', ['produks' => $produks])
    </div> --}}

    <div class="mt-6 mb-24 grid md:max-xl:grid-cols-3 sm:grid-cols-2 xl:grid-cols-4 grid-cols-1 gap-16">
        @foreach ($listProduks as $produk)

            <a href="/konsumen/detailproduk/{{ $produk->IdProduk }}">
                <div class="rounded-md shadow-3xl produksatu flex flex-col">
                    <img src="{{ asset('storage/' . $produk->FotoProduk) }}" alt=""
                        class="w-1/2 h-full md:w-full md:h-48 object-cover rounded-md">
                    <div class="p-4 flex flex-col justify-center">
                        <h1 class="font-bold my-1 2xl:text-xl lg:text-xl md:text-2xl sm:text-2xl text-xl">{{ $produk->Nama }}</h1>

                        <p class="my-1 break-all font-normal text-md 2xl:text-sm lg:text-base md:text-base">
                            {{ strlen($produk->Deskripsi) > 25 ? substr($produk->Deskripsi, 0, 25) . '...' : $produk->Deskripsi }}
                        </p>
                        <h1 class="mt-3 text-[#850000] text-md 2xl:text-base lg:text-base sm:text-xl">
                            Rp {{ $produk->Harga }}
                        </h1>

                        <div class="flex gap-2 my-1 items-center">
                            <img src="/images/export.png" class="w-4 h-4" alt="">
                            <div class="font-light">
                                @if ($produk->JumlahRating == 0)
                                    N/A
                                @else
                                    {{$produk->Rating}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
