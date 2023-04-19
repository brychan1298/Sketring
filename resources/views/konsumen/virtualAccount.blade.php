@extends('konsumen.layouts.master')
@section('title', 'Virtual Account')
@section('description', 'Halaman Virtual Account')
@section('content')
<div class="mx-auto container-md">
    <div class="px-10 py-24">
        <div class="content_VirtualAccount">
            <div class="w-full">
                <a href="/">
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z" fill="#850000"/>
                    </svg>
                </a>
            </div>
            {{-- Title --}}
            <h1 class="sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold mb-[3vw] text-center">Pembayaran</h1>
            <div class="my-5 border border-solid border-gray-500 mb-[3vw]"></div>
            {{-- Content --}}
            <p class="font-bold text-center sm:text-xl md:text-xl lg:text-2xl xl:text-3xl">Terima Kasih Telah Berbelanja di S’ketring</p>
            <p class="sm:text-xl md:text-xl lg:text-2xl xl:text-3xl mt-[2.5vw] text-center">Silahkan lakukan pembayaran melalui No. Virtual Account berikut ini :</p>
            <div class="container bg-[#FFE6AE] border-2 border-[#850000] mx-auto mt-[2.5vw] flex justify-center items-center w-fit h-full">
                <p class="sm:text-lg md:text-lg lg:text-xl xl:text-2xl px-[4vw] py-[1vw]">123813139083821</p>
            </div>
            <p class="sm:text-lg md:text-xl lg:text-2xl xl:text-3xl mt-[2.5vw] text-center text-[#DC0000]">Bayar sebelum: 18 April 2023</p>

            {{-- Button --}}
            <div class="mt-[2.5vw] flex justify-center">
                <button data-modal-target="staticModal" data-modal-toggle="staticModal" class="block  bg-[#DC0000] py-[1.5vw] px-[3vw] text-white font-bold uppercase sm:text-lg md:text-lg lg:text-xl xl:text-2xl rounded hover:bg-[#850000] hover:text-light text-center" type="button">
                    Konfirmasi Pembayaran
                </button>
            </div>

            {{-- Pop Up --}}
            <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed inset-0 top-0 left-0 right-0 z-50 hidden w-full max-h-full p-4 overflow-x-hidden overflow-y-auto bg-gray-500 bg-opacity-40">
                <div class="relative w-full max-w-2xl max-h-full">
                    <div class="relative rounded-lg shadow bg-[#F8CB66]">
                        <div class="p-6 space-y-6">
                            <div class="p-6 text-center">
                                <h3 class="mb-16 text-4xl font-bold text-[#850000]">Pembayaran Berhasil</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-16" width="200" height="200" viewBox="0 0 512 512"><path fill="#850000" d="M460 160h-88v-12A116.13 116.13 0 0 0 258.89 32h-5.78A116.13 116.13 0 0 0 140 148v12H52a4 4 0 0 0-4 4v300a16 16 0 0 0 16 16h384a16 16 0 0 0 16-16V164a4 4 0 0 0-4-4Zm-280-11c0-41.84 33.41-76.56 75.25-77A76.08 76.08 0 0 1 332 148v12H180Zm156 187H176v-32h160Z"/></svg>
                                <a href="/">
                                    <button data-modal-hide="popup-modal" type="button" class="text-white text-xl font-bold bg-[#DC0000] hover:bg-[#850000] focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 rounded-lg text-sm inline-flex items-center px-10 py-5 text-center">
                                        KEMBALI KE BERANDA
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
