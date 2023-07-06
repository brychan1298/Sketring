<nav class="bg-[#850000] fixed w-full z-20">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="/" class="flex items-center">
            <img src="/images/LogoSketring.png" alt="" class="w-24 sm:w-48 max-sm:mx-7">
        </a>
        <div class="flex items-center gap-5 md:order-2">
            <a href="/konsumen/listKeranjang">
                <div class="relative p-1">
                    <svg class="" width="35" height="30" viewBox="0 0 35 30" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.5 30C9.44444 30 8.54167 29.6178 7.79167 28.8533C7.04167 28.0889 6.66667 27.1794 6.66667 26.125V10.6667L3.625 3.33333H0V0H5.875L8.625 6.66667H33.25C33.8889 6.66667 34.375 6.93056 34.7083 7.45833C35.0417 7.98611 35.0556 8.52778 34.75 9.08333L30 18.375C31.4167 18.5972 32.6044 19.25 33.5633 20.3333C34.5222 21.4167 35.0011 22.6944 35 24.1667C35 25.7778 34.4378 27.1528 33.3133 28.2917C32.1889 29.4306 30.82 30 29.2067 30C27.5678 30 26.1861 29.4306 25.0617 28.2917C23.9372 27.1528 23.375 25.7778 23.375 24.1667C23.375 23.6111 23.4444 23.0972 23.5833 22.625C23.7222 22.1528 23.9167 21.6944 24.1667 21.25L18.7083 20.75L13.7083 28.25C13.3472 28.8056 12.8817 29.2361 12.3117 29.5417C11.7417 29.8472 11.1378 30 10.5 30ZM26.4167 18.125L30.5417 10L10 10.0417L12.0833 15C12.3056 15.5556 12.66 16.0211 13.1467 16.3967C13.6333 16.7722 14.1956 16.9872 14.8333 17.0417L26.4167 18.125ZM10.5417 26.625C10.5972 26.625 10.7222 26.5556 10.9167 26.4167L14.9583 20.4167C13.5972 20.2778 12.5278 19.9517 11.75 19.4383C10.9722 18.925 10.3889 18.39 10 17.8333V26.1667C10 26.3056 10.0556 26.4167 10.1667 26.5C10.2778 26.5833 10.4028 26.625 10.5417 26.625ZM29.1667 26.6667C29.8889 26.6667 30.4861 26.4233 30.9583 25.9367C31.4306 25.45 31.6667 24.86 31.6667 24.1667C31.6667 23.4444 31.4306 22.8472 30.9583 22.375C30.4861 21.9028 29.8889 21.6667 29.1667 21.6667C28.4722 21.6667 27.8817 21.9028 27.395 22.375C26.9083 22.8472 26.6656 23.4444 26.6667 24.1667C26.6667 24.8611 26.91 25.4517 27.3967 25.9383C27.8833 26.425 28.4733 26.6678 29.1667 26.6667Z"
                            fill="white" />
                    </svg>
                    @if (Auth::check())
                        <div class="absolute w-5 h-5 rounded-full text-sm top-0 right-0 bg-white text-[#850000]">
                            <p class="flex items-center justify-center cartCount">

                            </p>
                        </div>
                    @endif
                </div>
            </a>

            @if (Auth::check())
                <button type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full max-sm:hidden md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    @if (Auth::User()->FotoProfil)
                        <img class="w-12 h-12 rounded-full" src="{{ asset('storage/' . Auth::User()->FotoProfil) }}">
                    @else
                        <img class="w-12 h-12 rounded-full" src="/images/fotoprofile_default.png" alt="user photo">
                    @endif
                </button>
                <div class="z-50 hidden my-5 text-base list-none bg-white divide-y divide-gray-300 rounded-lg shadow max-sm:hidden"
                    id="user-dropdown">
                    <div class="flex flex-row items-center gap-2 px-4 py-3">
                        <div class="w-25">
                            @if (Auth::User()->FotoProfil)
                                <img class="w-12 h-12 rounded-full" src="{{ asset('storage/' . Auth::User()->FotoProfil) }}">
                            @else
                                <img class="w-12 h-12 rounded-full" src="/images/fotoprofile_default.png" alt="user photo">
                            @endif
                        </div>
                        <div>
                            <span class="block text-sm font-bold text-black">{{ auth()->user()->Nama }}</span>
                            <span class="block text-sm text-black">{{ auth()->user()->Email }}</span>
                        </div>

                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="/profileKonsumen"
                                class="block px-4 py-2 text-sm text-black dark:hover:bg-[#850000] dark:hover:text-white">Profil</a>
                        </li>
                        {{-- <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-[#c0c0c0] hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li> --}}
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-black dark:hover:bg-[#850000] dark:hover:text-white">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login" class="max-sm:hidden btn bg-white px-10 py-2 font-light rounded-md text-[#850000]">
                    Login
                </a>
            @endif

            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="z-10 items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul
                class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 md:flex-row md:space-x-8 md:mt-0 md:border-0">
                <li>
                    <a href="/"
                        class="{{ set_active_2('beranda') }} block py-2 px-4 pr-4 text-white
                                md:bg-transparent md:text-white-700
                                group transition duration-200"
                        aria-current="page">Beranda
                        <span
                            class="{{ set_active('beranda') }} block group-hover:max-w-full transition-all duration-500 h-0.5 bg-[white]"></span>
                    </a>
                </li>
                <li>
                    <a href="/konsumen/cari"
                        class="{{ set_active_2('cari') }}
                        {{ set_active_2('detailProduk') }} block py-2 px-4 pr-4 text-white
                                md:bg-transparent md:text-white-700
                                group transition duration-200"
                        aria-current="page">Produk
                        <span
                            class="{{ set_active('cari') }}
                            {{ set_active('detailProduk') }} block group-hover:max-w-full transition-all duration-500 h-0.5 bg-[white]"></span>
                    </a>
                </li>
                <li>
                    <a href="/konsumen/pesanan"
                        class="{{ set_active_2('pesanan') }}
                            {{ set_active_2('pesanan-disiapkan') }}
                            {{ set_active_2('pesanan-dikirimkan') }}
                            {{ set_active_2('pesanan-selesai') }}
                            {{ set_active_2('pesanan-dibatalkan') }}
                        block px-4 py-2 pr-4 text-white md:bg-transparent md:text-white-700 group transition duration-200">Pesanan
                        <span
                            class="{{ set_active('pesanan') }}
                            {{ set_active('pesanan-disiapkan') }}
                            {{ set_active('pesanan-dikirimkan') }}
                            {{ set_active('pesanan-selesai') }}
                            {{ set_active('pesanan-dibatalkan') }}
                            block group-hover:max-w-full transition-all duration-500 h-0.5 bg-[white]"></span>
                    </a>
                </li>
                <li class="block px-4 py-2 pr-4 sm:hidden">
                    @if (Auth::check())
                        <button type="button"
                            class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="user-dropdown-2"
                            data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            @if (Auth::User()->FotoProfil)
                                <img class="w-12 h-12 rounded-full" src="{{ asset('storage/' . Auth::User()->FotoProfil) }}">
                            @else
                                <img class="w-12 h-12 rounded-full" src="/images/fotoprofile_default.png" alt="user photo">
                            @endif
                            {{-- <img class="w-12 h-12 rounded-full"
                                src="{{ asset('storage/' . Auth::User()->FotoProfil) }}" alt="user photo"> --}}
                        </button>
                        <div class="z-50 hidden my-5 text-base list-none bg-white divide-y divide-gray-300 rounded-lg shadow"
                            id="user-dropdown-2">
                            <div class="flex flex-row items-center gap-2 px-4 py-3">
                                <div class="w-25">
                                    @if (auth()->user()->FotoProfil)
                                        <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . Auth::User()->FotoProfil) }}">
                                    @else
                                        <img class="w-8 h-8 rounded-full" src="/images/fotoprofile_default.png" alt="user photo">
                                    @endif
                                </div>
                                <div>
                                    <span class="block text-sm font-bold text-black">{{ auth()->user()->Nama }}</span>
                                    <span class="block text-sm text-black">{{ auth()->user()->Email }}</span>
                                </div>

                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button-2">
                                <li>
                                    <a href="/profileKonsumen"
                                        class="block px-4 py-2 text-sm text-black dark:hover:bg-[#850000] dark:hover:text-white">Profil</a>
                                </li>
                                {{-- <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-[#c0c0c0] hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                </li> --}}
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 text-sm text-black dark:hover:bg-[#850000] dark:hover:text-white">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="/login" class="btn bg-white px-10 py-2 font-light rounded-md text-[#850000]">
                            Login
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        loadCart();

        function loadCart() {
            $.ajax({
                method: "GET",
                url: "/loadCartCount",
                success: function(response) {
                    // alert(response.count);
                    $('.cartCount').html(response.count);
                }
            });
        }
    });
</script>
