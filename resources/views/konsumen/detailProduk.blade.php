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

    <div class="DataProduk  container px-[8vw] mx-auto mt-[152px] mb-[130px] flex gap-8">
        <div class="h-96 w-96 flex-shrink-0">
            <img class="block w-full h-full object-cover rounded-lg" src="{{ asset('storage/' . $detailProduk->FotoProduk) }}" alt="" >
        </div>
        <div class="py-8 w-full">
            <input type="hidden" name="IdProduk" id="IdProduk" class="IdProduk" value="{{ $detailProduk->IdProduk }}">
            <div>
                <h1 class="text-3xl font-black">
                    {{ $detailProduk->Nama }}
                </h1>
                <div class="flex flex-row w-full gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="#8F8F8F"
                            d="m12 18.275l-4.15 2.5q-.275.175-.575.15t-.525-.2q-.225-.175-.35-.438t-.05-.587l1.1-4.725L3.775 11.8q-.25-.225-.312-.513t.037-.562q.1-.275.3-.45t.55-.225l4.85-.425l1.875-4.45q.125-.3.388-.45t.537-.15q.275 0 .537.15t.388.45l1.875 4.45l4.85.425q.35.05.55.225t.3.45q.1.275.038.563t-.313.512l-3.675 3.175l1.1 4.725q.075.325-.05.588t-.35.437q-.225.175-.525.2t-.575-.15l-4.15-2.5Z" />
                    </svg>
                    <p>
                        @if ($detailProduk->Rating == 0)
                            N/A
                        @else
                            {{ $detailProduk->Rating }}
                        @endif
                    </p>
                </div>
                <h1 class="py-4 text-[#DC0000] text-2xl font-bold">
                    @currency($detailProduk->Harga)
                </h1>

                <p class="px-2 border-b-2 border-[#850000] text-[#850000] font-bold w-fit">
                    Deskripsi Produk
                </p>

                <p class="text-sm my-4 break-words">
                    {{ $detailProduk->Deskripsi }}
                </p>

                <div class="mt-8 border rounded-md w-fit px-4">
                    <div class="flex items-center gap-3 my-3">
                        <img src="{{ asset('storage/' . $detailProduk->User->FotoProfil) }}" alt=""
                            class="w-[5vw] h-[5vw] rounded-full">
                        <div>
                            <h1 class="text-xl font-black">{{ $detailProduk->User->Nama }}</h1>
                            <div class="statusBuka my-2 gap-2 px-3 py-px text-md w-fit h-fit text-green-900 bg-[#C8F8C8] font-bold rounded-full flex items-center">
                                <div class="w-[8px] h-[8px] bg-[#00880D] rounded-full"></div>
                                Buka
                            </div>
                            <div class="flex gap-3">
                                <a href="/konsumen/chat/{{ $detailProduk->IdUser }}"
                                    class="flex hover:bg-[#850000] hover:text-white gap-1 text-decoration-none border-2 text-[#850000] rounded-md border-[#850000] py-1 px-2 bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                                    </svg>
                                    Chat
                                </a>
                                <a href="/konsumen/toko/{{ $detailProduk->User->IdUser }}"
                                    class="text-decoration-none hover:bg-[#850000] hover:text-white border-2 text-[#850000] rounded-md border-[#850000] py-1 px-3 bg-white">
                                    Lihat Toko
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/2 px-6 border-2 pt-8 border-[#850000] rounded-2xl">
            <div class="font-bold text-lg pb-2">
                Pengiriman: DELIVERY
            </div>

            <div class="font-bold text-lg">
                Keranjang:
            </div>
            <select name="IdAcara" id="IdAcara" class="bg-[#FFF6C3] my-2 border border-[#FFDB89] text-[#850000] py-1 px-2 rounded-xl">
                <option value="0">Pilih Keranjang</option>
                @foreach ($keranjang as $keranjangs)
                    <option value="{{ $keranjangs->IdAcara }}">{{ $keranjangs->Nama }}</option>
                @endforeach
            </select>
            <p class="text-sm py-1 text-[#8F8F8F]">
                Notes : <br>
                Tambahkan keranjang apabila belum ada
            </p>

            <div class="font-bold text-lg mt-2">
                Jumlah:
            </div>
            <div class="">
                <div class="custom-number-input h-10 w-32">
                    <div class="flex flex-row border-2 border-[#850000] h-10 w-full rounded-xl relative bg-transparent mt-1">
                        <button id="minButton" onclick="reduceAmount()"
                            class="hover:bg-[#850000] bg-[#DC0000] text-white h-full w-20 rounded-l-lg cursor-pointer outline-none">
                            <span class="m-auto text-2xl font-thin">−</span>
                        </button>
                        <input type="number" id="Qty" value="{{ $detailProduk->MinOrder }}"
                            class="Qty  outline-none text-center focus:outline-none text-center w-full text-md "
                            name="Qty" min="{{ $detailProduk->MinOrder }}"
                            max="{{ $detailProduk->MaxOrder }}">
                        <button id="addButton" onclick="addAmount()"
                            class="hover:bg-[#850000] bg-[#DC0000] text-white h-full w-20 rounded-r-lg cursor-pointer">
                            <span class="m-auto text-2xl font-thin">+</span>
                        </button>
                    </div>
                </div>
                <div class="text-sm py-1 text-[#8F8F8F]">
                    minimum order : {{ $detailProduk->MinOrder }} <br>
                    maximum order : {{ $detailProduk->MaxOrder }}
                </div>
            </div>

            <div class="flex gap-3 mt-7 w-full font-black">
                <button class="addtocart bg-white border-2 border-[#DC0000] text-[#DC0000] hover:text-white hover:bg-[#DC0000] py-1 px-4 rounded-lg">
                    MASUKKAN KERANJANG
                </button>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')

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
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: response.status,
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: response.status,
                            })
                        }
                        loadCart();
                    }
                })
            });
        });
    </script>
@endsection
