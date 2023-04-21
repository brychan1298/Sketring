@extends('konsumen.layouts.master')
@section('title', 'Cari Produk')
@section('description', 'Cari Produk Katering di Kota Anda')
@section('content')
    <div class="container-md mx-auto flex flex-col items-center mt-[48px] w-full">
        {{-- Search and Sort --}}
        <div class="flex flex-row justify-center items-center gap-[5vw] w-full p-[2vw]">
            {{-- Search Bar --}}
            <div class="flex w-[50%]">
                <div class="relative w-full">
                    <form action="/cari">
                        {{-- @csrf --}}
                        <input value="{{request('search')}}" name="search" type="search" id="location-search"
                            class="block p-[1vw] w-full z-20 text-sm text-black bg-white focus:ring-[#DC0000] rounded-[10px] border border-2 border-[#DC0000] focus:border-[#DC0000]"
                            placeholder="Cari nama produk atau lokasi" required>
                        <button type="submit"
                            class="absolute top-0 right-0 p-[1vw] text-sm font-medium text-white bg-[#DC0000] rounded-r-lg border border-2 border-[#DC0000] hover:bg-[#850000] focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Sort Dropdowns --}}
            <div class="flex flex-row gap-[1vw] w-max items-center justify-center">
                <p class="font-bold text-black ">Filter:</p>
                <select id="countries"
                    class="w-[10vw] bg-[#FFDB89] border border-[#FFDB89] text-[#850000] font-bold text-sm rounded-[10px] border-2 focus:ring-[#DC0000] focus:border-[#DC0000] block w-full p-[1vw]">
                    <option selected>URUTKAN HARGA</option>
                    <option value="US">Rendah ke Tinggi</option>
                    <option value="CA">Tinggi ke Rendah</option>
                </select>
                <select id="countries"
                    class="w-[10vw] bg-[#FFDB89] border border-[#FFDB89] text-[#850000] font-bold text-sm rounded-[10px] border-2 focus:ring-[#DC0000] focus:border-[#DC0000] block w-full p-[1vw]">
                    <option selected>OPSI PENGIRIMAN</option>
                    <option value="US">Bisa Keduanya</option>
                    <option value="CA">Bisa Delivery</option>
                    <option value="CA">Bisa Pickup</option>
                </select>
            </div>
        </div>
        {{-- Product List --}}
        @if (!request('search'))
        <div class="my-4 text-2xl">
            Katering terdekat di
            <input type="text" value="{{Auth::User()->Regency->name}}" disabled>
        </div>
        @endif
        <div class="flex flex-wrap flex-row gap-[2vw] bg-white px-[2vw] w-full items-center justify-center">
            @foreach ($produks as $produk)
                <a href="#">
                    <div class="bg-white drop-shadow-lg flex flex-col w-max rounded-[10px]">
                        {{-- Product Image --}}
                        <img src="{{ asset('storage/' . $produk->FotoProduk) }}" class="rounded-[10px] w-full h-[9vw]"
                            alt="">
                        {{-- Product Information --}}
                        <div class="flex flex-col w-[100%] gap-[0.5vw] p-[1vw]">
                            <p class="font-bold text-2xl pb-[0.5vw]">{{ $produk->Nama }}</p>
                            <div class="flex flex-row w-[100%] gap-[0.5vw]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="#8F8F8F"
                                        d="M21.999 8a.997.997 0 0 0-.143-.515L19.147 2.97A2.01 2.01 0 0 0 17.433 2H6.565c-.698 0-1.355.372-1.714.971L2.142 7.485A.997.997 0 0 0 1.999 8c0 1.005.386 1.914 1 2.618V20a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-5h4v5a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-9.382c.614-.704 1-1.613 1-2.618zm-2.016.251A2.002 2.002 0 0 1 17.999 10c-1.103 0-2-.897-2-2c0-.068-.025-.128-.039-.192l.02-.004L15.219 4h2.214l2.55 4.251zm-9.977-.186L10.818 4h2.361l.813 4.065C13.957 9.138 13.079 10 11.999 10s-1.958-.862-1.993-1.935zM6.565 4h2.214l-.76 3.804l.02.004c-.015.064-.04.124-.04.192c0 1.103-.897 2-2 2a2.002 2.002 0 0 1-1.984-1.749L6.565 4zm3.434 12h-4v-3h4v3z" />
                                </svg>
                                <p>{{ $produk->User->Nama }}</p>
                            </div>
                            <div class="flex flex-row w-[100%] gap-[0.5vw]">
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
                                <p>Rp {{ $produk->Harga }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
            {{-- @for ($i = 0; $i < 25; $i++) --}}
            {{-- Product Container --}}
            {{-- <a href="#">
                <div class="bg-white drop-shadow-lg flex flex-col w-max rounded-[10px]">
                    Product Image
                    <img src="images/daniljerge.jpeg" class="rounded-[10px] w-[16vw] h-[9vw]" alt="">
                    Product Information
                    <div class="flex flex-col w-[100%] gap-[0.5vw] p-[1vw]">
                        <p class="font-bold text-2xl pb-[0.5vw]">Nama Produk</p>
                        <div class="flex flex-row w-[100%] gap-[0.5vw]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8F8F8F" d="M21.999 8a.997.997 0 0 0-.143-.515L19.147 2.97A2.01 2.01 0 0 0 17.433 2H6.565c-.698 0-1.355.372-1.714.971L2.142 7.485A.997.997 0 0 0 1.999 8c0 1.005.386 1.914 1 2.618V20a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-5h4v5a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-9.382c.614-.704 1-1.613 1-2.618zm-2.016.251A2.002 2.002 0 0 1 17.999 10c-1.103 0-2-.897-2-2c0-.068-.025-.128-.039-.192l.02-.004L15.219 4h2.214l2.55 4.251zm-9.977-.186L10.818 4h2.361l.813 4.065C13.957 9.138 13.079 10 11.999 10s-1.958-.862-1.993-1.935zM6.565 4h2.214l-.76 3.804l.02.004c-.015.064-.04.124-.04.192c0 1.103-.897 2-2 2a2.002 2.002 0 0 1-1.984-1.749L6.565 4zm3.434 12h-4v-3h4v3z"/></svg>
                            <p>Nama Toko</p>
                        </div>
                        <div class="flex flex-row w-[100%] gap-[0.5vw]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8F8F8F" d="m12 18.275l-4.15 2.5q-.275.175-.575.15t-.525-.2q-.225-.175-.35-.438t-.05-.587l1.1-4.725L3.775 11.8q-.25-.225-.312-.513t.037-.562q.1-.275.3-.45t.55-.225l4.85-.425l1.875-4.45q.125-.3.388-.45t.537-.15q.275 0 .537.15t.388.45l1.875 4.45l4.85.425q.35.05.55.225t.3.45q.1.275.038.563t-.313.512l-3.675 3.175l1.1 4.725q.075.325-.05.588t-.35.437q-.225.175-.525.2t-.575-.15l-4.15-2.5Z"/></svg>
                            <p>Rating</p>
                        </div>
                        <div class="flex flex-row w-[100%] gap-[0.5vw]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8F8F8F" d="M5.5 7A1.5 1.5 0 0 1 4 5.5A1.5 1.5 0 0 1 5.5 4A1.5 1.5 0 0 1 7 5.5A1.5 1.5 0 0 1 5.5 7m15.91 4.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.11 0-2 .89-2 2v7c0 .55.22 1.05.59 1.41l8.99 9c.37.36.87.59 1.42.59c.55 0 1.05-.23 1.41-.59l7-7c.37-.36.59-.86.59-1.41c0-.56-.23-1.06-.59-1.42Z"/></svg>
                            <p>Harga Produk</p>
                        </div>
                    </div>
                </div>
            </a> --}}
            {{-- @endfor --}}
        </div>
        {{-- Pagination --}}
        {{-- <div class="w-full flex flex-row items-center justify-center p-[2vw]">
            <ul class="inline-flex items-center -space-x-px">
                <li>
                    <a href="#"
                        class="block px-3 py-2 ml-0 leading-tight text-[#850000] bg-white border border-[#850000] rounded-l-lg hover:bg-gray-100 hover:text-[#DC0000] dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" aria-current="page"
                        class="z-10 px-3 py-2 leading-tight text-white font-bold border border-2 border-[#850000] bg-[#850000] hover:bg-[#850000] hover:text-white dark:border-gray-700 dark:bg-gray-700 dark:text-white">1</a>
                </li>
                <li>
                    <a href="#"
                        class="px-3 py-2 leading-tight text-[#850000] bg-white border border-2 border-[#850000] hover:bg-[#850000] hover:text-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                </li>
                <li>
                    <a href="#"
                        class="px-3 py-2 leading-tight text-[#850000] bg-white border border-2 border-[#850000] hover:bg-[#850000] hover:text-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
                </li>
                <li>
                    <a href="#"
                        class="px-3 py-2 leading-tight text-[#850000] bg-white border border-2 border-[#850000] hover:bg-[#850000] hover:text-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                </li>
                <li>
                    <a href="#"
                        class="px-3 py-2 leading-tight text-[#850000] bg-white border border-2 border-[#850000] hover:bg-[#850000] hover:text-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-3 py-2 ml-0 leading-tight text-[#850000] bg-white border border-[#850000] rounded-r-lg hover:bg-gray-100 hover:text-[#DC0000] dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </div> --}}

        <div class="mt-[50px]">
            {{ $produks->links() }}
        </div>

    </div>
@endsection
