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
                        <img class="w-24 h-24 rounded-[10px] object-cover" src="{{ asset('storage/' . $item->FotoProduk) }}"
                            alt="">
                        <div class="flex flex-col w-max text-[#850000] justify-center">
                            <p class="font-bold">{{ $item->Nama }} ({{ $item->Qty }})</p>
                            <p>Keranjang: {{ $item->NamaAcara }}</p>
                            {{-- <p class="text-sm">
                                Keterangan:
                                @if ($item->Status == 4)
                                    Pesanan Sedang Dalam Perjalanan
                                @elseif($item->Status == 5)
                                    Pesanan Sampai, Menunggu Konfirmasi Anda
                                @endif

                            </p> --}}
                        </div>
                    </div>
                    {{-- Right hug content --}}
                    <div class="flex flex-col w-max items-end gap-2">
                        <div class="flex flex-row w-max font-bold gap-2 max-lg:self-center">
                            @if ($item->Status == 5)
                                <form action="/konsumen/diterima/{{ $item->Id }}" method="get">
                                    {{-- onsubmit="return confirm('{{$item->Nama}} sejumlah {{$item->Qty}} sudah sampai?')" --}}
                                    @csrf
                                    <input type="hidden" class="ItemNama" value="{{ $item->Nama }}">
                                    <input type="hidden" class="ItemQty" value="{{ $item->Qty }}">
                                    <button type="button"
                                        class="text-[#DC0000] btnTerimaPesanan border border-2 border-[#DC0000] px-2 py-1 text-sm rounded-md">
                                        DITERIMA
                                    </button>
                                </form>
                            @endif
                            <a href="/konsumen/chat/{{ $item->IdUser }}"
                                class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-2 py-1 text-sm rounded-md">
                                CHAT
                            </a>
                        </div>
                        <p class="text-sm text-[#DC0000]">
                            Keterangan:
                            @if ($item->Status == 4)
                                Pesanan Sedang Dalam Perjalanan
                            @elseif($item->Status == 5)
                                Pesanan Sampai, Menunggu Konfirmasi Anda
                            @endif

                        </p>
                    </div>
                </div>
                <div class="w-full h-[2px] bg-[#850000]"></div>
            @endforeach
        </div>
    </div>
@endforeach
