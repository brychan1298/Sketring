@extends('konsumen.layouts.master')
@section('title', 'Virtual Account')
@section('description', 'Halaman Virtual Account')
@section('content')
    <style>
        #loader {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: 120px;
            height: 120px;
            margin: auto;
            border: 16px solid #850000;
            border-radius: 50%;
            border-top: 16px solid #b6b6b6;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
        }

        #myDiv {
            /* visibility: hidden; */
            display: none;
            text-align: center;
        }
    </style>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client--BKo6w-_jm1pdVFw"></script>
    <div class="container flex flex-col w-full mx-auto mt-36 max-sm:mt-12 px-36 max-lg:px-8">
        <div class="">
            <div class="content_VirtualAccount">
                <div class="inline-flex w-full max-sm:pt-16">
                    <a href="/">
                        <svg class="w-10 h-10 max-md:w-8" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000">
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
                    <h1 class="w-full mx-auto text-4xl font-bold text-center mx-automb-8 max-md:text-2xl">Pembayaran</h1>
                </div>
                <div class="mt-5 mb-16 border border-gray-500 border-solid max-md:mb-10"></div>
                {{-- Title --}}
                @foreach ($ListProduks as $acaras => $items)
                    {{-- Content --}}
                    <p class="mb-8 text-2xl text-center max-md:text-xl">Terima Kasih Telah Berbelanja di S’ketring</p>
                    {{-- <p class="mb-8 text-2xl text-center max-md:text-xl">Silahkan lakukan pembayaran sampai batas waktu (?)</p> --}}
                    {{-- <div class="w-full"> --}}
                    @foreach ($items as $listBarang)
                    <input type="checkbox" name="listIdKeranjang[]" checked value="{{$listBarang->IdKeranjang}}" class="hidden" id="">
                    @endforeach
                    {{-- </div> --}}
                    <p class="mb-8 text-2xl max-md:text-xl text-center text-[#DC0000]">Silahkan lakukan pembayaran sebelum: {{$TanggalBesokFinal}}</p>
                    <p class="text-2xl font-bold text-center max-md:text-xl">Total Harga: @currency($listBarang->Harga * $listBarang->Qty + 30000)</p>
                @endforeach
                    {{-- Button --}}
                    {{-- <div class="flex justify-center mt-16">
                        <form action="/konsumen/bayarselesai" method="POST" id="bayar" onsubmit="submitForm(event)">
                            @csrf
                            <input type="hidden" name="IdTransaksi" value="{{$IdTransaksi}}">
                            <button type="submit" data-modal-target="staticModal" data-modal-toggle="staticModal"
                                class="block  bg-[#DC0000] p-4 text-white font-bold uppercase text-xl max-md:text-base rounded hover:bg-[#850000] hover:text-light text-center"
                                type="button">
                                Konfirmasi Pembayaran
                            </button>
                        </form>
                    </div>
                    <button>
                        <svg class="-mt-6 max-lg:-mt-8 w-fit" xmlns="http://www.w3.org/2000/svg" width="42"
                            height="42" viewBox="0 0 24 24">
                            <g fill="none" stroke="#850000" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2">
                                <path d="M8 10a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2z" />
                                <path d="M16 8V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2" />
                            </g>
                        </svg>
                    </button> --}}
                </div>
                {{-- <p class="text-2xl max-md:text-xl text-center text-[#DC0000]">Bayar sebelum: 18 April 2023</p> --}}
                {{-- Button --}}
                <div class="flex justify-center mt-10 max-sm:mb-10">
                    <form action="/konsumen/bayarselesai" method="POST" id="bayar" onsubmit="submitForm(event)">
                        @csrf
                        <input type="hidden" name="IdTransaksi" value="{{ $IdTransaksi }}">
                        {{-- <button id="pay-button" data-modal-target="staticModal" data-modal-toggle="staticModal"
                            class="block  bg-[#DC0000] p-6 text-white font-bold uppercase text-xl max-md:text-base rounded hover:bg-[#850000] hover:text-light text-center"
                            type="button">
                            Konfirmasi Pembayaran
                        </button> --}}
                        <button id="pay-button"
                            class="block  bg-[#DC0000] p-5 text-white font-bold uppercase text-xl max-md:text-base rounded hover:bg-[#850000] hover:text-light text-center"
                            type="button">
                            Konfirmasi Pembayaran
                        </button>
                    </form>
                </div>

                {{-- Pop Up --}}
                <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="fixed inset-0 top-0 left-0 right-0 z-50 hidden w-full max-h-full p-4 overflow-x-hidden overflow-y-auto bg-gray-500 bg-opacity-40">
                    <div id="loader"></div>
                    <div class="relative w-full max-w-2xl max-h-full" id="myDiv" class="animate-bottom">
                        <div class="relative rounded-lg shadow bg-[#F8CB66]">
                            <div class="p-6 space-y-6">

                                <div class="p-6 text-center">
                                    <h3 class="mb-16 text-4xl font-bold text-[#850000]">Pembayaran Berhasil</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-16" width="200"
                                        height="200" viewBox="0 0 512 512">
                                        <path fill="#850000"
                                            d="M460 160h-88v-12A116.13 116.13 0 0 0 258.89 32h-5.78A116.13 116.13 0 0 0 140 148v12H52a4 4 0 0 0-4 4v300a16 16 0 0 0 16 16h384a16 16 0 0 0 16-16V164a4 4 0 0 0-4-4Zm-280-11c0-41.84 33.41-76.56 75.25-77A76.08 76.08 0 0 1 332 148v12H180Zm156 187H176v-32h160Z" />
                                    </svg>
                                    <h6 class="mb-16 text-4xl font-bold text-[#850000]">Mohon Tunggu Sebentar</h6>
                                    {{-- <a href="/">
                                        <button data-modal-hide="popup-modal" type="button"
                                            class="text-white text-xl font-bold bg-[#DC0000] hover:bg-[#850000] focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 rounded-lg text-sm inline-flex items-center px-10 py-5 text-center">
                                            KEMBALI KE BERANDA
                                        </button>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script>
        // function submitForm(event) {
        //     myFunction();
        //     event.preventDefault();

        //     setTimeout(function() {
        //         document.getElementById("bayar").submit();
        //     }, 4000);
        // }

        // var myVar;

        // function myFunction() {
        //     myVar = setTimeout(showPage, 2000);
        // }

        // function showPage() {
        //     document.getElementById("loader").style.display = "none";
        //     document.getElementById("myDiv").style.display = "block";
        // }

        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("Pembayaran Berhasil!");
                    document.getElementById("bayar").submit();
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endsection
