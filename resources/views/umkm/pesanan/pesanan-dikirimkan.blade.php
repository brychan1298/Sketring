@extends('umkm.layouts.master')
@section('title', 'Pesanan Anda')
@section('description', 'Pesanan dari para konsumen')
@section('content')
    <div class="container flex flex-col items-center w-full mx-auto px-36 max-lg:px-12">
        @if (session()->has('sampai'))
            <div id="alert"
                class="relative flex px-4 py-3 mt-32 -mb-24 text-blue-700 border border-blue-700 rounded bg-primary alert alert-success"
                role="alert">
                <span>
                    {{ session('sampai') }}
                </span>
                <span class="" onclick="document.getElementById('alert').style.display='none'">
                    <svg class="w-6 h-6 text-blue-500 fill-current" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        @endif
        <div class="flex flex-col items-center justify-center w-full gap-2">
            <div class="container flex flex-col justify-between w-full mx-auto mt-32 mb-8 max-sm:mt-12">
                <div class="inline-flex max-sm:pt-16">
                    {{-- <a href="/umkm/profileToko">
                        <svg class="max-md:w-6 max-md:h-6" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z" fill="#850000"/>
                        </svg>
                    </a> --}}
                    <p class="mx-auto text-2xl font-bold text-center">Pesanan Anda</p>
                </div>
            </div>
            {{-- Status Selection --}}
            @include('umkm.pesanan.layoutPesanan')

            {{-- Order List --}}
            <div class="w-full">
                @foreach ($ListTransaksi as $Transaksis => $items)
                    <div class="bg-white shadow-xl flex flex-col mb-8 p-8 rounded-[10px]">
                        <h1 class="text-xl text-[#850000] font-bold">
                            Transaksi #{{ $Transaksis }}
                        </h1>
                        @foreach ($items as $Transaksi)
                            @if ($loop->first)
                                @php
                                    $IdKonsumen = $Transaksi->IdKonsumen;
                                @endphp
                            @endif
                            <div
                                class="flex flex-row justify-between w-[100%] py-4 items-center max-sm:flex-col max-sm:items-start max-sm:gap-4">
                                {{-- Left hug content --}}
                                <div
                                    class="flex flex-row gap-2 w-max max-sm:text-sm max-sm:flex-col max-sm:items-center max-sm:self-center">
                                    <img class="w-24 h-24 rounded-[10px] object-cover"
                                        src="{{ asset('storage/' . $Transaksi->FotoProduk) }}" alt="">
                                    <div class="flex flex-col w-max text-[#850000] justify-center max-sm:text-center">
                                        <p class="font-bold">{{ $Transaksi->Nama }} ({{ $Transaksi->Qty }})</p>
                                        <p>Keranjang: {{ $Transaksi->NamaAcara }}</p>
                                        <p>
                                            Keterangan :
                                            @if ($Transaksi->Status == 4)
                                                Pesanan dalam perjalanan
                                            @elseif($Transaksi->Status == 5)
                                                Menunggu konfirmasi konsumen
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                {{-- Right hug content --}}
                                <div class="flex flex-col w-max items-end gap-[0.5vw]">
                                    {{-- <div class="flex flex-row w-max gap-[1vw] font-bold">
                                <button type="submit"
                                    class="text-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                                    DETAIL
                                </button>
                                <form action="/umkm/terima-pesanan/{{ $Transaksi->Id }}" method="get">
                                    @csrf
                                    <button type="submit"
                                        class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                                        TERIMA
                                    </button>
                                </form>
                            </div> --}}
                                    {{-- <p class="text-[#DC0000] text-sm">
                                Pesanan Untuk Tanggal:
                                {{ \Carbon\Carbon::parse($Transaksi->TanggalPesanan)->locale('id')->isoFormat('D MMMM YYYY') }}
                            </p> --}}
                                </div>
                            </div>
                            <div class="w-full h-[2px] bg-[#850000]"></div>
                        @endforeach
                        <div
                            class="flex flex-col w-max items-center self-center max-sm:items-center max-sm:self-center gap-[0.5vw] justify-center mt-5">
                            <p class="text-[#DC0000] text-sm max-sm:self-center mb-2">
                                Pesanan Untuk Tanggal:
                                {{ \Carbon\Carbon::parse($Transaksi->TanggalPesanan)->locale('id')->isoFormat('D MMMM YYYY') }}
                            </p>
                            <div class="flex flex-row w-max gap-[1vw] font-bold float-right">
                                <a href="/umkm/detailTransaksi-4/{{ $Transaksis }}"
                                    class="text-[#DC0000] border border-2 border-[#DC0000] px-4 py-2 text-sm rounded-md hover:bg-[#850000] hover:text-white">
                                    DETAIL
                                </a>
                                <form action="/umkm/pesanan-sampai/{{ $Transaksis }}" method="get">
                                    {{-- onsubmit="return confirm('Pesanan untuk transaksi #{{ $Transaksis }} sudah sampai?')" --}}
                                    @csrf
                                    <input type="hidden" class="IdTransaksi" value="{{ $Transaksis }}">
                                    <button type="button"
                                        class="btnPesananSampai text-white bg-[#DC0000] border border-2 border-[#DC0000] px-4 py-2 text-sm rounded-md hover:bg-[#850000] hover:border-[#850000]">
                                        SAMPAI
                                    </button>
                                </form>
                            </div>
                            {{-- <p class="text-[#DC0000] text-sm">Keterangan: Belum Bayar</p> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $('.btnPesananSampai').click(function(event) {
            var form = $(this).closest("form");
            var IdTransaksi = $(this).closest("form").find(".IdTransaksi").val();
            event.preventDefault();
            Swal.fire({
                    title: `Pesanan untuk Transaksi #` + IdTransaksi + ` sudah sampai?`,
                    // text: "If you delete this, it will be gone forever.",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                    confirmButtonColor: "#850000",
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
