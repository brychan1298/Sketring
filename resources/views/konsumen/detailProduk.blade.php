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

    {{-- <div class="DataProduk container px-[8vw] mx-auto mt-[152px] mb-[130px] flex gap-8">
        <div class="h-96 w-96 flex-shrink-0">
            <img class="block w-full h-full object-cover rounded-lg" src="{{ asset('storage/' . $detailProduk->FotoProduk) }}" alt="" >
        </div>
        <div class=" w-full">
        <div class=" w-full">
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
                        @if ($detailProduk->User->FotoProfil)
                            <img src="{{ asset('storage/' . $detailProduk->User->FotoProfil) }}" alt="" class="w-[5vw] h-[5vw] rounded-full">
                        @else
                            <img src="/images/fotoprofile_default.png" alt="" class="w-[5vw] h-[5vw] rounded-full">
                        @endif
                        @if ($detailProduk->User->FotoProfil)
                            <img src="{{ asset('storage/' . $detailProduk->User->FotoProfil) }}" alt="" class="w-[5vw] h-[5vw] rounded-full">
                        @else
                            <img src="/images/fotoprofile_default.png" alt="" class="w-[5vw] h-[5vw] rounded-full">
                        @endif
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
        <div class="w-1/2 px-6 border-2 h-fit py-8 max-2xl:absolute max-2xl:bottom-0 max-2xl:bg-white max-2xl:flex max-2xl:w-full max-2xl:flex-row border-[#850000] rounded-2xl">
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
                <div class="custom-number-input w-32">
                    <div class="flex flex-row border-2 border-[#850000] h-10 w-full relative bg-transparent">
                        <button id="minButton" onclick="reduceAmount()"
                            class="bg-[#850000] text-white h-full w-20 cursor-pointer outline-none">
                            <span class="m-auto text-2xl font-thin">−</span>
                        </button>
                        <input type="number" id="Qty" value="{{ $detailProduk->MinOrder }}"
                            class="Qty  outline-none text-center focus:outline-none text-center w-full text-md "
                            name="Qty" min="{{ $detailProduk->MinOrder }}"
                            max="{{ $detailProduk->MaxOrder }}">
                        <button id="addButton" onclick="addAmount()"
                            class="bg-[#850000] text-white h-full w-20 cursor-pointer">
                            <span class="m-auto text-2xl font-thin">+</span>
                        </button>
                    </div>
                </div>
                <div class="text-sm py-1 text-[#8F8F8F]">
                    minimum order : {{ $detailProduk->MinOrder }} <br>
                    maximum order : {{ $detailProduk->MaxOrder }}
                </div>
            </div>

            <div class="mt-6 w-full font-black">
                <button class=" addtocart bg-white border-2 border-[#DC0000] text-[#DC0000] py-1 px-4 rounded-lg">

                    MASUKKAN KERANJANG
                </button>
            </div>
        </div>
    </div> --}}

    <div class="DataProduk container px-[8vw] mx-auto mt-[152px] mb-[130px] ">
        <div class=" flex gap-14 max-md:flex-col">
            <div class="h-[400px] w-[400px] flex-shrink-0">
                <img class="block w-full h-full object-cover rounded-lg" src="{{ asset('storage/' . $detailProduk->FotoProduk) }}" alt="" >
            </div>
            <div class="w-full ">
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


                    <div class="my-3">
                        <h1 class="py-2 text-[#DC0000] text-2xl font-bold">
                            @currency($detailProduk->Harga)
                        </h1>
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
                        <p class="text-sm pb-1 pt-px text-[#8F8F8F]">
                            Notes : <br>
                            Tambahkan keranjang apabila belum ada
                        </p>

                        <div class="mt-2 flex items-center gap-2 max-lg:flex-col max-lg:items-start">
                            <p class="font-semibold text-lg">
                                Jumlah
                            </p>
                            <div class="custom-number-input w-32">
                                <div class="flex flex-row border-2 border-[#850000] h-10 w-full relative bg-transparent">
                                    <button id="minButton" onclick="reduceAmount()"
                                        class="bg-[#850000] text-white h-full w-20 cursor-pointer outline-none">
                                        <span class="m-auto text-2xl font-thin">−</span>
                                    </button>
                                    <input type="number" id="Qty" value="{{ $detailProduk->MinOrder }}"
                                        class="Qty  outline-none text-center focus:outline-none text-center w-full text-md "
                                        name="Qty" min="{{ $detailProduk->MinOrder }}"
                                        max="{{ $detailProduk->MaxOrder }}">
                                    <button id="addButton" onclick="addAmount()"
                                        class="bg-[#850000] text-white h-full w-20 cursor-pointer">
                                        <span class="m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div>
                            </div>
                            <div class="text-sm w-full font-normal text-[#8F8F8F]">
                                minimum order : {{ $detailProduk->MinOrder }} <br>
                                maximum order : {{ $detailProduk->MaxOrder }}
                            </div>
                        </div>

                        <div class="mt-6 w-full font-black">
                            <button class="addtocart flex gap-3 items-centeraddtocart bg-white border-2 border-[#DC0000] text-[#DC0000] py-1 px-4 rounded-lg">
                                <svg class="mt-px max-lg:hidden max-md:block" width="20px" height="21px" viewBox="0 0 20 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Rounded" transform="translate(-441.000000, -155.000000)">
                                            <g id="Action" transform="translate(100.000000, 100.000000)">
                                                <g id="-Round-/-Action-/-add_shopping_cart" transform="translate(340.000000, 54.000000)">
                                                    <g transform="translate(0.000000, 0.000000)">
                                                        <polygon id="Path" points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M12,9 C12.55,9 13,8.55 13,8 L13,6 L15,6 C15.55,6 16,5.55 16,5 C16,4.45 15.55,4 15,4 L13,4 L13,2 C13,1.45 12.55,1 12,1 C11.45,1 11,1.45 11,2 L11,4 L9,4 C8.45,4 8,4.45 8,5 C8,5.55 8.45,6 9,6 L11,6 L11,8 C11,8.55 11.45,9 12,9 Z M7,18 C5.9,18 5.01,18.9 5.01,20 C5.01,21.1 5.9,22 7,22 C8.1,22 9,21.1 9,20 C9,18.9 8.1,18 7,18 Z M17,18 C15.9,18 15.01,18.9 15.01,20 C15.01,21.1 15.9,22 17,22 C18.1,22 19,21.1 19,20 C19,18.9 18.1,18 17,18 Z M8.1,13 L15.55,13 C16.3,13 16.96,12.59 17.3,11.97 L20.68,5.84 C20.95,5.36 20.77,4.75 20.29,4.48 C19.81,4.22 19.2,4.39 18.94,4.87 L15.55,11 L8.53,11 L4.54,2.57 C4.38,2.22 4.02,2 3.64,2 L2,2 C1.45,2 1,2.45 1,3 C1,3.55 1.45,4 2,4 L3,4 L6.6,11.59 L5.25,14.03 C4.52,15.37 5.48,17 7,17 L18,17 C18.55,17 19,16.55 19,16 C19,15.45 18.55,15 18,15 L7,15 L8.1,13 Z" id="🔹Icon-Color" fill="#ed0800"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                MASUKKAN KERANJANG
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div>
            <div class="mt-8 border rounded-md px-4">
                <div class="flex items-center gap-3 my-3">
                    @if ($detailProduk->User->FotoProfil)
                        <img src="{{ asset('storage/' . $detailProduk->User->FotoProfil) }}" alt="" class="w-[5vw] h-[5vw] rounded-full">
                    @else
                        <img src="/images/fotoprofile_default.png" alt="" class="w-[5vw] h-[5vw] rounded-full">
                    @endif
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

            <p class="px-2 mt-8 border-b-2 text-lg border-[#850000] text-[#850000] font-bold w-fit">
                Deskripsi Produk
            </p>

            <p class="text-md my-4 break-words text-justify">
                {{ $detailProduk->Deskripsi }}
            </p>
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
