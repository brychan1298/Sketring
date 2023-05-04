@extends('konsumen.layouts.master')
@section('title', 'Pesanan Anda')
@section('description', 'Daftar Pesanan Konsumen')
@section('content')
    <div class="container-md mx-auto flex flex-col items-center mt-[48px] w-full">
        <div class="flex flex-col justify-center items-center w-max m-[2vw] gap-[1vw]">
            {{-- Status Selection --}}
            <div
                class="container flex flex-row gap-[2vw] items-center justify-center p-6 mx-auto text-white capitalize bg-[#850000] w-max rounded-[10px]">
                <a href="#" class="text-white border-b-2 border-white font-bold mx-1.5 sm:mx-6">Belum Bayar</a>

                <a href="#"
                    class="border-b-2 border-transparent hover:text-white hover:border-white mx-1.5 sm:mx-6">Disiapkan</a>

                <a href="#"
                    class="border-b-2 border-transparent hover:text-white hover:border-white mx-1.5 sm:mx-6">Dikirimkan</a>

                <a href="#"
                    class="border-b-2 border-transparent hover:text-white hover:border-white mx-1.5 sm:mx-6">Selesai</a>

                <a href="#"
                    class="border-b-2 border-transparent hover:text-white hover:border-white mx-1.5 sm:mx-6">Dibatalkan</a>
            </div>

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
            <div class="w-full h-[2px] bg-[#850000]"></div>
            @foreach ($ListTransaksi as $Transaksi => $items)
                @foreach ($items as $item)
                    <div href="#"
                        class="flex flex-row justify-between w-[100%] p-[1vw] items-center mb-[-1vw] mt-[-1vw]">
                        {{-- Left hug content --}}
                        <div class="flex flex-row w-max gap-[0.5vw]">
                            <img class="w-[4vw] h-[4vw] rounded-[10px]" src="{{ asset('storage/' . $item->FotoProduk) }}"
                                alt="">
                            <div class="flex flex-col w-max text-[#850000]">
                                <p class="font-bold">{{ $item->Nama }} ({{ $item->Qty }})</p>
                                <p>Keranjang: {{ $item->NamaAcara }}</p>
                                <p>Keterangan: Berdasarkan Status</p>
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
                    <div class="w-full h-[2px] bg-[#850000]"></div>
                @endforeach
                <div class="flex flex-col w-max items-end gap-[0.5vw] justify-center">
                    <div class="flex flex-row w-max gap-[1vw] font-bold">
                        <a href="/konsumen/detailTransaksi/{{$Transaksi}}" class="text-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                            Detail
                        </a>
                        <a href="" class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                            Bayar
                        </a>
                    </div>
                    <p class="text-[#DC0000] text-sm">Keterangan: Belum Bayar</p>
                </div>
            @endforeach

            @for ($i = 0; $i < 7; $i++)
            @endfor
        </div>
    </div>
@endsection
