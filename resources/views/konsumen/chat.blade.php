@extends('konsumen.layouts.master')
@section('title', 'Chat')
@section('description', 'Halaman Chat')
@section('content')

<style>

</style>

<div class="container mx-auto">
    <div class="px-10 py-24 max-md:py-16">
        <a href="/">
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
        <div class="flex h-[750px] max-md:h-[510px] antialiased text-gray-800 border-4 border-solid border-[#850000] rounded-xl mt-6">
            <div class="flex flex-row w-full h-full overflow-hidden">
                {{-- kotak kiri --}}
                <div class="flex flex-col flex-shrink-0 hidden w-1/4 px-4 py-8 overflow-y-auto border-r-2 lg:block h-[97%]">
                    <div class="flex flex-row items-center justify-center">
                        <input type="text" placeholder="Cari..." class="w-full px-4 py-2 text-lg border border-gray-400 border-solid rounded-md">
                    </div>
                    <div class="mt-8 mb-5 border border-gray-300 border-solid line"></div>
                    <div class="flex flex-col">
                        <div class="flex flex-col -mx-2 space-y-1">
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Halo, jadi gimana kak?</p>
                                </div>
                                <div class="ml-auto notif">
                                    <span class="flex justify-center w-6 h-6 text-white bg-red-500 rounded-full">3</span>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Halo, jadi gimana kak?</p>
                                </div>
                                <div class="ml-auto notif">
                                    <span class="flex justify-center w-6 h-6 text-white bg-red-500 rounded-full">3</span>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold">Natfood Catering</h1>
                                    <p class="text-sm text-left text-gray-500">Iya min seperti itu..</p>
                                </div>
                            </button>
                            {{-- <div class="my-8 border border-gray-300 border-solid line"></div> --}}
                        </div>
                    </div>
                </div>

                {{-- kotak kanan | message --}}
                <div class="flex flex-col flex-auto h-full">
                    <div class="flex flex-col flex-auto flex-shrink-0 h-full p-4 rounded-2xl">
                        {{-- Header --}}
                        <div class="flex items-center justify-between px-3 py-2 border-b-2 bg-grey-lighter">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="images/natfood.png"/>
                                </div>
                                <div class="ml-4">
                                    <p class="text-2xl font-semibold max-md:text-lg">
                                        Natfood Catering
                                    </p>
                                </div>
                            </div>
                        </div>
                        {{-- Content --}}
                        <div class="relative h-full mb-10">
                            <div class="flex flex-col h-full">
                                <div class="flex justify-center mt-3">
                                    <div class="px-4 py-2 rounded bg-[#e9e9e9]">
                                        <p class="text-sm">
                                            Hari Ini
                                        </p>
                                    </div>
                                </div>
                                <div class="absolute bottom-0 grid w-full grid-cols-12 gap-5">
                                    <div class="col-start-1 col-end-8 mb-8 ml-3 rounded-lg max-md:mb-12 max-sm:mb-8">
                                        <div class="flex flex-row items-center">
                                            <div class="relative px-4 py-2 ml-3 text-sm bg-gray-200 shadow rounded-xl">
                                                <div class="text-lg max-md:text-base">Kak jadi kah pesanannya?</div>
                                                    <div class="absolute bottom-0 right-0 mr-2 -mb-8 text-base text-gray-500 max-md:text-sm">
                                                        09.30 | Hari ini
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full col-start-6 col-end-13 mb-8 mr-3 rounded-lg max-md:mb-12 max-sm:mb-2">
                                        <div class="flex flex-row-reverse items-center justify-start">
                                            <div class="relative px-4 py-2 mr-3 text-sm bg-[#850000] text-white shadow rounded-xl">
                                                <div class="text-lg max-md:text-base">
                                                    Iya min seperti itu..
                                                </div>
                                                <div class="absolute bottom-0 left-0 mr-2 -mb-8 text-base text-gray-500 max-md:text-sm">
                                                    12.30 | Hari ini
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row items-center w-full h-16 px-4 rounded-xl">
                            <div class="flex-grow ml-4">
                                <div class="relative w-full">
                                    <textarea name="kotakPesan" placeholder="Ketik Pesan..." class="flex w-full h-12 pt-2 pl-4 border-2 border-gray-300 resize-none max-sm:text-xs rounded-xl focus:outline-none focus:border-gray-500"/></textarea>
                                    <button class="absolute top-0 right-0 flex items-center justify-center w-12 h-full text-gray-400 hover:text-gray-600">
                                    </button>
                                </div>
                            </div>
                            <div class="ml-4">
                                <button class="flex items-center flex-shrink-0 py-1 justify-centerpx-4">
                                    <span class="ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="#850000" d="M2.01 21L23 12L2.01 3L2 10l15 2l-15 2z"/></svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
