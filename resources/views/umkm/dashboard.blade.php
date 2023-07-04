@extends('umkm.layouts.master')
@section('title', 'UMKM Dashboard')
@section('description', 'Halaman Dashboard UMKM')
@section('content')
    <style>
        .pagination {
            color: #850000;
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

        #addButton {
            transition: transform .2s ease-in-out;
        }

        #addProduct:hover>#addButton {
            transform: rotate(90deg) scale(1.2);
        }
    </style>

    <div class="container px-[8vw] mx-auto mt-32">
        <div class="mb-3">
            <div class="relative flex flex-wrap items-stretch w-full mb-4">
                <input type="search"
                    class="bg-[#EBEBEB] relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                    placeholder="Cari produk yang anda inginkan.." aria-label="Search" aria-describedby="button-addon1" />

                <!--Search button-->
                <button
                    class="bg-[#850000] relative z-[2] flex items-center rounded-r px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                    type="button" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#FFFFFF" class="w-5 h-5">
                        <path fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="grid items-center gap-5 mt-12 konten xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 ">
            <a id="addProduct" href="/umkm/tambahProduk"
                class="tambahProduk bg-[#EBEBEB] rounded-md shadow-3xl flex flex-row items-center justify-center gap-5 md:gap-0 md:flex-col py-12 w-[85vw] md:w-[290px] lg:w-[260px] xl:w-[325px] 2xl:w-[290px] md:py-40 lg:py-40 xl:py-40 2xl:py-36">
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
                                Rp {{ $produk->Harga }}
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

        <div class="flex items-center justify-center my-20 pagination">
            <nav aria-label="Page navigation example">
                <ul class="flex list-style-none">
                    <li>
                        <a class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-red-600 transition-all duration-300 hover:bg-red-200 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                            href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li>
                        <a class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-red-600 transition-all duration-300 hover:bg-red-200 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                            href="#">1</a>
                    </li>
                    <li aria-current="page">
                        <a class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-red-600 transition-all duration-300 hover:bg-red-200 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                            href="#">2</a>
                    </li>
                    <li>
                        <a class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-red-600 transition-all duration-300 hover:bg-red-200 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                            href="#">3</a>
                    </li>
                    <li>
                        <a class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-red-600 transition-all duration-300 hover:bg-red-200 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                            href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

@endsection
