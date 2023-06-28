<div class="mt-6 grid md:max-xl:grid-cols-3 sm:grid-cols-2 xl:grid-cols-4 grid-cols-1 gap-16">
    @foreach ($listProduks as $produk)

        <div class="rounded-md shadow-3xl produksatu flex md:flex-col">
            <img src="{{ asset('storage/' . $produk->FotoProduk) }}" alt=""
                class="w-1/2 h-full md:w-full md:h-48 object-cover rounded-md">
            <div class="p-4 flex flex-col justify-center">
                <h1 class="font-bold my-1 2xl:text-xl lg:text-xl md:text-2xl sm:text-2xl text-xl">{{ $produk->Nama }}</h1>
                <div class="deskripsi mt-3 h-">
                    <p class="break-all font-normal text-md 2xl:text-sm lg:text-base md:text-base">
                        {{ strlen($produk->Deskripsi) > 25 ? substr($produk->Deskripsi, 0, 25) . '...' : $produk->Deskripsi }}
                    </p>
                </div>
                <div class="flex justify-between mt-4">
                    <h1 class="text-[#850000] text-md 2xl:text-base lg:text-base sm:text-xl">
                        Rp {{ $produk->Harga }}
                    </h1>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="mt-[50px]">
    {{ $listProduks->links() }}
</div>
