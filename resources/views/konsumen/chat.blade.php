@extends('konsumen.layouts.master')

@section('content')
{{-- <div class="container-md">
    <div class="px-10 py-24">
        <div class="content_VirtualAccount">
            <a href="/">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#850000" class="stroke-2 w-9 h-9">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>

            <div class="container-md border-2 border-[#850000] mt-14 rounded flex">
                <div class="w-1/4 py-4 border kiri">
                    <div class="selimut ">
                        <div class="text-center kotakCari">
                            <input type="text" placeholder="Cari..." class="w-1/2 px-4 py-2 placeholder-gray-500 border border-gray-400 border-solid rounded-md sm:w-80 sm:placeholder-gray-400 lg:w-96 lg:placeholder-gray-300">
                        </div>
                        <div class="my-10 mb-16 border border-gray-200 border-solid"></div>
                        <p>yoooo</p>
                    </div>

                </div>
                <p>yeyyy</p>
            </div>

        </div>
    </div>
</div> --}}


<!-- component -->
<div class="container-md">
    <div class="px-10 py-24">
        <a href="/">
            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z" fill="#850000"/>
            </svg>
        </a>
        <div class="flex h-[35vw] antialiased text-gray-800 border-4 border-solid border-[#850000] rounded-xl mt-8">
            <div class="flex flex-row w-full h-full overflow-hidden">
                <div class="flex flex-col flex-shrink-0 w-1/6 h-full px-4 py-8 border-r-2">
                    <div class="flex flex-row items-center justify-center">
                        <input type="text" placeholder="Cari..." class="w-full px-4 py-2 text-lg border border-gray-400 border-solid rounded-md">
                    </div>
                    <div class="mt-8 mb-5 border border-gray-300 border-solid line"></div>
                    <div class="flex flex-col">
                        <div class="flex flex-col -mx-2 space-y-1 overflow-y-auto h-2/6">
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">
                                    Natfood Catering
                                </div>
                                <div class="ml-auto notif">
                                    <span class="flex justify-center w-6 h-6 text-white bg-red-500 rounded-full">3</span>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                                <div class="ml-auto notif">
                                    <span class="flex justify-center w-6 h-6 text-white bg-red-500 rounded-full">3</span>
                                </div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                    N
                                </div>
                                <div class="ml-2 text-lg font-semibold">Natfood Catering</div>
                            </button>
                            {{-- <div class="my-8 border border-gray-300 border-solid line"></div> --}}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col flex-auto h-full p-6">
                    <div
                    class="flex flex-col flex-auto flex-shrink-0 h-full p-4 bg-gray-100 rounded-2xl"
                    >
                    <div class="flex flex-col h-full mb-4 overflow-x-auto">
                        <div class="flex flex-col h-full">
                        <div class="grid grid-cols-12 gap-y-2">
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                            <div class="flex flex-row items-center">
                                <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full">
                                    A
                                </div>
                                <div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl">
                                    <div>Kak jadi kah pesanannya?</div>
                                </div>
                            </div>
                            </div>

                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                            <div class="flex flex-row-reverse items-center justify-start">
                                <div
                                class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full"
                                >
                                A
                                </div>
                                <div
                                class="relative px-4 py-2 mr-3 text-sm bg-indigo-100 shadow rounded-xl"
                                >
                                <div>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing. ?
                                </div>
                                <div
                                    class="absolute bottom-0 right-0 mr-2 -mb-5 text-xs text-gray-500"
                                >
                                    Seen
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="flex flex-row items-center w-full h-16 px-4 bg-white rounded-xl">
                        <div class="flex-grow ml-4">
                        <div class="relative w-full">
                            <input
                            type="text"
                            class="flex w-full h-10 pl-4 border rounded-xl focus:outline-none focus:border-indigo-300"
                            />
                            <button
                            class="absolute top-0 right-0 flex items-center justify-center w-12 h-full text-gray-400 hover:text-gray-600"
                            >
                            <svg
                                class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                            </button>
                        </div>
                        </div>
                        <div class="ml-4">
                        <button class="flex items-center flex-shrink-0 py-1 justify-centerpx-4">
                            <span class="ml-2">
                            {{-- <svg
                                class="w-4 h-4 -mt-px transform rotate-45"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                                ></path>
                            </svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><rect x="0" y="0" width="24" height="24" fill="none" stroke="none" class="w-16 h-16" /><path fill="#850000" d="M2.01 21L23 12L2.01 3L2 10l15 2l-15 2z"/></svg>
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
