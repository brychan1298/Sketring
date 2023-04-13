@extends('layouts.navbar')

@section('content')
<div class="container-md">
    <div class="py-24 px-10">
        <div class="content_VirtualAccount">
            <a href="/">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#850000" class="w-9 h-9 stroke-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            {{-- Title --}}
            <p class="text-5xl font-bold mb-16 text-center">Pembayaran</p>
            <div class="my-5 border border-solid border-gray-500 mb-16"></div>
            {{-- Content --}}
            <p class="text-3xl font-bold text-center">Terima Kasih Telah Berbelanja di S’ketring</p>
            <p class="text-3xl mt-14 text-center">Silahkan lakukan pembayaran melalui No. Virtual Account berikut ini :</p>
            <div class="container bg-[#FFE6AE] md:w-1/4 border-2 border-[#850000] mx-auto mt-14 h-14 flex justify-center items-center">
                <p class="text-2xl">123813139083821</p>
            </div>
            <p class="text-3xl mt-14 text-center text-[#DC0000]">Bayar sebelum: 18 April 2023</p>

            {{-- Button --}}
            <div class="mt-14 flex justify-center">
                <a href="#" class="bg-[#DC0000] py-5 px-10 text-white font-bold uppercase text-2xl rounded hover:bg-[#850000] hover:text-light text-center">Konfirmasi Pembayaran</a>
            </div>
        </div>
    {{-- </div> --}}
</div>
@endsection
