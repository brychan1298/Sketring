@extends('umkm.layouts.master')
@section('title', 'Tarik Saldo UMKM')
@section('description', 'Halaman Tarik Saldo UMKM')
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

    .bal{
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Safari */
        -khtml-user-select: none; /* Konqueror HTML */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none; /* Non-prefixed version, currently supported by Chrome and Opera */
    }

    .money{
        font-weight: 900;
    }

    .bal .money{
        position:relative;
    }

    .bal .money.hide{
        visibility:hidden;
    }

    .bal .money.hide:after{
        content:'XXXXXX';
        position:absolute;
        left:0;
        visibility:visible;
    }
</style>

<script>
    // $(".btn-container.bal .fa-user, .btn-container.bal .money").click(function(){
    //     $(".btn-container.bal .money").toggleClass("hide");
    // });

    window.onload = function() {
        toggleBalance(document.getElementById("saldo").innerHTML);
    }

    function toggleBalance(a) {
        var x = document.getElementById("saldo");
        var button = document.getElementById("toggle-btn");
        if (x.innerHTML === "*****") {
            x.innerHTML = a;
        } else {
            x.innerHTML = "*****";
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="container px-[8vw] mx-auto mt-32">
    <div class="flex items-center justify-center judulAddProduk">
        <a href="/umkm/profileToko">
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
        <h2 class="text-4xl font-black max-md:text-2xl max-lg:text-3xl textJudul">Tarik Saldo</h2>
    </div>

    <hr class="my-8">

    <div class="flex justify-center">
        <div class="relative flex items-center justify-center w-1/2 btn-container bal" x-data="{ show: true }">
            <h1 class="money text-[#850000] text-3xl max-lg:text-2xl px-2" id="saldo">@currency(Auth::User()->Saldo)</h1>
            <button id="toggle-btn" onclick="toggleBalance('@currency(Auth::User()->Saldo)')">
                <svg class="h-6 text-gray-700 max-lg:h-4" fill="none" @click="show = !show"
                    :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                    viewbox="0 0 576 512">
                    <path fill="currentColor"
                    d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                    </path>
                </svg>

                <svg class="h-6 text-gray-700 max-lg:h-4" fill="none" @click="show = !show"
                    :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                    viewbox="0 0 640 512">
                    <path fill="currentColor"
                    d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <div class="pb-6">
        <h1 class="mt-16 text-2xl">Tarik Saldo</h1>
        <hr class="h-px my-3 bg-gray-500 border-0">

        <a href="/tarikDebitUMKM">
            <div class="debit bg-[#F3F3F3] shadow-md hover:shadow-lg my-5 py-2 pl-3 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none" stroke="#850000" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M17 10H7l3.438-3M7 14h10l-3.438 3"/></g></svg>
                <h1 class="px-2 text-xl font-meidum">Debit</h1>
            </div>
        </a>

        <a href="/tarikEmoneyUMKM">
            <div class="emoney bg-[#F3F3F3] shadow-md hover:shadow-lg my-5 py-2 pl-3 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 36 36"><path fill="#850000" d="M32 15h-1V9a1 1 0 0 0-1-1H6a1 1 0 0 1-1-.82v-.36A1 1 0 0 1 6 6h23.58a1 1 0 0 0 0-2H6a3 3 0 0 0-3 3a3.08 3.08 0 0 0 0 .36v20.57A4.1 4.1 0 0 0 7.13 32H30a1 1 0 0 0 1-1v-6h1a1 1 0 0 0 1-1v-8a1 1 0 0 0-1-1Zm-3 15H7.13A2.11 2.11 0 0 1 5 27.93V9.88A3.11 3.11 0 0 0 6 10h23v5h-7a5 5 0 0 0 0 10h7Zm2-7h-9a3 3 0 0 1 0-6h9Z" class="clr-i-outline clr-i-outline-path-1"/><circle cx="23.01" cy="20" r="1.5" fill="#850000" class="clr-i-outline clr-i-outline-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                <h1 class="px-2 text-xl font-meidum">E-Money</h1>
            </div>
        </a>
    </div>
</div>
@endsection
