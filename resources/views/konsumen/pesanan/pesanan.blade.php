@extends('konsumen.layouts.master')
@section('title', 'Pesanan yang belum dibayar')
@section('description', 'Daftar Pesanan Konsumen Yang Belum Dibayar')
@section('content')
    <div class="container-md mx-auto flex flex-col items-center mt-[48px] w-full">

        <div class="flex flex-col justify-center items-center w-max m-[2vw] gap-[1vw]">
            @if (session()->has('batalkan'))
                <div id="alert"
                    class="flex mt-12 bg-danger border border-red-700 text-red-700 px-4 py-3 rounded relative alert alert-success"
                    role="alert">
                    <span>
                        {{ session('batalkan') }}
                    </span>
                    <span class="" onclick="document.getElementById('alert').style.display='none'">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
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
                <select id="countries"
                    class="bg-[#850000] text-white text-sm rounded-[10px] focus:ring-blue-500 focus:border-blue-500 block w-[30%] p-[0.5vw]">
                    <option selected>Semua Keranjang</option>
                    <option value="1">Keranjang 1</option>
                    <option value="2">Keranjang 2</option>
                    <option value="3">Keranjang 3</option>
                    <option value="4">Keranjang 4</option>
                </select>
            </div>

            {{-- Order List --}}
            <div id="ListTransaksi" class="w-full">
                @foreach ($ListTransaksi as $Transaksi => $items)
                    <h1 class="text-xl text-[#850000] mb-5">
                        Transaksi #{{ $Transaksi }}
                    </h1>
                    @foreach ($items as $item)
                        <div href="#"
                            class="flex flex-row justify-between w-[100%] p-[1vw] items-center mb-[-1vw] mt-[-1vw]">
                            {{-- Left hug content --}}
                            <div class="flex flex-row w-max gap-[0.5vw]">
                                <img class="w-[4vw] h-[4vw] rounded-[10px]"
                                    src="{{ asset('storage/' . $item->FotoProduk) }}" alt="">
                                <div class="flex flex-col w-max text-[#850000]">
                                    <p class="font-bold">{{ $item->Nama }} ({{ $item->Qty }})</p>
                                    <p>Keranjang: {{ $item->NamaAcara }}</p>
                                    <p class="text-sm">
                                        Keterangan: Berdasarkan Status
                                    </p>
                                </div>
                            </div>
                            {{-- Right hug content --}}
                            <div class="flex flex-col w-max items-end gap-[0.5vw]">
                                <div class="flex flex-row w-max gap-[1vw] font-bold">
                                    <button type="submit"
                                        class="text-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                                        BUTTON 1
                                    </button>
                                    <button type="submit"
                                        class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                                        BUTTON 2
                                    </button>
                                </div>
                                <p class="text-[#DC0000] text-sm">Keterangan: Berdasarkan Status</p>
                            </div>
                        </div>
                        <div class="w-full h-[2px] bg-[#850000] mt-4"></div>
                    @endforeach
                    <div class="flex flex-col w-max items-end gap-[0.5vw] justify-center my-5">
                        <div class="flex flex-row w-max gap-[1vw] font-bold">
                            <a href="/konsumen/detailTransaksi/{{ $Transaksi }}"
                                class="text-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                                Detail
                            </a>
                            <a href="/konsumen/pembayaran/{{ $Transaksi }}"
                                class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                                Bayar
                            </a>
                        </div>
                        <p class="text-[#DC0000] text-sm">Keterangan: Belum Bayar</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection