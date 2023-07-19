@extends('konsumen.layouts.master')
@section('title','Detail Pesanan Anda')
@section('description','Detail Pesanan Konsumen')
@section('content')
    <style>
        .textJudul {
            text-align: center;
            margin: 0;
            flex-grow: 1;
        }

        hr {
            border: 0.1px solid rgb(110, 110, 110);
        }

        .listPesanan h1{
            font-size: 20px;
        }

        .subOngkir h1{
            font-size: 20px;
        }
    </style>
    <div class="container px-[8vw] mx-auto mt-[152px]">
        <div class="flex items-center justify-center judulAddProduk">
            {{-- <a href="/konsumen/pesanan">
                <svg class="w-8 h-8 md:w-10 md:h-10" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <title>ionicons-v5-a</title>
                        <polyline points="244 400 100 256 244 112"
                            style="fill:none;stroke:#850000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px">
                        </polyline>
                        <line x1="120" y1="256" x2="412" y2="256"
                            style="fill:none;stroke:#850000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px">
                        </line>
                    </g>
                </svg>
            </a> --}}
            <h2 class="mx-auto text-2xl font-bold text-center max-md:text-lg">Detail Pesanan</h2>
        </div>

        <hr class="my-8">

        <div class="my-14">
            <div class="flex flex-col justify-between atas lg:flex-row">
                <div class="tokoTanggal">
                    {{-- <div class="flex items-center toko">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path fill="currentColor" d="M464 448V267.85a104.76 104.76 0 0 1-33.56 6.58c-1.18 0-2.3.05-3.4.05a108 108 0 0 1-56.86-16a108 108 0 0 1-56.85 16a106.16 106.16 0 0 1-56.51-16.2a107.84 107.84 0 0 1-57.2 16.2a106.14 106.14 0 0 1-56.85-16.42a106.14 106.14 0 0 1-56.85 16.42c-1.09 0-2.19 0-3.37-.05h-.06A104.66 104.66 0 0 1 48 267.49V448H16v32h480v-32Zm-240-64h-96v-76a4 4 0 0 1 4-4h88a4 4 0 0 1 4 4Zm160 64h-80V308a4 4 0 0 1 4-4h72a4 4 0 0 1 4 4Zm108.57-277.72L445.89 64C432 32 432 32 400 32H112c-32 0-32 0-45.94 32L19.38 170.28c-9 19.41 2.89 39.34 2.9 39.35l.41.66c.42.66 1.13 1.75 1.62 2.37c.1.13.19.27.28.4l5.24 6.39l5.31 5.14l.42.36a69.65 69.65 0 0 0 9.44 6.78v.05a74 74 0 0 0 36 10.67h2.47a76.08 76.08 0 0 0 51.89-20.31a72.38 72.38 0 0 0 5.77-6a74.18 74.18 0 0 0 5.78 6a76.08 76.08 0 0 0 51.89 20.31c23.28 0 44.07-10 57.63-25.56a.11.11 0 0 1 .15 0l5.66 5.26a76.09 76.09 0 0 0 51.9 20.31c23.29 0 44.11-10 57.66-25.61c13.56 15.61 34.37 25.61 57.67 25.61h2.49a71.35 71.35 0 0 0 35-10.7c.95-.57 1.86-1.17 2.78-1.77A71.33 71.33 0 0 0 488 212.17l2-3c.9-2.04 11.21-20.3 2.57-38.89Z"/></svg>
                        <h2 id="namaToko" class="mx-3"> Syamsul Katering</h2>
                    </div> --}}
                    <div class="flex items-center my-3 pengiriman">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M3 4a2 2 0 0 0-2 2v11h2a3 3 0 0 0 3 3a3 3 0 0 0 3-3h6a3 3 0 0 0 3 3a3 3 0 0 0 3-3h2v-5l-3-4h-3V4m-7 2l4 4l-4 4v-3H4V9h6m7 .5h2.5l1.97 2.5H17M6 15.5A1.5 1.5 0 0 1 7.5 17A1.5 1.5 0 0 1 6 18.5A1.5 1.5 0 0 1 4.5 17A1.5 1.5 0 0 1 6 15.5m12 0a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5Z"/></svg>
                        <h1 class="mx-3 text-xl font-bold">Delivery</h1>
                    </div>
                    <div class="flex items-center my-3 tanggal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V3q0-.425.288-.713T7 2q.425 0 .713.288T8 3v1h8V3q0-.425.288-.713T17 2q.425 0 .713.288T18 3v1h1q.825 0 1.413.588T21 6v14q0 .825-.588 1.413T19 22H5Zm0-2h14V10H5v10Zm7-6q-.425 0-.713-.288T11 13q0-.425.288-.713T12 12q.425 0 .713.288T13 13q0 .425-.288.713T12 14Zm-4 0q-.425 0-.713-.288T7 13q0-.425.288-.713T8 12q.425 0 .713.288T9 13q0 .425-.288.713T8 14Zm8 0q-.425 0-.713-.288T15 13q0-.425.288-.713T16 12q.425 0 .713.288T17 13q0 .425-.288.713T16 14Zm-4 4q-.425 0-.713-.288T11 17q0-.425.288-.713T12 16q.425 0 .713.288T13 17q0 .425-.288.713T12 18Zm-4 0q-.425 0-.713-.288T7 17q0-.425.288-.713T8 16q.425 0 .713.288T9 17q0 .425-.288.713T8 18Zm8 0q-.425 0-.713-.288T15 17q0-.425.288-.713T16 16q.425 0 .713.288T17 17q0 .425-.288.713T16 18Z"/></svg>
                        <h1 id="tanggalPesanan" class="mx-3 text-xl font-bold">{{$TanggalPesanan}}</h1>
                    </div>
                    <div class="flex items-center my-3 waktu">
                        <svg width="28" height="28" viewBox="0 0 50 50" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M25 0C38.8075 0 50 11.1925 50 25C50 38.8075 38.8075 50 25 50C11.1925 50 0 38.8075 0 25C0 11.1925 11.1925 0 25 0ZM25 5C19.6957 5 14.6086 7.10714 10.8579 10.8579C7.10714 14.6086 5 19.6957 5 25C5 30.3043 7.10714 35.3914 10.8579 39.1421C14.6086 42.8929 19.6957 45 25 45C30.3043 45 35.3914 42.8929 39.1421 39.1421C42.8929 35.3914 45 30.3043 45 25C45 19.6957 42.8929 14.6086 39.1421 10.8579C35.3914 7.10714 30.3043 5 25 5ZM25 10C25.6123 10.0001 26.2033 10.2249 26.6609 10.6318C27.1185 11.0387 27.4109 11.5994 27.4825 12.2075L27.5 12.5V23.965L34.2675 30.7325C34.7159 31.1824 34.9762 31.7861 34.9956 32.421C35.015 33.0558 34.792 33.6743 34.3719 34.1507C33.9518 34.6271 33.3661 34.9258 32.7338 34.986C32.1015 35.0462 31.47 34.8635 30.9675 34.475L30.7325 34.2675L23.2325 26.7675C22.8439 26.3786 22.5944 25.8725 22.5225 25.3275L22.5 25V12.5C22.5 11.837 22.7634 11.2011 23.2322 10.7322C23.7011 10.2634 24.337 10 25 10Z"
                                fill="black" />
                        </svg>
                        <h2 class="mx-3 text-xl font-bold">{{ $DataTransaksiUser->waktuPesanan }}</h2>
                    </div>
                </div>

                <div class="w-full alamat lg:w-1/2">
                    <div class="flex items-center gap-1 judulAlamat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5a2.5 2.5 0 0 1 0 5z"/></svg>
                        <h2 class="text-xl font-bold">Alamat Pengiriman</h2>
                    </div>
                    <div class="p-3 px-4 my-3 border border-black border-solid detailAlamat rounded-xl">
                        <h1 id="namaKonsumen" class="text-xl">{{Auth::User()->Nama}}</h1>
                        <h1 id="teleponKonsumen" class="text-xl">{{Auth::User()->Nohp}}</h1>
                        <h1 id="alamatKonsumen" class="text-lg">{{Auth::User()->Alamat}}, {{Auth::User()->Regency->name}}, {{Auth::User()->Regency->Province->name}}</h1>
                    </div>
                </div>
            </div>

            <h1 class="pt-16 text-2xl font-extrabold">Ringkasan Belanja</h1>

            <div class="listPesanan">
                @php
                    $SubTotal = 0;
                @endphp
                @foreach ($ListProduks as $acaras => $items)
                    <h1 class="mt-4 text-xl text-[#850000] font-bold">
                        Keranjang: {{ $acaras }}
                    </h1>

                    @foreach ($items as $listBarang)
                        <input type="checkbox" name="listIdKeranjang[]" checked value="{{$listBarang->IdKeranjang}}" class="hidden" id="">
                        <div class="justify-between my-5 lg:flex">
                            <img src="{{ asset('storage/' . $listBarang->FotoProduk) }}"
                                class="mr-5 rounded-lg object-cover w-52 h-52">
                            <div class="flex items-center justify-between w-full detailProduk">
                                <div class="detail1">
                                    <h1 id="namaProduk" class="text-2xl font-bold">{{ $listBarang->Nama }}</h1>
                                    <h1 id="hargaProduk" class="text-lg">@currency($listBarang->Harga)</h1>
                                    <h1 id="jumlahPesanan" class="text-lg">x {{ $listBarang->Qty }}</h1>
                                </div>
                                <input type="text" value="{{$listBarang->MinimalWaktuPO}}" name="" id="" class="hidden MinimalWaktuPO">

                                <div class="py-10 detail2">
                                    <h1 class="text-2xl text-end">Total:</h1>
                                    <h1 id="totalHarga" class="text-xl">@currency($listBarang->Harga * $listBarang->Qty)</h1>
                                </div>
                            </div>
                        </div>
                        @php
                            $SubTotal += $listBarang->Harga * $listBarang->Qty;
                        @endphp
                    @endforeach
                @endforeach
            </div>

            <hr class="my-8 border-[#850000] border-2">

            <div class="subOngkir">
                <div class="flex justify-between">
                    <h1 class="text-xl font-bold">Subtotal</h1>
                    <h1 id="subtotal" class="text-lg font-bold">@currency($SubTotal)</h1>
                </div>

                <div class="flex justify-between my-4">
                    <h1 class="text-xl font-bold">Ongkos Kirim</h1>
                    <h1 id="ongkir" class="text-lg font-bold">Rp 30.000,00</h1>
                </div>
            </div>

            <hr class="my-8 border-[#850000] border-2">

            <div class="flex flex-col text-center md:justify-between md:text-start md:flex-row">
                <h1 class="text-2xl text-[#850000] font-bold">Total Pembayaran</h1>
                <h1 class="text-2xl text-[#850000] font-black" id="totalharga">@currency($SubTotal + 30000)</h1>
            </div>
        </div>
    </div>
@endsection
