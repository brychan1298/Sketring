@extends('umkm.layouts.master')
@section('title','UMKM Dashboard')
@section('description','Halaman Dashboard UMKM')
@section('content')
<style>
    .pagination{
        color: #850000;
    }
    
    .tambahProduk{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="container m-auto mt-[100px]">
    <div class="mb-3">
        <div class="relative mb-4 flex w-full flex-wrap items-stretch">
          <input
            type="search"
            class="bg-[#EBEBEB] relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
            placeholder="Cari produk yang anda inginkan.."
            aria-label="Search"
            aria-describedby="button-addon1" />

          <!--Search button-->
          <button
            class="bg-[#850000] relative z-[2] flex items-center rounded-r px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
            type="button"
            id="button-addon1"
            data-te-ripple-init
            data-te-ripple-color="light">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              fill="#FFFFFF"
              class="h-5 w-5">
              <path
                fill-rule="evenodd"
                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                clip-rule="evenodd" />
            </svg>
          </button>
        </div>
    </div>

    <div class="grid grid-cols-4 gap-20 mt-12">
        <button class="bg-[#EBEBEB] rounded-md shadow-3xl tambahProduk">
            <svg version="1.1" id="Capa_1"
            class="h-20 w-20"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 50 50" xml:space="preserve"
            fill="#000000">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <circle style="fill:#850000;" cx="25" cy="25" r="25"></circle>
                <line style="fill:none;stroke:#FFFFFF;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" x1="25" y1="13" x2="25" y2="38"></line>
                <line style="fill:none;stroke:#FFFFFF;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" x1="37.5" y1="25" x2="12.5" y2="25"></line> </g>
            </svg>
            <h1 class="font-bold my-5 text-[#850000] text-2xl">Tambah Produk</h1>
        </button>

        <div class="rounded-md shadow-3xl">
            <img src="images/secure.png" alt="" class="w-[12vw] h-[12vw]">
            <div class="p-4">
                <h1 class="font-bold my-1">Paket Nasi Hainam</h1>
                <p class="font-normal text-xs mt-3">Sebuah paket nasi dengan ayam dan hainam</p>
                <div class="flex justify-between mt-4">
                    <h1 class="text-[#850000] text-sm">
                        Rp 35000
                    </h1>
                </div>
                <a href="#">
                    <button class="bg-[#850000] text-white py-2 px-10 rounded-md mt-4">
                        Edit
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="pagination mt-20 justify-center items-center flex">
        <nav aria-label="Page navigation example">
            <ul class="list-style-none flex">
              <li>
                <a
                  class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-red-600 transition-all duration-300 hover:bg-red-200 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                  href="#"
                  aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li>
                <a
                  class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-red-600 transition-all duration-300 hover:bg-red-200 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                  href="#"
                  >1</a
                >
              </li>
              <li aria-current="page">
                <a
                  class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-red-600 transition-all duration-300 hover:bg-red-200 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                  href="#"
                  >2</a
                >
              </li>
              <li>
                <a
                  class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-red-600 transition-all duration-300 hover:bg-red-200 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                  href="#"
                  >3</a
                >
              </li>
              <li>
                <a
                  class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-red-600 transition-all duration-300 hover:bg-red-200 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                  href="#"
                  aria-label="Next"
                  ><span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
        </nav>
    </div>
</div>

@endsection
