@extends('layouts.navbar')

@section('content')
<div class="">
    <div id="" class="container-md mx-auto">
        <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80)">
            <div class="md:w-1/2 px-[5.5%]">
                <p class="font-bold text-sm uppercase">Selamat datang</p>
                <p class="text-7xl font-bold mt-4">Sketring</p>
                <p class="text-2xl mb-10 mt-10">Katering Andalanmu</p>
                <a href="#" class="bg-[#850000] py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</div>

<div class="container m-auto mt-[60px]">
    <div class="grid grid-cols-2 gap-x-20">
        <div>
            <div class="flex justify-between items-end">
                <h1 class="text-2xl font-bold">Rekomendasi Katering</h1>
                <a href="" class="text-[#850000] hover:underline">Lihat Semua</a>
            </div>
            <div class="flex mt-10 rounded-md shadow-3xl p-5 items-end justify-between">
                <div class="flex">
                    <img src="https://source.unsplash.com/120x120/?web-programming" class="rounded-md mr-5">
                    <div class="">
                        <p class="font-bold text-xl">Paket Nasi Hainam</p>
                        <div class="flex gap-2 mt-1">
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            <div class="font-light">Pt. NatFood</div>
                        </div>
                        <div class="flex gap-2 mt-1">
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            <div class="font-light">Pt. NatFood</div>
                        </div>
                        <div class="flex gap-2 mt-1">
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            <div class="font-light">Pt. NatFood</div>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="bg-[#850000] text-white px-5 py-2 rounded-md">
                        Lihat Detail
                    </button>
                </div>
            </div>

        </div>
        <div class="">
            <h1>Chat</h1>
        </div>
    </div>
</div>


<section id="" class="mt-[60px]">
    <div class="text-center">
        <p class="text-[#8f8f8f]">
            Selamat datang di
        </p>
        <p class="uppercase text-5xl mt-2">
            sketring
        </p>
        <p class="mx-[35%] mt-5">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem consequatur molestias dolorem dolores, maxime facilis expedita odit dolorum odio ipsam labore, impedit et, harum cum omnis a modi quas sit.
        </p>
    </div>
    <div class="container m-auto mt-[60px]">
        <div class="grid grid-cols-3">
            <div class="shadow-2xl rounded-md px-11 py-12">
                <div class="bg-[#DC0000] rounded-md bg-opacity-60 w-20 h-20 place-items-center mb-6 flex align-center">
                    <img src="images/secure.png" alt="" class="mx-auto w-8">
                </div>
                <h1 class="font-bold">Pembelian Terjamin Aman</h1>
                <p class="font-light mt-8">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem consequatur molestias dolorem dolores, maxime facilis expedita odit dolorum odio ipsam labore, impedit et, harum cum omnis a modi quas sit.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
