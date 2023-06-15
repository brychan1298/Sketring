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

    .atas h2{
        font-weight: 800;
        font-size: 18px;
    }

    .listPesanan h1{
        font-size: 20px;
    }

    .subOngkir h1{
        font-size: 20px;
    }

</style>
<div class="container m-auto mt-[100px]">
    <div class="flex items-center justify-center mx-5 judulAddProduk">
        <a href="/konsumen/pesanan">
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
        </a>
        <h2 class="text-2xl font-black textJudul 2xl:text-4xl lg:text-4xl md:text-3xl sm:text-3xl">Detail Pesanan</h2>
    </div>

    <hr class="mx-5 my-8">

    <div class="mx-14 md:mx-28 my-14">
        <div class="flex flex-col justify-between atas lg:flex-row">
            <div class="tokoTanggal">
                {{-- <div class="flex items-center toko">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path fill="currentColor" d="M464 448V267.85a104.76 104.76 0 0 1-33.56 6.58c-1.18 0-2.3.05-3.4.05a108 108 0 0 1-56.86-16a108 108 0 0 1-56.85 16a106.16 106.16 0 0 1-56.51-16.2a107.84 107.84 0 0 1-57.2 16.2a106.14 106.14 0 0 1-56.85-16.42a106.14 106.14 0 0 1-56.85 16.42c-1.09 0-2.19 0-3.37-.05h-.06A104.66 104.66 0 0 1 48 267.49V448H16v32h480v-32Zm-240-64h-96v-76a4 4 0 0 1 4-4h88a4 4 0 0 1 4 4Zm160 64h-80V308a4 4 0 0 1 4-4h72a4 4 0 0 1 4 4Zm108.57-277.72L445.89 64C432 32 432 32 400 32H112c-32 0-32 0-45.94 32L19.38 170.28c-9 19.41 2.89 39.34 2.9 39.35l.41.66c.42.66 1.13 1.75 1.62 2.37c.1.13.19.27.28.4l5.24 6.39l5.31 5.14l.42.36a69.65 69.65 0 0 0 9.44 6.78v.05a74 74 0 0 0 36 10.67h2.47a76.08 76.08 0 0 0 51.89-20.31a72.38 72.38 0 0 0 5.77-6a74.18 74.18 0 0 0 5.78 6a76.08 76.08 0 0 0 51.89 20.31c23.28 0 44.07-10 57.63-25.56a.11.11 0 0 1 .15 0l5.66 5.26a76.09 76.09 0 0 0 51.9 20.31c23.29 0 44.11-10 57.66-25.61c13.56 15.61 34.37 25.61 57.67 25.61h2.49a71.35 71.35 0 0 0 35-10.7c.95-.57 1.86-1.17 2.78-1.77A71.33 71.33 0 0 0 488 212.17l2-3c.9-2.04 11.21-20.3 2.57-38.89Z"/></svg>
                    <h2 id="namaToko" class="mx-3"> Syamsul Katering</h2>
                </div> --}}
                <div class="flex items-center my-3 pengiriman">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M3 4a2 2 0 0 0-2 2v11h2a3 3 0 0 0 3 3a3 3 0 0 0 3-3h6a3 3 0 0 0 3 3a3 3 0 0 0 3-3h2v-5l-3-4h-3V4m-7 2l4 4l-4 4v-3H4V9h6m7 .5h2.5l1.97 2.5H17M6 15.5A1.5 1.5 0 0 1 7.5 17A1.5 1.5 0 0 1 6 18.5A1.5 1.5 0 0 1 4.5 17A1.5 1.5 0 0 1 6 15.5m12 0a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5Z"/></svg>
                    <h2 class="mx-3">Delivery</h2>
                </div>
                <div class="flex items-center my-3 tanggal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V3q0-.425.288-.713T7 2q.425 0 .713.288T8 3v1h8V3q0-.425.288-.713T17 2q.425 0 .713.288T18 3v1h1q.825 0 1.413.588T21 6v14q0 .825-.588 1.413T19 22H5Zm0-2h14V10H5v10Zm7-6q-.425 0-.713-.288T11 13q0-.425.288-.713T12 12q.425 0 .713.288T13 13q0 .425-.288.713T12 14Zm-4 0q-.425 0-.713-.288T7 13q0-.425.288-.713T8 12q.425 0 .713.288T9 13q0 .425-.288.713T8 14Zm8 0q-.425 0-.713-.288T15 13q0-.425.288-.713T16 12q.425 0 .713.288T17 13q0 .425-.288.713T16 14Zm-4 4q-.425 0-.713-.288T11 17q0-.425.288-.713T12 16q.425 0 .713.288T13 17q0 .425-.288.713T12 18Zm-4 0q-.425 0-.713-.288T7 17q0-.425.288-.713T8 16q.425 0 .713.288T9 17q0 .425-.288.713T8 18Zm8 0q-.425 0-.713-.288T15 17q0-.425.288-.713T16 16q.425 0 .713.288T17 17q0 .425-.288.713T16 18Z"/></svg>
                    <h2 id="tanggalPesanan" class="mx-3">{{$TanggalPesanan}}</h2>
                </div>
            </div>

            <div class="w-full alamat lg:w-1/2">
                <div class="flex items-center judulAlamat">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5a2.5 2.5 0 0 1 0 5z"/></svg>
                    <h2 class="">Alamat Pengiriman</h2>
                </div>
                <div class="p-3 px-4 my-3 border border-black border-solid detailAlamat rounded-xl">
                    <h1 id="namaKonsumen">{{Auth::User()->Nama}}</h1>
                    <h1 id="teleponKonsumen">{{Auth::User()->Nohp}}</h1>
                    <h1 id="alamatKonsumen">{{Auth::User()->Alamat}}, {{Auth::User()->Regency->name}}, {{Auth::User()->Regency->Province->name}}</h1>
                </div>
            </div>
        </div>

        <h1 class="pt-16 text-2xl font-extrabold">Ringkasan Belanja</h1>

        <div class="listPesanan">
            @php
                $SubTotal = 0;
            @endphp
            @foreach ($ListProduks as $acaras => $items)
                <h2 class="mt-4 text-xl text-[#850000] font-bold">
                    Keranjang: {{ $acaras }}
                </h2>

                @foreach ($items as $listBarang)
                    <input type="checkbox" name="listIdKeranjang[]" checked value="{{$listBarang->IdKeranjang}}" class="hidden" id="">
                    <div class="justify-between my-5 lg:flex">
                        <img src="{{ asset('storage/' . $listBarang->FotoProduk) }}"
                            class="mr-5 rounded-lg w-52 h-52">
                        <div class="flex items-center justify-between w-full detailProduk">
                            <div class="detail1">
                                <h2 id="namaProduk">{{ $listBarang->Nama }}</h2>
                                <h2 id="hargaProduk">@currency($listBarang->Harga)</h2>
                                <h2 id="jumlahPesanan">Jumlah Pesanan: {{ $listBarang->Qty }}</h2>
                            </div>
                            <input type="text" value="{{$listBarang->MinimalWaktuPO}}" name="" id="" class="hidden MinimalWaktuPO">

                            <div class="py-10 detail2">
                                <h2 class="text-end ">Total:</h2>
                                <h2 id="totalHarga">@currency($listBarang->Harga * $listBarang->Qty)</h2>
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
                <h1 class="text-2xl font-extrabold">Subtotal</h1>
                <h2 id="subtotal">@currency($SubTotal)</h2>
            </div>

            <div class="flex justify-between my-4">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M3 4a2 2 0 0 0-2 2v11h2a3 3 0 0 0 3 3a3 3 0 0 0 3-3h6a3 3 0 0 0 3 3a3 3 0 0 0 3-3h2v-5l-3-4h-3V4m-7 2l4 4l-4 4v-3H4V9h6m7 .5h2.5l1.97 2.5H17M6 15.5A1.5 1.5 0 0 1 7.5 17A1.5 1.5 0 0 1 6 18.5A1.5 1.5 0 0 1 4.5 17A1.5 1.5 0 0 1 6 15.5m12 0a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5Z"/></svg>
                    <h2 class="mx-3">Ongkos Kirim</h2>
                </div>
                <h2 id="ongkir">Rp 30.000,00</h2>
            </div>
        </div>

        <hr class="my-8 border-[#850000] border-2">

        <div class="flex flex-col text-center md:justify-between md:text-start md:flex-row">
            <h1 class="text-2xl text-[#850000] font-bold">Total Pembayaran</h1>
            <h1 class="text-2xl text-[#850000] font-black" id="totalharga">@currency($SubTotal + 30000)</h1>
        </div>

        <div class="flex justify-center my-16 md:justify-end">
            <form action="/konsumen/batalkan/{{$IdTransaksi}}" method="get" onsubmit="return confirm('Apakah anda yakin ingin membatalkan pesanan ini?')">
                @csrf
                <button type="submit" class="px-4 px-8 py-2 mx-2 text-xl font-semibold text-red-600 bg-transparent border border-red-600 rounded hover:bg-red-800 hover:text-white hover:border-transparent">
                    BATAL
                </button>
            </form>


            <a href="/konsumen/pembayaran/{{$IdTransaksi}}" class="px-4 px-8 py-2 text-xl font-bold text-white bg-red-600 rounded hover:bg-red-800">
                BAYAR
            </a>
        </div>
    </div>
</div>
@endsection
