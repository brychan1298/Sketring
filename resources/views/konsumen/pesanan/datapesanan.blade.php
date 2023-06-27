@foreach ($ListTransaksi as $Transaksi => $items)
<div class="bg-white shadow-xl flex flex-col mb-8 p-8 rounded-[10px]">
    <h1 class="text-xl text-[#850000] font-bold">
        Transaksi #{{ $Transaksi }}
    </h1>
    @foreach ($items as $item)
        <div href="#" class="flex flex-row justify-between w-[100%] py-4 items-center">
            {{-- Left hug content --}}
            <div class="flex flex-row w-max gap-[0.5vw]">
                <img class="w-[5vw] h-[5vw] rounded-[10px] object-cover" src="{{ asset('storage/' . $item->FotoProduk) }}"
                    alt="">
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
            <div class="flex flex-col w-max items-end gap-[0.5vw]">
                <div class="flex flex-row w-max gap-[1vw] font-bold">
                    <a href="/konsumen/chat/{{ $item->IdToko }}"
                        class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-4 py-[0.5vw] text-sm rounded-md hover:bg-[#850000] hover:border-[#850000]">
                        CHAT PENJUAL
                    </a>
                </div>
                {{-- <p class="text-[#DC0000] text-sm">Keterangan: Berdasarkan Status</p> --}}
            </div>
        </div>
        <div class="w-full h-[2px] bg-[#850000]"></div>
    @endforeach
    <div class="flex flex-col w-max items-start gap-[0.5vw] justify-center mt-5">
        <div class="flex flex-row w-max gap-[1vw] font-bold">
            <a href="/konsumen/detailTransaksi/{{ $Transaksi }}"
                class="text-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md hover:bg-[#850000] hover:text-white">
                Detail
            </a>
            <a href="/konsumen/pembayaran/{{ $Transaksi }}"
                class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md hover:bg-[#850000] hover:border-[#850000] ">
                Bayar
            </a>
        </div>
        <p class="text-[#DC0000] text-sm">Pesanan untuk tanggal: {{$item->TanggalPesanan}}</p>
    </div>
</div>
@endforeach
