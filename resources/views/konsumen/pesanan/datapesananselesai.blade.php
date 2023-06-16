@foreach ($ListTransaksi as $Transaksi => $items)
    <h1 class="text-xl text-[#850000]">
        Transaksi #{{ $Transaksi }}
    </h1>
    <div class="mb-10">
        @foreach ($items as $item)
            <div href="#" class="flex flex-row justify-between w-[100%] p-[1vw] items-center">
                {{-- Left hug content --}}
                <div class="flex flex-row w-max gap-[0.5vw]">
                    <img class="w-[5vw] h-[5vw] rounded-[10px]" src="{{ asset('storage/' . $item->FotoProduk) }}"
                        alt="">
                    <div class="flex flex-col w-max text-[#850000] ">
                        <p class="font-bold">{{ $item->Nama }} ({{ $item->Qty }})</p>
                        <p>Keranjang: {{ $item->NamaAcara }}</p>
                        <p class="text-sm">
                            Keterangan:
                            @if ($item->Status == 6)
                                Pesanan telah anda terima
                            @endif
                        </p>
                    </div>
                </div>
                {{-- Right hug content --}}
                <div class="flex flex-col w-max items-end gap-[0.5vw]">
                    <div class="flex flex-row w-max gap-[1vw] font-bold">
                        <button type="submit"
                            class="text-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                            DETAIL
                        </button>
                        <a href="/konsumen/chat/{{ $item->IdToko }}"
                            class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                            CHAT
                        </a>
                    </div>
                    <p class="text-[#DC0000] text-sm underline">
                        {{-- <a href="">
                            Beri Rating >>
                        </a> --}}
                        @if ($item->statusRated == 0)
                            <button data-modal-target="defaultModal" id="beriRating" data-modal-toggle="defaultModal"
                                class="berirating block text-[#DC0000] bg-white font-medium rounded-lg text-sm px-0 py-0 text-center"
                                type="button">
                                Beri Rating >>
                            </button>
                        @elseif($item->statusRated == 1)
                            <button data-modal-target="defaultModal" id="beriRating" data-modal-toggle="defaultModal"
                                class="berirating hidden text-[#DC0000] bg-white font-medium rounded-lg text-sm px-0 py-0 text-center"
                                type="button">
                                Beri Rating >>
                            </button>
                        @endif
                        <!-- Main modal -->
                    <div id="defaultModal" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%)] max-h-full bg-[#00000050]">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Terms of Service
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="defaultModal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                {{-- <form method="POST" action="/rating/{{ $item->id }}">
                                        @csrf
                                        @method('PUT') --}}
                                {{-- <form action="/rating/{{ $item->Id }}" method="POST"> --}}
                                <div class="p-6 space-y-6 flex flex-col items-center">
                                    <p>How was the Food?</p>
                                    {{--  hover:text-yellow-500 --}}
                                    <div class="flex space-x-3 z-50 tes">
                                        @csrf
                                        <svg id="star-1" class="star-svg w-12 h-12 text-gray-500 p-0"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg id="star-2" class="star-svg w-12 h-12 text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg id="star-3" class="star-svg w-12 h-12 text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg id="star-4" class="star-svg w-12 h-12 text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg id="star-5" class="star-svg w-12 h-12 text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <input type="hidden" name="produkId" id="idProdukSelected"
                                            value="{{ $item->IdProduk }}">
                                        <input type="hidden" name="transaksiId" id="idTransaksiSelected" class="list"
                                            value="{{ $item->Id }}">
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex flex-col items-center w-[100%] p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <div class="flex flex-row items-center gap-4">
                                        <button data-modal-hide="defaultModal" type="button"
                                            class="rateBtn text-white bg-[#DC0000] hover:bg-[#850000] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Rate
                                        </button>
                                        <button data-modal-hide="defaultModal" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                                {{-- </form> --}}

                            </div>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
            <div class="w-full h-[2px] bg-[#850000]"></div>
        @endforeach
    </div>
    {{-- <div class="flex flex-col w-max items-end gap-[0.5vw] justify-center my-5">
        <div class="flex flex-row w-max gap-[1vw] font-bold">
            <a href="/konsumen/detailTransaksi/{{ $Transaksi }}"
                class="text-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                Detail
            </a>
            <a href=""
                class="text-white bg-[#DC0000] border border-2 border-[#DC0000] px-[1vw] py-[0.5vw] text-sm rounded-md">
                Bayar
            </a>
        </div>
        <p class="text-[#DC0000] text-sm">Keterangan: Belum Bayar</p>
    </div> --}}
@endforeach
