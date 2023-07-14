<div class="grid items-center gap-5 mt-12 konten xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 ">
    <a id="addProduct" href="/umkm/tambahProduk"
        class="tambahProduk bg-[#EBEBEB] rounded-md shadow-3xl flex flex-row items-center justify-center gap-5 md:gap-0 md:flex-col py-12 w-[85vw] md:w-[290px] lg:w-[260px] md:py-40 lg:py-40 xl:py-40 2xl:py-36">
        <svg id="addButton" version="1.1" id="Capa_1" class="w-20 h-20" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" xml:space="preserve" fill="#000000">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <circle style="fill:#850000;" cx="25" cy="25" r="25"></circle>
                <line
                    style="fill:none;stroke:#FFFFFF;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;"
                    x1="25" y1="13" x2="25" y2="38"></line>
                <line
                    style="fill:none;stroke:#FFFFFF;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;"
                    x1="37.5" y1="25" x2="12.5" y2="25"></line>
            </g>
        </svg>
        <h1 class="font-bold my-5 text-[#850000] text-2xl">Tambah Produk</h1>
    </a>

    @foreach ($produks as $produk)
        <div class="flex rounded-md shadow-3xl produksatu md:flex-col">
            <img src="{{ asset('storage/' . $produk->FotoProduk) }}" alt=""
                class="object-cover w-1/2 h-64 rounded-md md:w-full">
            <div class="flex flex-col justify-center p-5">
                <h1 class="my-1 text-xl font-bold 2xl:text-xl lg:text-xl md:text-2xl sm:text-2xl">
                    {{ $produk->Nama }}</h1>
                <p class="mt-3 font-normal text-md 2xl:text-sm lg:text-base md:text-base">

                    {{ strlen($produk->Deskripsi) > 25 ? substr($produk->Deskripsi, 0, 25) . '...' : $produk->Deskripsi }}
                </p>
                <div class="flex justify-between mt-4">
                    <h1 class="text-[#850000] text-md 2xl:text-base lg:text-base sm:text-xl">
                        <p>@currency($produk->Harga)</p>
                    </h1>
                    <div class="flex flex-row gap-[0.5vw]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#8F8F8F"
                                d="m12 18.275l-4.15 2.5q-.275.175-.575.15t-.525-.2q-.225-.175-.35-.438t-.05-.587l1.1-4.725L3.775 11.8q-.25-.225-.312-.513t.037-.562q.1-.275.3-.45t.55-.225l4.85-.425l1.875-4.45q.125-.3.388-.45t.537-.15q.275 0 .537.15t.388.45l1.875 4.45l4.85.425q.35.05.55.225t.3.45q.1.275.038.563t-.313.512l-3.675 3.175l1.1 4.725q.075.325-.05.588t-.35.437q-.225.175-.525.2t-.575-.15l-4.15-2.5Z" />
                        </svg>
                        <p>
                            @if ($produk->Rating == 0)
                                N/A
                            @else
                                {{ $produk->Rating }}
                            @endif
                        </p>
                    </div>
                </div>
                <a href="/umkm/editProduk/{{ $produk->IdProduk }}">
                    <div
                        class="bg-[#850000] text-white py-2 px-10 text-center rounded-md mt-4 2xl:text-sm lg:text-base md:text-base sm:text-xl">
                        Edit
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
<div class="mt-[50px]">
    {{ $produks->links() }}
</div>
