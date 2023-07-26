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

        input#TanggalPesanan {
            display: inline-block;
            position: relative;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        }

        input#waktuPesanan {
            display: inline-block;
            position: relative;
        }

        input[type="time"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        }
    </style>
    @if (session()->has('status'))
        <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
            <span>
                {{ session('status') }}
            </span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="w-6 h-6 text-red-500 fill-current" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif

    <div class="container flex flex-col w-full mx-auto mt-36 max-sm:mt-28 px-[8vw]">
        <div class="flex items-center justify-center judulAddProduk">
            <h2 class="mx-auto text-2xl font-bold text-center max-md:text-lg">Pembayaran</h2>
        </div>

        <hr class="my-8">

        <form action="/konsumen/bayar" method="POST" onsubmit="return CHECK()">
            @csrf
            <div class="detil1 my-14 max-md:my-5">
                <div class="flex items-center my-3 pengiriman">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M3 4a2 2 0 0 0-2 2v11h2a3 3 0 0 0 3 3a3 3 0 0 0 3-3h6a3 3 0 0 0 3 3a3 3 0 0 0 3-3h2v-5l-3-4h-3V4m-7 2l4 4l-4 4v-3H4V9h6m7 .5h2.5l1.97 2.5H17M6 15.5A1.5 1.5 0 0 1 7.5 17A1.5 1.5 0 0 1 6 18.5A1.5 1.5 0 0 1 4.5 17A1.5 1.5 0 0 1 6 15.5m12 0a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5Z" />
                    </svg>
                    <h1 class="mx-3 text-xl font-bold max-md:text-base">Delivery</h1>
                </div>

                <div class="flex flex-col justify-between lg:flex-row">
                    <div class="w-full alamat lg:w-[48%]">
                        <div class="flex items-center judulAlamat">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5a2.5 2.5 0 0 1 0 5z" />
                            </svg>
                            <h1 class="mx-3 text-xl font-bold max-md:text-base">Alamat Pengiriman</h1>
                        </div>
                        <div
                            class="p-3 px-4 my-3 text-xl border border-black border-solid max-md:text-sm detailAlamat rounded-xl">
                            <input type="text" value="{{ Auth::User()->Nama }}" disabled> <br>
                            <input type="text" value="{{ Auth::User()->Nohp }}" disabled class="my-2">
                            <textarea name="AlamatKirim" id="" cols="30" rows="10" readonly class="w-full h-24 text-left"
                                style="resize:none">{{ Auth::User()->Alamat }}, {{ Auth::User()->Regency->name }}, {{ Auth::User()->Regency->Province->name }}</textarea>

                        </div>
                    </div>

                    <div class="relative w-full mt-10 lg:w-[46%]">
                        <div class="">
                            <h1 class="text-xl font-bold max-md:text-base">Nama Keranjang</h1>
                            <h1 id="namaKeranjang" class="p-3 my-3 border border-black rounded-lg max-md:text-sm">
                                {{ $namaAcara }}</h1>
                        </div>
                        <div class="absolute bottom-0 w-full max-lg:relative max-lg:mt-8">
                            <h1 class="text-xl font-bold max-md:text-base">Masukan Tanggal & Jam Pesanan</h1>
                            <h1 class="text-[0.8vw] w-full font-bold text-[#8F8F8F]">Minimal Waktu PO : <label id="minWaktuPO"></label> hari</h1>
                            <div class="flex items-center justify-between my-3">
                                <div class="flex justify-center w-full gap-10 text-lg">
                                    <input type="date" name="TanggalPesanan" id="TanggalPesanan"
                                        class="w-full p-3 text-sm text-gray-900 border border-black rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Select date">
                                    <input type="time" name="waktuPesanan" id="waktuPesanan"
                                        class="w-full p-3 text-sm border border-black rounded-lg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h1 class="pt-16 text-2xl font-extrabold max-md:text-lg">Ringkasan Belanja</h1>

                <div class="listPesanan">
                    @php
                        $SubTotal = 0;
                    @endphp
                    @foreach ($listAcara as $acaras => $items)
                        <h1 class="mt-4 text-xl max-md:text-base text-[#850000] font-bold">
                            Keranjang: {{ $acaras }}
                        </h1>

                        @foreach ($items as $listBarang)
                            <input type="checkbox" name="listIdKeranjang[]" checked value="{{ $listBarang->IdKeranjang }}"
                                class="hidden" id="">
                            <div class="justify-between my-5 lg:flex">
                                <img src="{{ asset('storage/' . $listBarang->FotoProduk) }}"
                                    class="mr-5 rounded-lg object-cover w-52 h-52">
                                <div class="flex items-center justify-between w-full detailProduk">
                                    <div class="detail1">
                                        <h1 id="namaProduk" class="text-2xl font-bold max-md:text-lg">
                                            {{ $listBarang->Nama }}</h1>
                                        <h1 id="hargaProduk" class="text-lg max-md:text-sm">@currency($listBarang->Harga)</h1>
                                        <h1 id="jumlahPesanan" class="text-lg max-md:text-sm">Jumlah Pesanan:
                                            {{ $listBarang->Qty }}</h1>
                                    </div>
                                    <input type="text" value="{{ $listBarang->MinimalWaktuPO }}" name=""
                                        id="" class="hidden MinimalWaktuPO">

                                    <div class="py-10 detail2">
                                        <h1 class="text-2xl max-md:text-lg text-end">Total:</h1>
                                        <h1 id="totalHarga" class="text-xl max-md:text-base">@currency($listBarang->Harga * $listBarang->Qty)</h1>
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
                        <h1 class="text-xl font-bold max-md:text-base">Subtotal</h1>
                        <h1 id="subtotal" class="text-lg font-bold max-md:text-base">@currency($SubTotal)</h1>
                    </div>

                    <div class="flex justify-between my-4">
                        <h1 class="text-xl font-bold max-md:text-base">Ongkos Kirim</h1>
                        <h1 id="ongkir" class="text-lg font-bold max-md:text-base">Rp 30.000,00</h1>
                    </div>

                    {{-- <div class="flex justify-between my-4">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 4a2 2 0 0 0-2 2v11h2a3 3 0 0 0 3 3a3 3 0 0 0 3-3h6a3 3 0 0 0 3 3a3 3 0 0 0 3-3h2v-5l-3-4h-3V4m-7 2l4 4l-4 4v-3H4V9h6m7 .5h2.5l1.97 2.5H17M6 15.5A1.5 1.5 0 0 1 7.5 17A1.5 1.5 0 0 1 6 18.5A1.5 1.5 0 0 1 4.5 17A1.5 1.5 0 0 1 6 15.5m12 0a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5Z" />
                            </svg>
                            <h1 class="mx-3">Ongkos Kirim</h1>
                        </div>
                        <h1 id="ongkir">Rp 30.000,00</h1>
                    </div> --}}
                </div>

                <hr class="my-8 border-[#850000] border-2">

                <div class="flex flex-col text-center md:justify-between md:text-start md:flex-row">
                    <h1 class="text-2xl text-[#850000] max-md:text-lg font-bold">Total Pembayaran</h1>
                    <h1 class="text-2xl text-[#850000] max-md:text-lg font-black" id="totalharga">@currency($SubTotal + 30000)</h1>
                </div>

                <div class="flex justify-center my-16 md:justify-end">
                    <button type="submit"
                        class="px-8 py-2 text-xl font-bold text-white bg-red-600 rounded max-md:text-base hover:bg-red-800">
                        BAYAR
                    </button>
                </div>
            </div>
        </form>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
    <script>

        document.addEventListener("DOMContentLoaded", function(event) {
            var checks = document.getElementsByClassName("MinimalWaktuPO");
            var minWaktuPO = 0;
            for (let index = 0; index < checks.length; index++) {
                if (checks[index].value > minWaktuPO) {
                    minWaktuPO = checks[index].value;
                }
            }

            document.getElementById('minWaktuPO').innerHTML = minWaktuPO.toString();
        });

        // function loadMinimalWaktuPO() {

        // }

        function CHECK() {
            var checks = document.getElementsByClassName("MinimalWaktuPO");
            var tglpesanan = document.getElementById("TanggalPesanan").value;
            var waktupesanan = document.getElementById("waktuPesanan").value;
            if (!tglpesanan) {
                Swal.fire({
                    icon: 'warning',
                    title: "Tolong pilih tanggal pesanan terlebih dahulu",
                });
                return false;
            }
            if (!waktupesanan) {
                Swal.fire({
                    icon: 'warning',
                    title: "Tolong pilih waktu pesanan terlebih dahulu",
                });
                return false;
            }
            tglPesanan = new Date(tglpesanan);
            var tglHariIni = new Date();
            var selisih = tglPesanan.getTime() - tglHariIni.getTime();
            var selisihHari = Math.round(selisih / (1000 * 60 * 60 * 24));
            // alert(selisihHari);
            var minWaktuPO = 0;
            for (let index = 0; index < checks.length; index++) {
                if (checks[index].value > minWaktuPO) {
                    minWaktuPO = checks[index].value;
                }
            }
            if (minWaktuPO > selisihHari) {
                Swal.fire({
                    icon: 'warning',
                    title: "Minimal waktu PO untuk " + checks.length + " barang ini adalah " + minWaktuPO +
                        " hari",
                });
                // alert();
                return false;
            }
            Swal.fire({
                icon: 'success',
                title: "Berhasil",
                text: "Silahkan lanjutkan pembayaran untuk pesanan ini"
            });
        }
    </script>
@endsection
