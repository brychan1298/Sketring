@foreach ($ListTransaksi as $Transaksi)
    <div href="#" class="flex flex-row justify-between w-[100%] p-[1vw] items-center">
        {{-- Left hug content --}}
        <div class="flex flex-row w-max gap-[0.5vw]">
            <img class="w-[5vw] h-[5vw] rounded-[10px]" src="{{ asset('storage/' . $Transaksi->FotoProduk) }}"
                alt="">
            <div class="flex flex-col w-max text-[#850000]">
                <p class="font-bold">{{ $Transaksi->Nama }} ({{ $Transaksi->Qty }})</p>
                <p>Keranjang: {{ $Transaksi->NamaAcara }}</p>
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
