@extends('konsumen.layouts.master')
@section('title', 'Chat')
@section('description', 'Halaman Chat')
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
                {{-- kotak kiri --}}
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

                {{-- header --}}
                <div class="flex flex-row items-center justify-between px-3 py-2 bg-grey-lighter">
                    <div class="flex items-center">
                        <div>
                            <img class="w-10 h-10 rounded-full" src="https://darrenjameseeley.files.wordpress.com/2014/09/expendables3.jpeg"/>
                        </div>
                        <div class="ml-4">
                            <p class="text-grey-darkest">
                                New Movie! Expendables 4
                            </p>
                            <p class="mt-1 text-xs text-grey-darker">
                                Andrés, Tom, Harrison, Arnold, Sylvester
                            </p>
                        </div>
                    </div>

                    <div class="flex">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".5" d="M15.9 14.3H15l-.3-.3c1-1.1 1.6-2.7 1.6-4.3 0-3.7-3-6.7-6.7-6.7S3 6 3 9.7s3 6.7 6.7 6.7c1.6 0 3.2-.6 4.3-1.6l.3.3v.8l5.1 5.1 1.5-1.5-5-5.2zm-6.2 0c-2.6 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2 4.6-4.6 4.6z"></path></svg>
                        </div>
                        <div class="ml-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".5" d="M1.816 15.556v.002c0 1.502.584 2.912 1.646 3.972s2.472 1.647 3.974 1.647a5.58 5.58 0 0 0 3.972-1.645l9.547-9.548c.769-.768 1.147-1.767 1.058-2.817-.079-.968-.548-1.927-1.319-2.698-1.594-1.592-4.068-1.711-5.517-.262l-7.916 7.915c-.881.881-.792 2.25.214 3.261.959.958 2.423 1.053 3.263.215l5.511-5.512c.28-.28.267-.722.053-.936l-.244-.244c-.191-.191-.567-.349-.957.04l-5.506 5.506c-.18.18-.635.127-.976-.214-.098-.097-.576-.613-.213-.973l7.915-7.917c.818-.817 2.267-.699 3.23.262.5.501.802 1.1.849 1.685.051.573-.156 1.111-.589 1.543l-9.547 9.549a3.97 3.97 0 0 1-2.829 1.171 3.975 3.975 0 0 1-2.83-1.173 3.973 3.973 0 0 1-1.172-2.828c0-1.071.415-2.076 1.172-2.83l7.209-7.211c.157-.157.264-.579.028-.814L11.5 4.36a.572.572 0 0 0-.834.018l-7.205 7.207a5.577 5.577 0 0 0-1.645 3.971z"></path></svg>
                        </div>
                        <div class="ml-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".6" d="M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z"></path></svg>
                        </div>
                    </div>
                </div>

                {{-- message --}}
                <div class="h-full p-6 ">
                    <div class="flex flex-col flex-auto flex-shrink-0 h-full p-4 bg-gray-100 rounded-2xl">
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
