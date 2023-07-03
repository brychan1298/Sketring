@extends('konsumen.layouts.master')
@section('title', 'Cari Produk')
@section('description', 'Cari Produk Katering di Kota Anda')
@section('content')

    <div class="container px-[8vw] mx-auto flex flex-col items-center mt-40 max-md:mt-[15vh] mb-12 w-full">
        {{-- Search and Sort --}}
        <div class="flex mb-12 items-center justify-center w-full max-xl:flex-col max-xl:gap-8 max-xl:items-start gap-14">
            {{-- Search Bar --}}
            {{-- <div class="flex w-full"> --}}
            <div class="relative w-full">
                <input value="{{ request('search') }}" name="search" type="search" id="search"
                    class="block p-3 w-full z-20 text-sm text-black bg-white rounded-[10px] border-2 border-[#850000] focus:outline-none"
                    placeholder="Cari nama produk" required>
                <button type="submit"
                    class="absolute top-0 right-0 p-3 text-sm font-medium text-white bg-[#850000] rounded-r-lg border-2 border-[#850000] hover:bg-[#850000] focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
            {{-- </div> --}}

            {{-- Sort Dropdowns --}}
            <div class="inline-flex items-center justify-center gap-2 w-fit">
                <p class="font-bold text-black ">Filter:</p>
                <select id="TipeHarga" onchange="filterData()"
                    class="bg-[#FFF6C3] border-[#FFDB89] text-[#850000] font-bold text-sm rounded-[10px] border-2 focus:border-[#850000] block w-fit px-4 py-2 max-md:p-2">
                    <option selected value="ASC">TERBARU</option>
                    <option value="ASC">Harga Terendah</option>
                    <option value="DESC">Harga Tertinggi</option>
                </select>
            </div>
        </div>

        {{-- Product List --}}
        @if (!request('search') && Auth::check())
            <div class="mx-auto text-center my-16 text-2xl max-md:text-xl max-sm:my-10 max-sm:flex max-sm:items-center max-sm:flex-col">
                Katering terdekat di
                <label class="font-bold" for="">{{ Auth::User()->Regency->name }}</label>
            </div>
        @endif

        <div id="produk" class="mb-12">
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

        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "/konsumen/search",
                    type: "GET",
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#produk').html(data);
                    }
                })
            })
        })
    </script>
@endsection
