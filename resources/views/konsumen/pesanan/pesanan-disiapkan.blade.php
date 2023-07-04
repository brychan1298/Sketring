@extends('konsumen.layouts.master')
@section('title', 'Pesanan yang sedang disiapkan')
@section('description', 'Daftar Pesanan Konsumen Yang Sedang Disiapkan')
@section('content')
    <div class="container flex flex-col items-center w-full mx-auto px-36 max-lg:px-12">
        <div class="flex flex-col items-center justify-center w-full gap-2">
            <div class="container flex flex-col justify-between w-full mx-auto mb-8 mt-36 max-sm:mt-12">
                <div class="inline-flex max-sm:pt-16">
                    {{-- <a href="/profileKonsumen">
                        <svg class="max-md:w-6 max-md:h-6" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z" fill="#850000"/>
                        </svg>
                    </a> --}}
                    <p class="mx-auto text-2xl font-bold text-center">Pesanan Anda</p>
                </div>
            </div>
            {{-- Status Selection --}}
            @include('konsumen.pesanan.layoutPesanan')
            {{-- Select Event --}}
            <div class="flex flex-row w-[100%] justify-end">
                <select id="IdAcara" onchange="filterData()"
                    class="bg-[#850000] text-white text-sm rounded-[10px] focus:ring-blue-500 focus:border-blue-500 block w-48 p-2">
                    <option selected value="0">Semua Keranjang</option>
                    @foreach ($ListAcara as $Acara)
                        <option value="{{ $Acara->IdAcara }}">{{ $Acara->Nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Order List --}}
            <div id="ListTransaksi" class="w-full">
                @include('konsumen.pesanan.datapesanandisiapkan', ['ListTransaksi' => $ListTransaksi])
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function filterData() {
            var selectedIdAcara = document.getElementById("IdAcara").value;

            $.ajax({
                type: "GET",
                url: '/konsumen/filter-pesanan',
                data: {
                    IdAcara : selectedIdAcara
                },
                success: function(data) {
                    $('#ListTransaksi').html(data);
                }
            })
        }
    </script>
@endsection
