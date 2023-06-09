@extends('konsumen.layouts.master')
@section('title', 'Beranda')
@section('description', 'Halaman Beranda Konsumen')
@section('content')
    <div id="" class="mx-auto container-md">
        {{-- <div class="object-fill h-auto px-10 py-24 mt-12 text-white bg-center bg-cover"
            style="background-image: url(https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80)"> --}}
            {{-- bg-cover bg-center --}}
        <div class="bg-cover bg-center h-auto text-white py-24 max-lg:py-12 max-sm:py-8 px-10 object-fill mt-24 max-sm:mt-12"
        style="background-image: url(images/home_banner.png)">
            <div class="md:w-1/2 px-[5.5%]">
                <p class="text-sm font-bold max-sm:text-xs uppercase">Selamat datang</p>
                <p class="mt-4 max-lg:text-5xl max-sm:text-4xl font-bold text-7xl">Sketring</p>
                <p class="mt-10 mb-10 text-xl max-lg:text-sm max-lg:mb-6 max-lg:mt-6">Katering Andalanmu!!</p>
                @if(!Auth::check())
                <a href="/register"
                    class="bg-[#850000] max-lg:py-2 max-lg:px-4 py-3 px-7 text-white font-bold uppercase text-sm rounded hover:bg-gray-200 hover:text-gray-800">Daftar
                    Sekarang</a>
                @endif
            </div>
        </div>
    </div>

    <div class="container px-[8vw] mx-auto mt-[80px]">
        <div class="container m-auto mt-[60px]">
            <div class="grid lg:grid-cols-2 gap-x-20 sm:max-md:grid-cols-1 gap-y-20">
                <div class="">
                    <div class="flex max-sm:flex-col justify-between">
                        <h1 class="text-2xl font-bold max-sm:mb-2">Rekomendasi Produk</h1>
                        <a href="/konsumen/cari" class="text-[#850000] hover:underline">Lihat Semua >></a>
                    </div>
                    @foreach ($produk as $item)
                        <div class="flex mt-4 rounded-md shadow-3xl p-5 items-center max-xl:gap-5">
                            <div class="">
                                <img src="{{ asset('storage/' . $item->FotoProduk) }}" class="w-36 h-36 object-cover rounded-md mr-5">
                            </div>
                            <div class="w-2/3">
                                <p class="font-bold text-xl">{{ $item->Nama }}</p>
                                <div class="flex gap-2 mt-1">
                                    <img src="images/store.png" alt="">
                                    <div class="font-light">{{ $item->User->Nama }}</div>
                                </div>
                                {{-- <div class="flex gap-2 mt-1">
                                    <img src="images/location.png" alt="">
                                    <div class="font-light">3.5 km</div>
                                </div> --}}
                                <div class="flex gap-2 mt-1 mb-3 items-center">
                                    <img src="images/export.png" class="w-5 h-5" alt="">
                                    <div class="font-light">
                                        @if ($item->JumlahRating == 0)
                                            N/A
                                        @else
                                            {{$item->Rating}}
                                        @endif
                                    </div>
                                </div>
                                <div class="flex justify-end w-full">
                                    <a href="/konsumen/detailproduk/{{ $item->IdProduk }}"
                                        class="bg-[#850000] text-white px-5 py-2 rounded-md">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="h-full rounded-xl shadow-3xl">
                    <div class="bg-[#850000] rounded-t-xl px-7 py-2">
                        <h1 class="text-2xl text-white">
                            Chat
                        </h1>
                    </div>
                    @if (Auth::check())
                        <div class="items-center justify-between py-5 mx-7">
                            @if ($lastChatRaw == "")
                                <p>Belum ada chat.</p>
                            @else
                            @php
                                $countId = 0;
                            @endphp
                            @foreach ($lastChatRaw as $chatIds)
                                <a href="/konsumen/chat/{{ $chatIds->IdUser }}"
                                    class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                    <div class="flex-shrink-0">
                                        @if ($chatIds->FotoProfil)
                                        <img class="w-16 h-16 rounded-full" src="{{ asset('storage/' . $chatIds->FotoProfil) }}"/>
                                        @else
                                        <img class="w-16 h-16 rounded-full" src="/images/fotoprofile_default.png" alt="">
                                        @endif
                                    </div>
                                    <div class="ml-2">
                                        <h1 class="text-lg font-semibold text-left">{{ $chatIds->Nama }}</h1>
                                        <p class="text-sm text-left text-gray-500">
                                            {{ \Illuminate\Support\Str::limit($chatIds->text, 30, '...') }}</p>
                                    </div>
                                    <div class="ml-auto notif">
                                        @if ($unread[$countId]->Count > 0)
                                            <span
                                                class="flex justify-center w-6 h-6 text-white bg-red-500 rounded-full">{{ $unread[$countId]->Count }}</span>
                                        @endif
                                    </div>
                                </a>
                                <div class="my-3 border border-gray-300 border-solid line"></div>
                                @php
                                    $countId++;
                                @endphp
                            @endforeach
                            @endif
                            {{-- <div class="flex gap-5">
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
                        </div> --}}
                        </div>
                    @else
                        <div class="grid py-24 place-items-center">

                            <h2 class="text-center font-bold mx-24 mt-5 text-xl text-[#850000]">
                                SILAHKAN LOGIN TERLEBIH DAHULU UNTUK CHAT
                            </h2>
                            <a href="/login" class="px-8 py-2 mt-5 rounded-md bg-[#850000] text-white text-xl">
                                Login
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="py-28">
            <hr class="border-[#850000] border-2">
            <hr class="mt-1 border-[#850000] border-1">
        </div>

        <div class="flex justify-around items-center max-lg:flex-col max-lg:justify-center">
            <div class="max-lg:mb-12 max-lg:text-center">
                <p class="font-black text-5xl leading-tight max-lg:text-4xl ">
                    Kamu punya acara <br class="max-lg:hidden"> tapi tidak ingin <br class="max-lg:hidden"> <span class="text-[#850000]">Memasak?</span>
                </p>
                {{-- <p class="font-black text-3xl leading-tight">
                    Atau punya usaha katering tapi <br> <span class="text-[#850000]">tidak laku?</span>
                </p> --}}
                <p class="mt-6 text-md">
                    Sekarang waktunya pakai S'Ketring!! Platform inovatif untuk membantu <br class="max-lg:hidden">
                    Anda menjelajahi beragam katering di sekitar Anda dengan
                    <span class="font-bold text-[#850000]">mudah dan cepat.</span>
                </p>
            </div>

            <div class="">
                <img src="/images/beranda.png" class="w-80 max-lg:w-[32vw]" alt="">
            </div>
        </div>

        <div class="py-28">
            <hr class="border-[#850000] border-2">
            <hr class="mt-1 border-[#850000] border-1">
        </div>

        {{-- <div class="text-center my-16 text-[#850000] text-lg">
            <p class="">
                Platform inovatif yang didedikasikan untuk membantu <span class="font-bold text-[#850000]">UMKM Katering</span>  dan memfasilitasi konsumen dalam menemukan
                <span class="font-bold text-[#850000]"> <br>katering terbaik di daerah mereka.</span>
                Kami memahami betapa pentingnya makanan yang lezat dan berkualitas untuk setiap acara spesial Anda.Dengan Sketring, Anda dapat menjelajahi beragam katering yang tersedia di sekitar Anda dengan
                <span class="font-bold text-[#850000]">mudah dan cepat.</span>
            </p>
        </div> --}}

        <div class=" text-center">
            <p class="font-bold text-4xl">
                Mengapa memilih kami?
            </p>
            <p class="mt-4 text-gray-500">
                Sketring memberikan layanan yang terbaik dan <span class="text-[#850000]">menjamin kepuasan</span>  bagi para pengguna UMKM Katering dan konsumen.
            </p>
        </div>

        <div class="luar mt-20 pb-[300px]">
            <input type="radio" name="slider" id="item-1" checked>
            <input type="radio" name="slider" id="item-2">
            <input type="radio" name="slider" id="item-3">
            <div class="mb-12 cards">
                <label class="card" for="item-1" id="song-1">
                    <div class="shadow-3xl rounded-md px-11 py-12 max-sm:mx-[7vw] bg-white items-center flex flex-col">
                        <div class="bg-[#DC0000] rounded-md bg-opacity-60 w-20 h-20 place-items-center mb-6 flex align-center">
                            <img src="images/secure.png" alt="" class="w-8 mx-auto">
                        </div>
                        <h1 class="font-bold text-xl text-center">Pembelian Terjamin Aman</h1>
                        <p class="font-light mt-8 text-center">
                            Nikmati pengalaman pembelian yang terjamin aman di Sketring! <br>
                            Kepercayaan dan keamanan Anda merupakan prioritas kami.
                        </p>
                    </div>
                </label>
                <label class="card" for="item-2" id="song-2">
                    <div class="shadow-2xl rounded-md px-11 py-12 max-sm:mx-[7vw] bg-white items-center flex flex-col">
                        <div class="bg-[#649EF6] rounded-md bg-opacity-60 w-20 h-20 place-items-center mb-6 flex align-center">
                            <img src="images/spread.png" alt="" class="mx-auto w-8">
                        </div>
                        <h1 class="font-bold text-xl text-center">Tersebar di Seluruh Indonesia</h1>
                        <p class="font-light mt-8 text-center">
                            Sketring membantu Anda temukan katering terbaik di seluruh Indonesia. <br>
                            Kami menghubungkan Anda dengan berbagai pilihan katering sesuai dengan lokasi di mana pun Anda berada.
                        </p>
                    </div>
                </label>
                <label class="card" for="item-3" id="song-3">
                    <div class="shadow-2xl rounded-md px-11 py-12 max-sm:mx-[7vw] bg-white items-center flex flex-col">
                        <div class="bg-[#61C16B] rounded-md bg-opacity-60 w-20 h-20 place-items-center mb-6 flex align-center">
                            <img src="images/easy.png" alt="" class="mx-auto w-9">
                        </div>
                        <h1 class="font-bold text-xl text-center">Pembelian Dijamin Mudah</h1>
                        <p class="font-light mt-8 text-center">
                            Nikmati kemudahan berbelanja di Sketring! Platform kami dirancang untuk kenyamanan dan kemudahan pengguna.
                            Kami menjamin proses pembelian yang mudah bagi setiap pelanggan.
                        </p>
                    </div>
                </label>
            </div>
        </div>

        {{-- <div class="container m-auto mt-[60px] mb-[100px]">
            <div class="flex grid lg:grid-cols-3 gap-9 md:max-lg:grid-cols-2 sm:max-md:grid-cols-1">
                <div class="shadow-3xl rounded-md px-11 py-12 max-sm:mx-[7vw]">
                    <div class="bg-[#DC0000] rounded-md bg-opacity-60 w-20 h-20 place-items-center mb-6 flex align-center">
                        <img src="images/secure.png" alt="" class="w-8 mx-auto">
                    </div>
                    <h1 class="text-xl font-bold">Pembelian Terjamin Aman</h1>
                    <p class="mt-8 font-light">
                        Nikmati pengalaman pembelian yang terjamin aman di Sketring! Kami memahami betapa pentingnya
                        kepercayaan dan keamanan dalam setiap transaksi online. Itulah mengapa kami menempatkan keamanan
                        sebagai prioritas utama kami.
                    </p>
                </div>
                <div class="shadow-2xl rounded-md px-11 py-12 max-sm:mx-[7vw]">
                    <div class="bg-[#DC0000] rounded-md bg-opacity-60 w-20 h-20 place-items-center mb-6 flex align-center">
                        <img src="images/spread.png" alt="" class="w-8 mx-auto">
                    </div>
                    <h1 class="text-xl font-bold">Tersebar di Seluruh Indonesia</h1>
                    <p class="mt-8 font-light">
                        Sketring hadir untuk membantu Anda menemukan katering terbaik, tidak hanya di satu daerah, tetapi
                        juga tersebar di seluruh Indonesia. Kami bangga menjadi platform yang menghubungkan Anda dengan
                        berbagai pilihan katering yang dapat memenuhi kebutuhan kuliner Anda, di mana pun Anda berada.
                    </p>
                </div>
                <div class="shadow-2xl rounded-md px-11 py-12 max-sm:mx-[7vw]">
                    <div class="bg-[#DC0000] rounded-md bg-opacity-60 w-20 h-20 place-items-center mb-6 flex align-center">
                        <img src="images/easy.png" alt="" class="mx-auto w-9">
                    </div>
                    <h1 class="text-xl font-bold">Pembelian Dijamin Mudah</h1>
                    <p class="mt-8 font-light">
                        Nikmati kemudahan dalam setiap pembelian Anda di Sketring! Kami telah merancang platform ini dengan
                        fokus pada kenyamanan dan kemudahan pengguna. Kami mengerti bahwa waktu Anda berharga, dan itulah
                        mengapa kami memastikan proses pembelian dijamin mudah bagi setiap pelanggan.
                    </p>
                </div>
            </div>
        </div> --}}

        <div class="py-28">
            <hr class="border-[#850000] border-2">
            <hr class="mt-1 border-[#850000] border-1">
        </div>

        <div class="flex justify-around gap-16 items-center px-24 pb-28">
            <img src="images/tentangKami.png" class="w-96 h-96" alt="">
            <div>
                <p class="font-black text-5xl leading-tight max-lg:text-4xl mb-4">
                    Tentang <span class="text-[#850000]">SKetring?</span>
                </p>
                <p class="text-justify">
                    Platform inovatif yang didedikasikan untuk membantu UMKM Katering dan memfasilitasi konsumen dalam menemukan katering terbaik di daerah mereka.
                    Kami memahami betapa pentingnya makanan yang lezat dan berkualitas untuk setiap acara spesial Anda.Dengan Sketring,
                    Anda dapat menjelajahi beragam katering yang tersedia di sekitar Anda dengan mudah dan cepat.
                </p>
            </div>
        </div>
    </div>

    <style>
        input[type=radio] {
            display: none;
        }

        .card {
            position: absolute;
            /* background-color: red; */
            width: 60%;
            height: 100%;
            left: 0;
            right: 0;
            margin: auto;
            transition: transform .4s ease;
            cursor: pointer;
        }

        .luar {
            width: 100%;
            /* max-height: 600px; */
            height: 100%;
            /* background-color: red; */
            transform-style: preserve-3d;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .cards {
            position: relative;
            width: 100%;
            height: max-content;
            /* margin-bottom: 20px; */
        }

        #item-1:checked ~ .cards #song-3, #item-2:checked ~ .cards #song-1, #item-3:checked ~ .cards #song-2 {
            transform: translatex(-40%) scale(.8);
            opacity: .4;
            z-index: 0;
        }

        #item-1:checked ~ .cards #song-2, #item-2:checked ~ .cards #song-3, #item-3:checked ~ .cards #song-1 {
            transform: translatex(40%) scale(.8);
            opacity: .4;
            z-index: 0;
        }

        #item-1:checked ~ .cards #song-1, #item-2:checked ~ .cards #song-2, #item-3:checked ~ .cards #song-3 {
            transform: translatex(0) scale(1);
            opacity: 1;
            z-index: 1;

            /* img {
                box-shadow: 0px 0px 5px 0px rgba(81, 81, 81, 0.47);
            } */
        }
    </style>
@endsection
