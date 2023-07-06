@extends('konsumen.layouts.master')
@section('title', 'Pesanan yang belum dibayar')
@section('description', 'Daftar Pesanan Konsumen Yang Belum Dibayar')
@section('content')
    <div class="container flex flex-col items-center w-full mx-auto px-36 max-lg:px-12">

        <div class="flex flex-col items-center justify-center w-full gap-2">
            @if (session()->has('batalkan'))
                <div id="alert"
                    class="relative flex px-4 py-3 mt-36 -mb-32 text-red-700 border border-red-700 rounded bg-danger alert alert-success"
                    role="alert">
                    <span>
                        {{ session('batalkan') }}
                    </span>
                    <span class="" onclick="document.getElementById('alert').style.display='none'">
                        <svg class="w-6 h-6 text-red-500 fill-current" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif

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
            {{-- <hr class="my-2"> --}}

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
                @include('konsumen.pesanan.datapesanan', ['ListTransaksi' => $ListTransaksi])
            </div>
        </div>
    </div>
    <script>
        function filterData() {
            var selectedIdAcara = document.getElementById("IdAcara").value;

            $.ajax({
                type: "GET",
                url: '/konsumen/filter-pesanan-belum-bayar',
                data: {
                    IdAcara: selectedIdAcara
                },
                success: function(data) {
                    $('#ListTransaksi').html(data);
                }
            })
        }
    </script>
@endsection
