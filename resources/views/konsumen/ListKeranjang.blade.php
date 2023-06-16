@extends('konsumen.layouts.master')
@section('title', 'List Keranjang')
@section('description', 'Halaman Daftar Keranjang')
@section('content')
    <div class="container m-auto">
        <div class="grid grid-cols-3 border-b-2 pb-5 mt-[140px]">
            <h1></h1>
            <h1 class="text-center font-bold text-2xl">Keranjang Belanja</h1>
            <div class="text-right">
                <div class="flex float-right items-center gap-3">
                    <h1 class="">
                        Tambah Koleksi
                    </h1>
                    <div class="">
                        <div id="dropdownToggle"
                            class="bg-[#850000] w-11 h-11 text-white rounded-full flex justify-center items-center cursor-pointer"
                            data-dropdown-toggle="dropdown">
                            +
                        </div>
                        <div id="dropdown" class="hidden z-10 rounded-lg border-2 border-[#850000] bg-[#BBBBBB] p-5">
                            <form action="/konsumen/tambahAcara" method="post">
                                @csrf
                                <div>
                                    <p class="text-left font-extrabold">
                                        Nama Koleksi
                                    </p>
                                    <input name="Nama" type="text"
                                        class="shadow mt-3 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="username" type="text" placeholder="">
                                    <button type="submit" class="bg-[#850000] text-white px-8 py-2 rounded mt-8">
                                        Ok
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-4 mt-12 gap-7 mx-auto mb-[100px]">
            <a href="/konsumen/keranjang">
                <div>
                    <div class="rounded-md shadow-3xl flex flex-wrap">
                        @php
                            $countImg = 0;
                        @endphp
                        @foreach ($daftarAcara as $acara)
                            @if (!empty($acara->FotoProduk))
                                <img src="{{ asset('storage/' . $acara->FotoProduk) }}" alt=""
                                    class="w-1/2 aspect-square rounded-xl">
                                @php
                                    $countImg++;
                                @endphp
                            @else
                                <img src="/images/empty-cart.png" alt=""
                                    class="w-1/2 m-auto aspect-square rounded-xl object-cover">
                                @php
                                    $countImg++;
                                @endphp
                            @endif
                            @if ($countImg == 4)
                                @php
                                    break;
                                @endphp
                            @endif
                        @endforeach
                        @for ($i = 0; $i < 4 - $countImg; $i++)
                            <img src="images/bannerToko.jpg" alt="" class="w-1/2 aspect-square rounded-xl">
                        @endfor
                    </div>
                    <h1 class="font-bold mt-5">
                        Semua Produk
                    </h1>
                </div>
            </a>
            @foreach ($listAcara as $acara => $items)
                @foreach ($items as $perItem)
                    @php
                        $IdAcara = $perItem->IdAcara;
                        $fotoProduk = $perItem->FotoProduk;
                        break;
                    @endphp
                @endforeach
                <a href="/konsumen/keranjang/{{ $IdAcara }}">
                    <div>
                        <div class="rounded-xl shadow-3xl relative">
                            @if ($fotoProduk)
                                <img src="{{ asset('storage/' . $fotoProduk) }}" alt=""
                                    class="w-full aspect-square rounded-xl">
                            @else
                                <div class="w-full">
                                    <img src="/images/empty-cart.png" alt=""
                                        class="w-full m-auto aspect-square rounded-xl object-cover">
                                </div>
                            @endif
                            <form action="/konsumen/hapus-keranjang" method="POST"
                                onsubmit="return confirm('Apa anda ingin menghapus Keranjang {{ $acara }} ?')">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="IdAcara" value="{{ $IdAcara }}">
                                <button type="submit" class="absolute top-[5%] right-[5%] ">
                                    <svg onclick=""
                                        class="text-center w-full font-semibold text-sm cursor-pointer deleteCart"
                                        width="28=" height="29" viewBox="0 0 28 29" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.68114 1.52061L8.25175 2.31539H2.52656C1.47098 2.31539 0.618164 3.11017 0.618164 4.09391C0.618164 5.07766 1.47098 5.87244 2.52656 5.87244H25.4273C26.4829 5.87244 27.3357 5.07766 27.3357 4.09391C27.3357 3.11017 26.4829 2.31539 25.4273 2.31539H19.7021L19.2727 1.52061C18.9507 0.914802 18.2887 0.536865 17.5671 0.536865H10.3868C9.66516 0.536865 9.00318 0.914802 8.68114 1.52061ZM25.4273 7.65096H2.52656L3.79087 26.4922C3.88629 27.8983 5.13868 28.9932 6.64751 28.9932H21.3064C22.8152 28.9932 24.0676 27.8983 24.163 26.4922L25.4273 7.65096Z"
                                            fill="#888888" />
                                    </svg>
                                </button>
                            </form>

                        </div>
                        <h1 class="font-bold mt-5">
                            {{ $acara }}
                        </h1>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
