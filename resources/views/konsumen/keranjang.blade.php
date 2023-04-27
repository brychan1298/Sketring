@extends('konsumen.layouts.master')
@section('title', 'Keranjang')
@section('description', 'Halaman Keranjang')
@section('content')
    <div class="container m-auto items-start">
        <div class="mt-[100px] grid grid-cols-3 border-b-2 pb-5">
            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z"
                    fill="#850000" />
            </svg>
            <h1 class="text-center font-bold text-2xl">Semua Produk</h1>
            <h1>

            </h1>
        </div>
        <div class="container flex mt-8 gap-7">
            <div class="w-3/4">
                @foreach ($listAcara as $acaras => $items)
                    <div class="px-10 bg-[#D9D9D9] rounded mb-10">
                        <div class="flex items-center -mx-8 px-6 py-5 border-b-2">
                            <div class="flex w-2/5">
                                <input type="checkbox" class="w-4 h-4 mr-4">
                                <h1 class="ml-5">{{ $acaras }}</h1>

                            </div>
                        </div>
                        @foreach ($items as $KeranjangItems)
                            <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5 border-b-2 ProductData">
                                <input type="hidden" name="IdProduk" value="{{ $KeranjangItems->IdKeranjang }}" class="IdKeranjang">
                                <div class="flex w-2/5 items-center">
                                    <input type="checkbox" class="w-4 h-4 mr-4">
                                    <div class="">
                                        <img class="w-24 h-24 object-contain"
                                            src="{{ asset('storage/' . $KeranjangItems->FotoProduk) }}" alt="">
                                    </div>
                                    <div class="flex flex-col justify-between ml-4">
                                        <p>{{ $KeranjangItems->Nama }}</p>
                                    </div>
                                </div>
                                <div class="flex justify-center w-1/5">
                                    <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                                        <path
                                            d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                    </svg>

                                    <input class="mx-2 border text-center w-8" type="text"
                                        value="{{ $KeranjangItems->Qty }}">

                                    <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                                        <path
                                            d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                    </svg>
                                </div>
                                <span class="text-center w-1/5 font-semibold text-sm">{{ $KeranjangItems->Harga }}</span>
                                <svg class="text-center w-1/5 font-semibold text-sm cursor-pointer deleteCart" width="28" height="29"
                                    viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.68114 1.52061L8.25175 2.31539H2.52656C1.47098 2.31539 0.618164 3.11017 0.618164 4.09391C0.618164 5.07766 1.47098 5.87244 2.52656 5.87244H25.4273C26.4829 5.87244 27.3357 5.07766 27.3357 4.09391C27.3357 3.11017 26.4829 2.31539 25.4273 2.31539H19.7021L19.2727 1.52061C18.9507 0.914802 18.2887 0.536865 17.5671 0.536865H10.3868C9.66516 0.536865 9.00318 0.914802 8.68114 1.52061ZM25.4273 7.65096H2.52656L3.79087 26.4922C3.88629 27.8983 5.13868 28.9932 6.64751 28.9932H21.3064C22.8152 28.9932 24.0676 27.8983 24.163 26.4922L25.4273 7.65096Z"
                                        fill="#888888" />
                                </svg>
                            </div>
                        @endforeach

                    </div>
                @endforeach
            </div>
            {{-- <div class="w-3/4">
                <div class="px-10 bg-[#D9D9D9] rounded">
                    <div class="flex items-center -mx-8 px-6 py-5 border-b-2">
                        <div class="flex w-2/5">
                            <input type="checkbox">
                            <h1 class="ml-5">Toko Katering Damai</h1>
                        </div>
                    </div>

                    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5 border-b-2">
                        <div class="flex w-2/5 items-center">
                            <input type="checkbox">
                            <div class="w-20">
                                <img class="h-24" src="https://drive.google.com/uc?id=10ht6a9IR3K2i1j0rHofp9-Oubl1Chraw"
                                    alt="">
                            </div>
                            <div class="flex flex-col justify-between ml-4">
                                <p>Paket Nasi Hainam</p>
                            </div>
                        </div>
                        <div class="flex justify-center w-1/5">
                            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                                <path
                                    d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                            </svg>

                            <input class="mx-2 border text-center w-8" type="text" value="1">

                            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                                <path
                                    d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                            </svg>
                        </div>
                        <span class="text-center w-1/5 font-semibold text-sm">Rp 250.000</span>
                        <svg class="text-center w-1/5 font-semibold text-sm" width="28" height="29"
                            viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.68114 1.52061L8.25175 2.31539H2.52656C1.47098 2.31539 0.618164 3.11017 0.618164 4.09391C0.618164 5.07766 1.47098 5.87244 2.52656 5.87244H25.4273C26.4829 5.87244 27.3357 5.07766 27.3357 4.09391C27.3357 3.11017 26.4829 2.31539 25.4273 2.31539H19.7021L19.2727 1.52061C18.9507 0.914802 18.2887 0.536865 17.5671 0.536865H10.3868C9.66516 0.536865 9.00318 0.914802 8.68114 1.52061ZM25.4273 7.65096H2.52656L3.79087 26.4922C3.88629 27.8983 5.13868 28.9932 6.64751 28.9932H21.3064C22.8152 28.9932 24.0676 27.8983 24.163 26.4922L25.4273 7.65096Z"
                                fill="#888888" />
                        </svg>
                    </div>
                </div>

                <div class="px-10 bg-[#D9D9D9] rounded mt-7">
                    <div class="flex items-center -mx-8 px-6 py-5 border-b-2">
                        <div class="flex w-2/5">
                            <input type="checkbox">
                            <h1 class="ml-5">Toko Katering Damai</h1>
                        </div>
                    </div>

                    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5 border-b-2">
                        <div class="flex w-2/5 items-center">
                            <input type="checkbox">
                            <div class="w-20">
                                <img class="h-24" src="https://drive.google.com/uc?id=10ht6a9IR3K2i1j0rHofp9-Oubl1Chraw"
                                    alt="">
                            </div>
                            <div class="flex flex-col justify-between ml-4">
                                <p>Paket Nasi Hainam</p>
                            </div>
                        </div>
                        <div class="flex justify-center w-1/5">
                            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                                <path
                                    d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                            </svg>

                            <input class="mx-2 border text-center w-8" type="text" value="1">

                            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                                <path
                                    d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                            </svg>
                        </div>
                        <span class="text-center w-1/5 font-semibold text-sm">Rp 250.000</span>
                        <svg class="text-center w-1/5 font-semibold text-sm" width="28" height="29"
                            viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.68114 1.52061L8.25175 2.31539H2.52656C1.47098 2.31539 0.618164 3.11017 0.618164 4.09391C0.618164 5.07766 1.47098 5.87244 2.52656 5.87244H25.4273C26.4829 5.87244 27.3357 5.07766 27.3357 4.09391C27.3357 3.11017 26.4829 2.31539 25.4273 2.31539H19.7021L19.2727 1.52061C18.9507 0.914802 18.2887 0.536865 17.5671 0.536865H10.3868C9.66516 0.536865 9.00318 0.914802 8.68114 1.52061ZM25.4273 7.65096H2.52656L3.79087 26.4922C3.88629 27.8983 5.13868 28.9932 6.64751 28.9932H21.3064C22.8152 28.9932 24.0676 27.8983 24.163 26.4922L25.4273 7.65096Z"
                                fill="#888888" />
                        </svg>
                    </div>
                </div>
            </div> --}}



            <div id="summary" class="w-1/4">
                <div class="border-2 px-4 py-4 border-[#850000] rounded-2xl">

                    <h1 class="font-extrabold text-lg mb-5">
                        Ringkasan Belanja
                    </h1>

                    <div class="flex justify-between text-sm">
                        <div>
                            Total Harga (2 barang)
                        </div>
                        <div>
                            Rp 500.000
                        </div>
                    </div>
                    <div class="flex justify-between text-sm mt-3 pb-12 border-b-2 border-[#850000]">
                        <div>
                            Ongkos Kirim
                        </div>
                        <div>
                            Rp 30.000
                        </div>
                    </div>

                    <div class="flex justify-between text-sm mt-2 mb-9">
                        <div class="font-extrabold text-lg">
                            Total Harga
                        </div>
                        <div>
                            Rp 530.000
                        </div>
                    </div>

                    <button class="w-full bg-[#DC0000] text-white py-3 rounded-lg">
                        Beli (2)
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.deleteCart').click(function(e){
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var IdKeranjang = $(this).closest('.ProductData').find('.IdKeranjang').val();
                // alert(IdKeranjang);
                $.ajax({
                    method : "POST",
                    url : "/konsumen/deleteCart",
                    data : {
                        'IdKeranjang': IdKeranjang,
                    },
                    success: function(response){
                        // alert("tes");
                        window.location.reload();
                        alert(response.status);
                    }
                })

            })
        })
    </script>
@endsection
