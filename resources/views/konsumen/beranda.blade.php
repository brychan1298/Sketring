@extends('konsumen.layouts.master')
@section('title', 'Beranda')
@section('description', 'Halaman Beranda Konsumen')
@section('content')
    <div class="">
        <div id="" class="container-md mx-auto">
            <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill mt-12"
                style="background-image: url(https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80)">
                <div class="md:w-1/2 px-[5.5%]">
                    <p class="font-bold text-sm uppercase">Selamat datang</p>
                    <p class="text-7xl font-bold mt-4">Sketring</p>
                    <p class="text-2xl mb-10 mt-10">Katering Andalanmu</p>
                    <a href="#"
                        class="bg-[#850000] py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Daftar
                        Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container m-auto mt-[60px]">
        <div class="grid lg:grid-cols-2 gap-x-20 sm:max-md:grid-cols-1">
            <div class="md:mb-10">
                <div class="flex justify-between items-end">
                    <h1 class="text-2xl font-bold">Rekomendasi Katering</h1>
                    <a href="/konsumen/cari" class="text-[#850000] hover:underline">Lihat Semua</a>
                </div>
                @foreach ($produk as $item)
                    <div class="flex mt-10 rounded-md shadow-3xl p-5 items-end justify-between">
                        <div class="flex">
                            <img src="{{ asset('storage/' . $item->FotoProduk) }}"
                                class="w-36 h-36 object-cover rounded-md mr-5">
                            <div class="">
                                <p class="font-bold text-xl">{{ $item->Nama }}</p>
                                <div class="flex gap-2 mt-1">
                                    <img src="images/store.png" alt="">
                                    <div class="font-light">{{ $item->User->Nama }}</div>
                                </div>
                                {{-- <div class="flex gap-2 mt-1">
                                    <img src="images/location.png" alt="">
                                    <div class="font-light">3.5 km</div>
                                </div> --}}
                                <div class="flex gap-2 mt-1">
                                    <img src="images/export.png" alt="">
                                    <div class="font-light">
                                        @if ($item->JumlahRating == 0)
                                            N/A
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="bg-[#850000] text-white px-5 py-2 rounded-md font-semibold">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="rounded-xl shadow-3xl max-sm:mx-7 max-sm:mt-10">
                <div class="bg-[#850000] rounded-t-xl px-7 py-2">
                    <h1 class="text-2xl text-white">
                        Chat
                    </h1>
                </div>
                <div class="mx-7 py-5 flex border-b-2 items-center justify-between">
                    <div class="flex gap-5">
                        <img class="w-12 h-12 rounded-full bg-gray" src="">
                        <div class="">
                            <h1 class="font-semibold">
                                Samsul Katering
                            </h1>
                            <p class="font-normal text-sm text-[#8F8F8F]">
                                Selamat pagi, pesanan yang tadi siang sudah fix ya jadinya ???
                            </p>
                        </div>
                    </div>
                    <div>
                        1
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="" class="mt-[130px]">
        <div class="text-center">
            <p class="text-[#8f8f8f]">
                Selamat datang di
            </p>
            <p class="uppercase text-5xl mt-2">
                sketring
            </p>
            <p class="sm:mx-[35vw] mx-[15vw] mt-5">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem consequatur molestias dolorem dolores,
                maxime facilis expedita odit dolorum odio ipsam labore, impedit et, harum cum omnis a modi quas sit.
            </p>
        </div>
        <div class="container m-auto mt-[60px]">
            <div class="flex grid lg:grid-cols-3 gap-9 md:max-lg:grid-cols-2 sm:max-md:grid-cols-1">
                <div class="shadow-3xl rounded-md px-11 py-12 max-sm:mx-[7vw]">
                    <div class="bg-[#DC0000] rounded-md bg-opacity-60 w-20 h-20 place-items-center mb-6 flex align-center">
                        <img src="images/secure.png" alt="" class="mx-auto w-8">
                    </div>
                    <h1 class="font-bold text-xl">Pembelian Terjamin Aman</h1>
                    <p class="font-light mt-8">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem consequatur molestias dolorem
                        dolores, maxime facilis expedita odit dolorum odio ipsam labore, impedit et, harum cum omnis a modi
                        quas sit.
                    </p>
                </div>
                <div class="shadow-2xl rounded-md px-11 py-12 max-sm:mx-[7vw]">
                    <div class="bg-[#DC0000] rounded-md bg-opacity-60 w-20 h-20 place-items-center mb-6 flex align-center">
                        <img src="images/secure.png" alt="" class="mx-auto w-8">
                    </div>
                    <h1 class="font-bold text-xl">Pembelian Terjamin Aman</h1>
                    <p class="font-light mt-8">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem consequatur molestias dolorem
                        dolores, maxime facilis expedita odit dolorum odio ipsam labore, impedit et, harum cum omnis a modi
                        quas sit.
                    </p>
                </div>
                <div class="shadow-2xl rounded-md px-11 py-12 max-sm:mx-[7vw]">
                    <div class="bg-[#DC0000] rounded-md bg-opacity-60 w-20 h-20 place-items-center mb-6 flex align-center">
                        <img src="images/secure.png" alt="" class="mx-auto w-8">
                    </div>
                    <h1 class="font-bold text-xl">Pembelian Terjamin Aman</h1>
                    <p class="font-light mt-8">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem consequatur molestias dolorem
                        dolores, maxime facilis expedita odit dolorum odio ipsam labore, impedit et, harum cum omnis a modi
                        quas sit.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
