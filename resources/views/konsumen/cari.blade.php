@extends('konsumen.layouts.master')
@section('title', 'Cari Produk')
@section('description', 'Cari Produk Katering di Kota Anda')
@section('content')
    <div class="container-md mx-auto flex flex-col items-center mt-[82px] w-full">
        {{-- Search and Sort --}}
        <div class="flex flex-row justify-center items-center gap-[5vw] w-full p-[2vw]">
            {{-- Search Bar --}}
            <div class="flex w-[50%]">
                <div class="relative w-full">
                    <form action="/cari">
                        {{-- @csrf --}}
                        <input value="{{ request('search') }}" name="search" type="search" id="location-search"
                            class="block p-[1vw] w-full z-20 text-sm text-black bg-white focus:ring-[#DC0000] rounded-[10px] border border-2 border-[#DC0000] focus:border-[#DC0000]"
                            placeholder="Cari nama produk atau lokasi" required>
                        <button type="submit"
                            class="absolute top-0 right-0 p-[1vw] text-sm font-medium text-white bg-[#DC0000] rounded-r-lg border border-2 border-[#DC0000] hover:bg-[#850000] focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Sort Dropdowns --}}
            <div class="flex flex-row gap-[1vw] w-max items-center justify-center">
                <p class="font-bold text-black ">Filter:</p>
                <select id="TipeHarga" onchange="filterData()"
                    class="w-[10vw] bg-[#FFDB89] border border-[#FFDB89] text-[#850000] font-bold text-sm rounded-[10px] border-2 focus:ring-[#DC0000] focus:border-[#DC0000] block w-full p-[1vw]">
                    <option selected value="ASC">URUTKAN HARGA</option>
                    <option value="ASC">Rendah ke Tinggi</option>
                    <option value="DESC">Tinggi ke Rendah</option>
                </select>
                {{-- <select id="countries"
                    class="w-[10vw] bg-[#FFDB89] border border-[#FFDB89] text-[#850000] font-bold text-sm rounded-[10px] border-2 focus:ring-[#DC0000] focus:border-[#DC0000] block w-full p-[1vw]">
                    <option selected>OPSI PENGIRIMAN</option>
                    <option value="US">Bisa Keduanya</option>
                    <option value="CA">Bisa Delivery</option>
                    <option value="CA">Bisa Pickup</option>
                </select> --}}
            </div>
        </div>
        {{-- Product List --}}
        @if (!request('search') && Auth::check())
            <div class="my-4 text-2xl">
                Katering terdekat di
                <input type="text" value="{{ Auth::User()->Regency->name }}" disabled>
            </div>
        @endif
        <div id="produk">
            @include('konsumen.data-cari', ['produks' => $produks])
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function filterData() {
            var selectedTipeHarga = document.getElementById("TipeHarga").value;

            $.ajax({
                type: "GET",
                url: '/konsumen/filter-produk',
                data: {
                    TipeHarga: selectedTipeHarga
                },
                success: function(data) {
                    $('#produk').html(data);
                }
            })
        }
    </script>
@endsection
