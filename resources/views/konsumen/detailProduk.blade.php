@extends('konsumen.layouts.master')
@section('title', 'Detail Produk')
@section('description', 'Detail dari produk')
@section('content')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    <div class="container mt-[100px] mx-auto">
        <div class="flex">
            <div class="w-1/2 p-10">
                <img src="{{ asset('storage/' . $detailProduk->FotoProduk) }}" alt="">
            </div>
            <div class="DataProduk w-1/2 p-10">

                <input type="hidden" name="IdProduk" id="IdProduk" class="IdProduk" value="{{ $detailProduk->IdProduk }}">
                <div>
                    <h1 class="text-4xl font-black">
                        {{ $detailProduk->Nama }}
                    </h1>
                    <h1 class="text-[#DC0000] text-2xl font-bold">
                        Rp. {{ $detailProduk->Harga }} / Porsi
                    </h1>
                    <p class="text-sm my-4">
                        {{ $detailProduk->Deskripsi }}
                    </p>

                    <div>
                        {{ $detailProduk->Rating }}
                    </div>
                    <div class="my-4 text-[#850000] font-bold text-lg">
                        Pengiriman
                        <div class="flex">
                            <div class="py-1 px-5 my-1 border-[#850000] border-2 rounded-xl">
                                DELIVERY
                            </div>
                        </div>
                    </div>

                    <div class="text-[#850000] font-bold text-lg">
                        Keranjang:
                    </div>
                    <select name="IdAcara" id="IdAcara" class="bg-[#850000] text-white py-2 px-5 rounded-xl">
                        <option value="0">PILIH KERANJANG</option>
                        @foreach ($keranjang as $keranjangs)
                            <option value="{{ $keranjangs->IdAcara }}">{{ $keranjangs->Nama }}</option>
                        @endforeach
                    </select>
                    <p class="text-sm">
                        Notes : Silahkan tambahkan jenis keranjang/acara jika belum ada
                    </p>

                    <div class="text-[#850000] font-bold text-lg mt-2">
                        Jumlah:
                    </div>
                    <div class="flex items-center">
                        <div class="custom-number-input h-10 w-32">
                            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                <button id="minButton" onclick="reduceAmount()"
                                    class="bg-[#850000] h-full w-20 rounded-l cursor-pointer outline-none">
                                    <span class="m-auto text-2xl font-thin text-white">−</span>
                                </button>
                                <input type="number" id="Qty" value="{{ $detailProduk->MinOrder }}"
                                    class="Qty outline-none text-center focus:outline-none text-center w-full text-md border-2 border-[#850000]"
                                    name="Qty" min="{{ $detailProduk->MinOrder }}" max="{{ $detailProduk->MaxOrder }}">
                                <button id="addButton" onclick="addAmount()"
                                    class="bg-[#850000] h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-2xl font-thin text-white">+</span>
                                </button>
                            </div>
                        </div>
                        <div class="text-sm ml-3 text-[#8F8F8F]">
                            minimum order : {{ $detailProduk->MinOrder }} <br>
                            maximum order : {{ $detailProduk->MaxOrder }}
                        </div>
                    </div>

                    <div class="flex gap-3 mt-7 font-black">
                        <button class="addtocart bg-white border-2 border-[#DC0000] text-[#DC0000] py-1 px-4 rounded-lg">
                            MASUKKAN KERANJANG
                        </button>
                        <button class="bg-[#DC0000] text-white py-1 px-4 rounded-md">
                            BELI SEKARANG
                        </button>
                    </div>

                    <div class="mt-5">
                        <h1 class="text-[#850000]">TOKO:</h1>
                        <div class="flex items-center gap-3 my-3">
                            <img src="{{ asset('storage/' . $detailProduk->User->FotoProfil) }}" alt=""
                                class="w-[5vw] h-[5vw] rounded-full">
                            <div>
                                <h1 class="text-xl font-black">{{ $detailProduk->User->Nama }}</h1>
                                <div class="flex gap-3">
                                    <a href="/chat"
                                        class="text-decoration-none border-2 text-[#850000] rounded-md border-[#850000] py-1 px-3 bg-white">
                                        Chat
                                    </a>
                                    <a href="/konsumen/toko/{{ $detailProduk->User->IdUser }}"
                                        class="text-decoration-none border-2 text-[#850000] rounded-md border-[#850000] py-1 px-3 bg-white">
                                        Lihat Toko
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function addAmount() {
            var amount = document.getElementById('Qty');
            if (amount.value != amount.max) {
                amount.value++;
            }
        };

        function reduceAmount() {
            var amount = document.getElementById('Qty');
            if (amount.value != amount.min) {
                amount.value--;
            }
        };

        $(document).ready(function() {

            function loadCart() {
                $.ajax({
                    method: "GET",
                    url: "/loadCartCount",
                    success: function(response) {
                        // alert(response.count);
                        $('.cartCount').html(response.count);
                    }
                });
            }

            $('.addtocart').click(function(e) {
                e.preventDefault();

                var IdProduk = $(this).closest('.DataProduk').find('#IdProduk').val();
                var IdAcara = $(this).closest('.DataProduk').find('#IdAcara').val();
                var Qty = $(this).closest('.DataProduk').find('#Qty').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "/konsumen/addtocart",
                    data: {
                        'IdProduk': IdProduk,
                        'Qty': Qty,
                        'IdAcara': IdAcara
                    },
                    success: function(response) {
                        alert(response.status);
                        loadCart();
                    }
                })
            });
        });
    </script>
@endsection
