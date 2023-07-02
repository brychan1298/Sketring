<style>
    card-image {
        transition: all 1s ease-in-out;
    }

    .card-produk {
        position: relative;
        overflow: hidden;
    }

    .card-image{
        transition: ease-in-out 0.3s;
    }

    .card-produk:hover .card-image{
        transform: scale(1.2)
    }

    @media(max-width: 767px) {
            /* .tambahProduk {
                width: 85vw;
            } */

            .konten {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .produksatu {
                width: 85vw;
            }
        }
</style>

<div class="grid grid-cols-4 gap-10 mt-12 w-fit konten max-lg:grid-cols-3 max-md:grid-cols-2 max-sm:grid-cols-1 max-2xl:gap-20 max-xl:gap-8">
    @foreach ($produks as $produk)
        <a href="/konsumen/detailproduk/{{ $produk->IdProduk }}">
            <div class="flex rounded-md w-72 max-2xl:w-64 max-xl:w-48 shadow-3xl produksatu md:flex-col card-produk">
                {{-- Product Image --}}
                <div class="overflow-hidden rounded-[10px] max-md:w-5/6">
                    <img src="{{ asset('storage/' . $produk->FotoProduk) }}"
                    class="object-cover w-full h-64 rounded-md max-xl:h-52 card-image" alt="">
                </div>
                {{-- Product Information --}}
                <div class="flex flex-col w-full gap-[0.5vw] p-5 max-md:pl-5 max-md:pt-10">
                    <p class="pb-2 text-2xl font-bold max-md:pb-4 max-xl:text-xl max-lg:text-lg">{{ $produk->Nama }}</p>
                    <div class="flex flex-row w-[100%] gap-[0.5vw]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#8F8F8F"
                                d="M21.999 8a.997.997 0 0 0-.143-.515L19.147 2.97A2.01 2.01 0 0 0 17.433 2H6.565c-.698 0-1.355.372-1.714.971L2.142 7.485A.997.997 0 0 0 1.999 8c0 1.005.386 1.914 1 2.618V20a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-5h4v5a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-9.382c.614-.704 1-1.613 1-2.618zm-2.016.251A2.002 2.002 0 0 1 17.999 10c-1.103 0-2-.897-2-2c0-.068-.025-.128-.039-.192l.02-.004L15.219 4h2.214l2.55 4.251zm-9.977-.186L10.818 4h2.361l.813 4.065C13.957 9.138 13.079 10 11.999 10s-1.958-.862-1.993-1.935zM6.565 4h2.214l-.76 3.804l.02.004c-.015.064-.04.124-.04.192c0 1.103-.897 2-2 2a2.002 2.002 0 0 1-1.984-1.749L6.565 4zm3.434 12h-4v-3h4v3z" />
                        </svg>
                        <p>{{ $produk->User->Nama }}</p>
                    </div>
                    <div class="flex flex-row w-full gap-[0.5vw]">
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
                    <div class="flex flex-row w-[100%] gap-[0.5vw]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#8F8F8F"
                                d="M5.5 7A1.5 1.5 0 0 1 4 5.5A1.5 1.5 0 0 1 5.5 4A1.5 1.5 0 0 1 7 5.5A1.5 1.5 0 0 1 5.5 7m15.91 4.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.11 0-2 .89-2 2v7c0 .55.22 1.05.59 1.41l8.99 9c.37.36.87.59 1.42.59c.55 0 1.05-.23 1.41-.59l7-7c.37-.36.59-.86.59-1.41c0-.56-.23-1.06-.59-1.42Z" />
                        </svg>
                        <p>@currency($produk->Harga)</p>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
    <div>

    </div>

</div>
<div class="mt-[50px]">
    {{ $produks->links() }}
</div>


