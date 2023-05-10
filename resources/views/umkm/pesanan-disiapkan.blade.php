@extends('umkm.layouts.master')
@section('title', 'Pesanan Anda')
@section('description', 'Pesanan dari para konsumen')
@section('content')
    <div class="container-md mx-auto flex flex-col items-center mt-[48px] w-full">

        <div class="flex flex-col justify-center items-center w-max m-[2vw] gap-[1vw]">
            {{-- Status Selection --}}
            <div
                class="container flex flex-row gap-[2vw] items-center justify-center p-6 mx-auto text-white capitalize bg-[#850000] w-max rounded-[10px]">
                <a href="/umkm/pesanan" class="text-white border-b-2 border-white font-bold mx-1.5 sm:mx-6">Masuk</a>

                <a href="#"
                    class="border-b-2 border-transparent hover:text-white hover:border-white mx-1.5 sm:mx-6">Disiapkan</a>

                <a href="#"
                    class="border-b-2 border-transparent hover:text-white hover:border-white mx-1.5 sm:mx-6">Dikirimkan</a>

                <a href="#"
                    class="border-b-2 border-transparent hover:text-white hover:border-white mx-1.5 sm:mx-6">Selesai</a>

                <a href="#"
                    class="border-b-2 border-transparent hover:text-white hover:border-white mx-1.5 sm:mx-6">Dibatalkan</a>
            </div>

            {{-- Order List --}}
            <div class="w-full h-[2px] bg-[#850000]"></div>
            @foreach ($Transaction as $Transaksi)
                <div href="#" class="flex flex-row justify-between w-[100%] p-[1vw] items-center mb-[-1vw] mt-[-1vw]">
                    {{-- Left hug content --}}
                    <div class="flex flex-row w-max gap-[0.5vw]">
                        <img class="w-[4vw] h-[4vw] rounded-[10px]" src="{{ asset('storage/' . $Transaksi->FotoProduk) }}"
                            alt="">
                        <div class="flex flex-col w-max text-[#850000]">
                            <p class="font-bold">{{ $Transaksi->Nama }} ({{ $Transaksi->Qty }})</p>
                            <p>Keranjang: {{ $Transaksi->NamaAcara }}</p>
                            <p>Keterangan: Menunggu Konfirmasi Anda</p>
                        </div>
                    </div>
                    {{-- Right hug content --}}
                    <div class="flex flex-col w-max items-end gap-[0.5vw]">
                        <div class="flex flex-row w-max gap-[1vw] font-bold">
                            <button type="submit"
                                class="text-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                                DETAIL
                            </button>
                            <button type="submit"
                                class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                                TERIMA
                            </button>
                        </div>
                        <p class="text-[#DC0000] text-sm">
                            Pesanan Untuk Tanggal:
                            {{ \Carbon\Carbon::parse($Transaksi->TanggalPesanan)->locale('id')->isoFormat('D MMMM YYYY') }}
                        </p>
                    </div>
                </div>
                <div class="w-full h-[2px] bg-[#850000]"></div>
            @endforeach
        </div>
    </div>
@endsection
