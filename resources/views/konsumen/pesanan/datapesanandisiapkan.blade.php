@foreach ($ListTransaksi as $Transaksi => $items)
    <div class="bg-white shadow-xl flex flex-col mb-8 p-8 rounded-[10px]">
        <h1 class="text-xl text-[#850000] font-bold">
            Transaksi #{{ $Transaksi }}
        </h1>
        <div class="">
            @foreach ($items as $item)
                <div class="flex flex-row justify-between w-[100%] py-4 items-center max-lg:flex-col max-lg:gap-4">
                    {{-- Left hug content --}}
                    <div class="flex flex-row w-max gap-2">
                        <img class="w-24 h-24 rounded-[10px] object-cover"
                            src="{{ asset('storage/' . $item->FotoProduk) }}" alt="">
                        <div class="flex flex-col w-max text-[#850000] justify-center">
                            <p class="font-bold">{{ $item->Nama }} ({{ $item->Qty }})</p>
                            <p>Keranjang: {{ $item->NamaAcara }}</p>
                            {{-- <p class="text-sm">
                            Keterangan:
                            @if ($item->Status == 2)
                                Menunggu Konfirmasi Penjual
                            @elseif($item->Status == 3)
                                Penjual Sedang Menyiapkan Pesanan Anda
                            @endif
                        </p> --}}
                        </div>
                    </div>
                    {{-- Right hug content --}}
                    <div class="flex flex-col w-max items-end gap-2">
                        <div class="flex flex-row w-max font-bold gap-2 max-lg:self-center">
                            {{-- <button type="submit"
                                class="text-[#DC0000] border border-2 border-[#DC0000] px-2 py-1 text-sm rounded-md">
                                DETAIL
                            </button> --}}
                            <a href="/konsumen/chat/{{ $item->IdUser }}"
                                class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-2 py-1 text-sm rounded-md">
                                CHAT
                            </a>
                        </div>
                        <p class="text-sm text-[#DC0000]">
                            Keterangan:
                            @if ($item->Status == 2)
                                Menunggu Konfirmasi Penjual
                            @elseif($item->Status == 3)
                                Penjual Sedang Menyiapkan Pesanan Anda
                            @endif
                        </p>
                    </div>
                </div>
                <div class="w-full h-[2px] bg-[#850000]"></div>
            @endforeach
            <div
                class="flex flex-col w-max items-start max-sm:items-center max-sm:self-center gap-[0.5vw] justify-center mt-5">
                <div class="flex flex-row w-max gap-[1vw] font-bold">
                    <a href="/konsumen/detailTransaksiDisiapkan/{{ $Transaksi }}"
                        class="text-[#DC0000] border border-2 border-[#DC0000] px-4 py-2 text-sm rounded-md hover:bg-[#850000] hover:text-white">
                        Detail
                    </a>
                </div>
                <p class="text-[#DC0000] text-sm">Pesanan untuk tanggal: {{ $item->TanggalPesanan }}</p>
            </div>
        </div>
    </div>

    {{-- <div class="flex flex-col w-max items-end gap-[0.5vw] justify-center my-5">
        <div class="flex flex-row w-max gap-[1vw] font-bold">
            <a href="/konsumen/detailTransaksi/{{ $Transaksi }}"
                class="text-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                Detail
            </a>
            <a href=""
                class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                Bayar
            </a>
        </div>
        <p class="text-[#DC0000] text-sm">Keterangan: Belum Bayar</p>
    </div> --}}
@endforeach
