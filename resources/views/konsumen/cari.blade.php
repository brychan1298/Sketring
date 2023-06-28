@extends('konsumen.layouts.master')
@section('title', 'Cari Produk')
@section('description', 'Cari Produk Katering di Kota Anda')
@section('content')

    <div class="container px-[8vw] mx-auto flex flex-col items-center mt-40 max-md:mt-[11vh] max-sm:mt-[15vh] mb-12 w-full">
        {{-- Search and Sort --}}
        <div class="grid items-center justify-center w-full grid-flow-row-dense grid-cols-4 mb-6 gap-x-28 max-xl:grid-cols-1 max-xl:gap-y-6">
            {{-- Search Bar --}}
            {{-- <div class="flex w-full"> --}}
                <div class="relative w-full col-span-3">
                    <input value="{{ request('search') }}" name="search" type="search" id="search"
                        class="block p-[1vw] w-full z-20 text-sm text-black bg-white rounded-[10px] border-2 border-[#DC0000] focus:outline-none"
                        placeholder="Cari nama produk" required>
                    <button type="submit"
                        class="absolute top-0 right-0 p-[1vw] text-sm font-medium text-white bg-[#DC0000] rounded-r-lg border-2 border-[#DC0000] hover:bg-[#850000] focus:outline-none">
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
                    class="bg-[#FFDB89] border-[#FFDB89] text-[#850000] font-bold text-sm rounded-[10px] border-2 focus:ring-[#DC0000] focus:border-[#DC0000] block w-fit p-4 max-md:p-2">
                    <option selected value="ASC">URUTKAN HARGA</option>
                    <option value="ASC">Rendah ke Tinggi</option>
                    <option value="DESC">Tinggi ke Rendah</option>
                </select>
            </div>
        </div>
        {{-- Product List --}}
        @if (!request('search') && Auth::check())
            <div class="mx-auto my-3 text-2xl">
                Katering terdekat di
                <label for="">{{ Auth::User()->Regency->name }}</label>
            </div>
        @endif
        <div id="produk" class="">
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

        $(document).ready(function(){
                $('#search').on('keyup', function(){
                    var query = $(this).val();
                    $.ajax({
                        url:"/konsumen/search",
                        type:"GET",
                        data:{
                            search:query
                        },
                        success: function(data){
                            $('#produk').html(data);
                        }
                    })
                })
            })
    </script>
@endsection
