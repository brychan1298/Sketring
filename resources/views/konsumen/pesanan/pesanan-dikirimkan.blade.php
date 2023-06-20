@extends('konsumen.layouts.master')
@section('title', 'Pesanan dikirimkan')
@section('description', 'Daftar Pesanan Konsumen Yang Sedang dikirimkan')
@section('content')
    <div class="container-md mx-auto flex flex-col items-center mt-[48px] w-full">
        <div class="flex flex-col justify-center items-center w-max m-[2vw] gap-[1vw]">
            @if (session()->has('selesai'))
                <div id="alert"
                    class="flex mt-12 bg-success border border-green-700 text-green-700 px-4 py-3 rounded relative alert alert-success"
                    role="alert">
                    <span>
                        {{ session('selesai') }}
                    </span>
                    <span class="" onclick="document.getElementById('alert').style.display='none'">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
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
                url: '/konsumen/filter-pesanan-dikirimkan',
                data: {
                    IdAcara: selectedIdAcara
                },
                success: function(data) {
                    $('#ListTransaksi').html(data);
                }
            })
        }

        $('.btnTerimaPesanan').click(function(event) {
            var form = $(this).closest("form");
            var ItemNama = $(this).closest("form").find(".ItemNama").val();
            var ItemQty = $(this).closest("form").find(".ItemQty").val();
            event.preventDefault();
            Swal.fire({
                    // title: `Pesanan untuk Transaksi #` + IdTransaksi + ` sudah sampai?`,
                    text: ItemNama + " sejumlah " + ItemQty + " sudah sampai?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                    dangerMode: true,
                    buttons: true
                })
                .then((result) => {
                    if (result.value) {
                        form.submit();
                    } else {
                        result.dismiss === Swal.DismissReason.cancel
                    }
                });
            return false;
        });
    </script>
@endsection
