@foreach ($ListTransaksi as $Transaksi => $items)
    <h1 class="text-xl text-[#850000]">
        Transaksi #{{ $Transaksi }}
    </h1>
    <div class="mb-10">
        @foreach ($items as $item)
            <div href="#" class="flex flex-row justify-between w-[100%] p-[1vw] items-center">
                {{-- Left hug content --}}
                <div class="flex flex-row w-max gap-[0.5vw]">
                    <img class="w-[5vw] h-[5vw] rounded-[10px]" src="{{ asset('storage/' . $item->FotoProduk) }}"
                        alt="">
                    <div class="flex flex-col w-max text-[#850000] ">
                        <p class="font-bold">{{ $item->Nama }} ({{ $item->Qty }})</p>
                        <p>Keranjang: {{ $item->NamaAcara }}</p>
                        <p class="text-sm">
                            Keterangan:
                            @if ($item->Status == 4)
                                Pesanan Sedang Dalam Perjalanan
                            @elseif($item->Status == 5)
                                Pesanan Sampai, Menunggu Konfirmasi Anda
                            @endif

                        </p>
                    </div>
                </div>
                {{-- Right hug content --}}
                <div class="flex flex-col w-max items-end gap-[0.5vw]">
                    <div class="flex flex-row w-max gap-[1vw] font-bold">
                        @if ($item->Status == 5)
                            <form action="/konsumen/diterima/{{ $item->Id }}" method="get">
                                {{-- onsubmit="return confirm('{{$item->Nama}} sejumlah {{$item->Qty}} sudah sampai?')" --}}
                                @csrf
                                <input type="hidden" class="ItemNama" value="{{ $item->Nama }}">
                                <input type="hidden" class="ItemQty" value="{{ $item->Qty }}">
                                <button type="button"
                                    class="btnTerimaPesanan text-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                                    DITERIMA
                                </button>
                            </form>
                        @endif
                        <a href="/konsumen/chat/{{ $item->IdToko }}"
                            class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                            CHAT
                        </a>
                    </div>
                    <p class="text-[#DC0000] text-sm">Keterangan: Berdasarkan Status</p>
                </div>
            </div>
            <div class="w-full h-[2px] bg-[#850000]"></div>
        @endforeach
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
