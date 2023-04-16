@extends('konsumen.layouts.master')

@section('content')
<div class="container-md">
    <div class="py-24 px-10">
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
            <p class="sm:text-xl md:text-xl lg:text-2xl xl:text-3xl font-bold text-center">Terima Kasih Telah Berbelanja di S’ketring</p>
            <p class="sm:text-xl md:text-xl lg:text-2xl xl:text-3xl mt-[2.5vw] text-center">Silahkan lakukan pembayaran melalui No. Virtual Account berikut ini :</p>
            <div class="container bg-[#FFE6AE] border-2 border-[#850000] mx-auto mt-[2.5vw] flex justify-center items-center w-fit h-full">
                <p class="sm:text-lg md:text-lg lg:text-xl xl:text-2xl px-[4vw] py-[1vw]">123813139083821</p>
            </div>
            <p class="sm:text-lg md:text-xl lg:text-2xl xl:text-3xl mt-[2.5vw] text-center text-[#DC0000]">Bayar sebelum: 18 April 2023</p>

            {{-- Button --}}
            <div class="mt-[2.5vw] flex justify-center">
                <a href="#" class="bg-[#DC0000] py-[1.5vw] px-[3vw] text-white font-bold uppercase sm:text-lg md:text-lg lg:text-xl xl:text-2xl rounded hover:bg-[#850000] hover:text-light text-center">Konfirmasi Pembayaran</a>
            </div>
        </div>
    {{-- </div> --}}
</div>
@endsection
