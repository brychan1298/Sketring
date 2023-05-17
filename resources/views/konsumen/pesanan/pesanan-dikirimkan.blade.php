@extends('konsumen.layouts.master')
@section('title', 'Pesanan dikirimkan')
@section('description', 'Daftar Pesanan Konsumen Yang Sedang dikirimkan')
@section('content')
    <div class="container-md mx-auto flex flex-col items-center mt-[48px] w-full">
        <div class="flex flex-col justify-center items-center w-max m-[2vw] gap-[1vw]">
            {{-- Status Selection --}}
            @include('konsumen.pesanan.layoutPesanan')
            {{-- Select Event --}}
            <div class="flex flex-row w-[100%] justify-end">
                <select id="IdAcara" onchange="filterData()"
                    class="bg-[#850000] text-white text-sm rounded-[10px] focus:ring-blue-500 focus:border-blue-500 block w-[30%] p-[0.5vw]">
                    <option selected value="0">Semua Keranjang</option>
                    @foreach ($ListAcara as $Acara)
                        <option value="{{ $Acara->IdAcara }}">{{ $Acara->Nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Order List --}}
            <div class="w-full h-[2px] bg-[#850000]"></div>
            <div id="ListTransaksi" class="w-full">
                @include('konsumen.pesanan.datapesanandikirimkan', ['ListTransaksi' => $ListTransaksi])
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
