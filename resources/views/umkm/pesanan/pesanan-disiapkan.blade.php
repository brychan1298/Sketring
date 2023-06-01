@extends('umkm.layouts.master')
@section('title', 'Pesanan Anda')
@section('description', 'Pesanan dari para konsumen')
@section('content')
    <div class="container-md mx-auto flex flex-col items-center mt-[48px] w-full">
        @if (session()->has('delivered'))
            <div id="alert"
                class="flex mt-12 bg-success border border-green-700 text-green-700 px-4 py-3 rounded relative alert alert-success"
                role="alert">
                <span>
                    {{ session('delivered') }}
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
        <div class="flex flex-col w-max m-[2vw] gap-[1vw]">
            {{-- Status Selection --}}
            @include('umkm.pesanan.layoutPesanan')

            {{-- Order List --}}
            <div class="w-full h-[2px] bg-[#850000]"></div>
            @foreach ($ListTransaksi as $Transaksis => $items)
                <h1 class="text-xl text-[#850000]">
                    Transaksi #{{ $Transaksis }}
                </h1>
                @foreach ($items as $Transaksi)
                    <div href="#"
                        class="flex flex-row justify-between w-[100%] p-[1vw] items-center mb-[-1vw] mt-[-1vw]">
                        {{-- Left hug content --}}
                        <div class="flex flex-row w-max gap-[0.5vw]">
                            <img class="w-[4vw] h-[4vw] rounded-[10px]"
                                src="{{ asset('storage/' . $Transaksi->FotoProduk) }}" alt="">
                            <div class="flex flex-col w-max text-[#850000]">
                                <p class="font-bold">{{ $Transaksi->Nama }} ({{ $Transaksi->Qty }})</p>
                                <p>Keranjang: {{ $Transaksi->NamaAcara }}</p>
                                <p>Keterangan: Silahkan Menyiapkan Pesanan</p>
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
                            <p class="text-[#DC0000] text-sm">
                                Pesanan Untuk Tanggal:
                                {{ \Carbon\Carbon::parse($Transaksi->TanggalPesanan)->locale('id')->isoFormat('D MMMM YYYY') }}
                            </p>
                        </div>
                    </div>
                    <div class="w-full h-[2px] bg-[#850000]"></div>
                @endforeach
                <div class="gap-[0.5vw] mb-5">
                    <div class="flex flex-row w-max gap-[1vw] font-bold float-right">
                        <a href="/umkm/detailTransaksi-2/{{ $Transaksis }}"
                            class="text-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                            DETAIL
                        </a>
                        <form action="/umkm/kirim-pesanan/{{ $Transaksis }}" method="get"
                            onsubmit="return confirm('Anda akan mengirim transaksi #{{ $Transaksis }}?')">
                            @csrf
                            <button type="submit"
                                class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                                KIRIM
                            </button>
                        </form>
                    </div>
                    {{-- <p class="text-[#DC0000] text-sm">Keterangan: Belum Bayar</p> --}}
                </div>
            @endforeach
        </div>
    </div>
@endsection
