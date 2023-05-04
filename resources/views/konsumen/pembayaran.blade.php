@extends('konsumen.layouts.master')
@section('title', 'Pembayaran Pesanan')
@section('description', 'Halaman Pembayaran Pesanan')
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

        .detil1 h2 {
            font-weight: 800;
            font-size: 18px;
        }

        .date {
            width: 50%;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>

    @if(session()->has('status'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span>
            {{session('status')}}
        </span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
    @endif
    <div class="container m-auto mt-[100px]">
        <div class="judulAddProduk flex items-center justify-center mx-5">
            <a href="/keranjang">
                <svg class="md:w-10 md:h-10 w-8 h-8" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000">
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
            <h2 class="textJudul 2xl:text-4xl lg:text-4xl md:text-3xl font-black sm:text-3xl text-2xl">Pembayaran</h2>
        </div>

        <hr class="my-8 mx-5">

        <form action="/konsumen/bayar" method="POST" onsubmit="return CHECK()">
            @csrf

            <div class="detil1 mx-14 md:mx-28 my-14">
                
                <div class="pengiriman flex items-center my-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M3 4a2 2 0 0 0-2 2v11h2a3 3 0 0 0 3 3a3 3 0 0 0 3-3h6a3 3 0 0 0 3 3a3 3 0 0 0 3-3h2v-5l-3-4h-3V4m-7 2l4 4l-4 4v-3H4V9h6m7 .5h2.5l1.97 2.5H17M6 15.5A1.5 1.5 0 0 1 7.5 17A1.5 1.5 0 0 1 6 18.5A1.5 1.5 0 0 1 4.5 17A1.5 1.5 0 0 1 6 15.5m12 0a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5Z" />
                    </svg>
                    <h2 class="mx-3">Delivery</h2>
                </div>

                <div class="flex justify-between flex-col lg:flex-row">
                    <div class="alamat lg:w-1/2 w-full">
                        <div class="judulAlamat flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5a2.5 2.5 0 0 1 0 5z" />
                            </svg>
                            <h2>Alamat Pengiriman</h2>
                        </div>
                        <div class="detailAlamat p-3 px-4 border-solid border-black border my-3 rounded-xl text-xl">
                            <input type="text" value="{{Auth::User()->Nama}}" disabled> <br>
                            <input type="text" value="{{Auth::User()->Nohp}}" disabled class="my-2">
                            <textarea name="AlamatKirim" id="" cols="30" rows="10" readonly class="w-full h-24 text-left" style="resize:none">{{ Auth::User()->Alamat }}, {{ Auth::User()->Regency->name }}, {{ Auth::User()->Regency->Province->name }}</textarea>

                        </div>
                    </div>

                    <div class="lg:w-1/3 w-full">
                        <h2>Nama Keranjang</h2>
                        <h1 id="namaKeranjang" class="border-black border rounded-lg p-3 my-2">{{$namaAcara}}</h1>
                        <h2>Masukan Tanggal & Jam Pesanan</h2>
                        <div class="flex items-center justify-between my-2">
                            <div class="time">
                                <div class="inline-flex text-lg border rounded-md shadow-lg p-2">
                                    <input type="date" name="TanggalPesanan" id="TanggalPesanan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                    {{-- <select name="" id=""
                                        class="px-2 outline-none appearance-none bg-transparent">
                                        <option value="00">00</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    <span class="px-2">:</span>
                                    <select name="" id=""
                                        class="px-2 outline-none appearance-none bg-transparent">
                                        <option value="00">00</option>
                                        <option value="05">05</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                        <option value="55">55</option>
                                    </select>
                                    <select name="" id=""
                                        class="px-2 outline-none appearance-none bg-transparent">
                                        <option value="AM">AM</option>
                                        <option value="PM">PM</option>
                                    </select> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h1 class="text-2xl font-extrabold pt-16">Ringkasan Belanja</h1>

                <div class="listPesanan">
                    @php
                        $SubTotal = 0;
                    @endphp
                    @foreach ($listAcara as $acaras => $items)
                        <h2 class="mt-4 text-2xl text-[#850000] font-bold">
                            Keranjang: {{ $acaras }}
                        </h2>

                        @foreach ($items as $listBarang)
                            <input type="checkbox" name="listIdKeranjang[]" checked value="{{$listBarang->IdKeranjang}}" class="hidden" id="">
                            <div class="my-5 lg:flex justify-between">
                                <img src="{{ asset('storage/' . $listBarang->FotoProduk) }}"
                                    class="w-52 h-52 rounded-lg mr-5">
                                <div class="detailProduk flex justify-between w-full items-center">
                                    <div class="detail1">
                                        <h1 id="namaProduk">{{ $listBarang->Nama }}</h1>
                                        <h1 id="hargaProduk">@currency($listBarang->Harga)</h1>
                                        <h1 id="jumlahPesanan">Jumlah Pesanan: {{ $listBarang->Qty }}</h1>
                                    </div>
                                    <input type="text" value="{{$listBarang->MinimalWaktuPO}}" name="" id="" class="hidden MinimalWaktuPO">

                                    <div class="detail2 py-10">
                                        <h1 class="text-end ">Total:</h1>
                                        <h1 id="totalHarga">@currency($listBarang->Harga * $listBarang->Qty)</h1>
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
                        <h1 id="subtotal">@currency($SubTotal)</h1>
                    </div>

                    <div class="flex justify-between my-4">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 4a2 2 0 0 0-2 2v11h2a3 3 0 0 0 3 3a3 3 0 0 0 3-3h6a3 3 0 0 0 3 3a3 3 0 0 0 3-3h2v-5l-3-4h-3V4m-7 2l4 4l-4 4v-3H4V9h6m7 .5h2.5l1.97 2.5H17M6 15.5A1.5 1.5 0 0 1 7.5 17A1.5 1.5 0 0 1 6 18.5A1.5 1.5 0 0 1 4.5 17A1.5 1.5 0 0 1 6 15.5m12 0a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5Z" />
                            </svg>
                            <h1 class="mx-3">Ongkos Kirim</h1>
                        </div>
                        <h1 id="ongkir">Rp 30.000,00</h1>
                    </div>
                </div>

                <hr class="my-8 border-[#850000] border-2">

                <div class="flex md:justify-between text-center md:text-start md:flex-row flex-col">
                    <h1 class="text-2xl text-[#850000] font-bold">Total Pembayaran</h1>
                    <h1 class="text-2xl text-[#850000] font-black" id="totalharga">@currency($SubTotal + 30000)</h1>
                </div>

                <div class="flex md:justify-end my-16 justify-center">
                    <button type="submit" class="text-xl px-8 bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">
                        BAYAR
                    </button>
                </div>
            </div>
        </form>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
    <script>
        function CHECK() {

            var checks = document.getElementsByClassName("MinimalWaktuPO");
            var tglpesanan = document.getElementById("TanggalPesanan").value;
            if(!tglpesanan){
                alert("Tolong pilih tanggal pesanan terlebih dahulu");
                return false;
            }
            tglPesanan = new Date(tglpesanan);
            var tglHariIni = new Date();
            var selisih = tglPesanan.getTime() - tglHariIni.getTime();
            var selisihHari = Math.round(selisih / (1000 * 60 * 60 * 24));
            // alert(selisihHari);
            for (let index = 0; index < checks.length; index++) {
                if(checks[index].value > selisihHari){
                    alert("Minimal waktu PO untuk " + checks.length + " barang ini adalah " + checks[index].value + " hari");
                    return false;
                }
            }
            alert("berhasil");
        }
    </script>
@endsection
