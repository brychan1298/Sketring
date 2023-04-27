@extends('umkm.layouts.master')
@section('title', 'Tarik Saldo Konsumen')
@section('description', 'Halaman Tarik Saldo Konsumen')
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
</style>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

<div class="container m-auto mt-[100px]">
    <div class="judulAddProduk flex items-center justify-center">
        <a href="">
            <svg class="w-10 h-10" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000">
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
        <h2 class="textJudul text-4xl font-black">Tarik Saldo</h2>
    </div>

    <hr class="my-8">

    <div class="flex justify-center">
        <div class="relative btn-container bal flex w-1/6 items-center justify-center" x-data="{ show: true }">
            <h1 class="font-bold text-[#850000] text-xl">Rp</h1>
            <h1 class="money text-[#850000] text-4xl px-2" :type="show ? 'password' : 'text'">35.000</h1>
            {{-- <div class="rounded-full bg-[#BEBEBE] w-fit p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5Z"/></svg>
            </div> --}}
            <div class="absolute flex items-center right-0 rounded-full bg-[#BEBEBE] w-fit p-1 leading-5">

                <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                  :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                  viewbox="0 0 576 512">
                  <path fill="currentColor"
                    d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                  </path>
                </svg>

                <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                  :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                  viewbox="0 0 640 512">
                  <path fill="currentColor"
                    d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                  </path>
                </svg>

            </div>
        </div>
    </div>

    <div class="mx-32 pb-6">
        <h1 class="mt-16 text-2xl">Debit</h1>
        <hr class="h-px my-3 bg-gray-500 border-0">
    </div>
</div>
@endsection
