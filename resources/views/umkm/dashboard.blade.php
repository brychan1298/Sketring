@extends('umkm.layouts.master')
@section('title', 'UMKM Dashboard')
@section('description', 'Halaman Dashboard UMKM')
@section('content')
    <style>
        .pagination {
            color: #850000;
        }

        @media(max-width: 767px) {
            /* .tambahProduk {
                    width: 85vw;
                } */

            .konten {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .produksatu {
                width: 85vw;
            }
        }

        #addButton {
            transition: transform .2s ease-in-out;
        }

        #addProduct:hover>#addButton {
            transform: rotate(90deg) scale(1.2);
        }
    </style>

    <div class="container px-[8vw] mx-auto mt-32">
        <div class="mb-3">
            <div class="relative flex flex-wrap items-stretch w-full mb-4">
                <input type="search" id="search"
                    class="bg-[#EBEBEB] relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                    placeholder="Cari produk yang anda inginkan.." aria-label="Search" aria-describedby="button-addon1" />

                <!--Search button-->
                <button
                    class="bg-[#850000] relative z-[2] flex items-center rounded-r px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                    type="button" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#FFFFFF" class="w-5 h-5">
                        <path fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        <div id="produk">
            @include('umkm.data-dashboard', ['produks' => $produks])
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "/umkm/search",
                    type: "GET",
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#produk').html(data);
                    }
                })
            })
        })
    </script>
@endsection
