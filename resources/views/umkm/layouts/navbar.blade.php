<nav class="bg-[#850000] fixed w-full z-10">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="/" class="flex items-center">
            <img src="/images/LogoSketring.png" alt="" class="w-24 sm:w-48 max-sm:mx-7">
        </a>
        <div class="flex items-center gap-5 md:order-2">
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
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="/umkm/profileToko"
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
                    <a href="/umkm"
                        class="{{ umkm_set_active_2('berandaumkm') }} block px-4 py-2 pr-4 text-white md:bg-transparent md:text-white-700 group transition duration-200"
                        aria-current="page">Beranda
                        <span
                            class="{{ umkm_set_active('berandaumkm') }} block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-[white]"></span>
                    </a>
                </li>
                <li>
                    <a href="/umkm/dashboard"
                        class="{{ umkm_set_active_2('dashboardumkm') }}
                        {{ umkm_set_active_2('tambahProduk') }}
                        {{ umkm_set_active_2('editProduk') }}
                        block px-4 py-2 pr-4 text-white md:bg-transparent md:text-white-700 group transition duration-200">Produk
                        Saya
                        <span
                            class="{{ umkm_set_active('dashboardumkm') }}
                            {{ umkm_set_active('tambahProduk') }}
                            {{ umkm_set_active('editProduk') }}
                            block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-[white]"></span>
                    </a>

                </li>
                <li>
                    <a href="/umkm/pesanan"
                        class="{{ umkm_set_active_2('pesanan') }}
                        {{ umkm_set_active_2('pesanan-disiapkan') }}
                        {{ umkm_set_active_2('pesanan-dikirimkan') }}
                        {{ umkm_set_active_2('pesanan-selesai') }}
                        {{ umkm_set_active_2('pesanan-dibatalkan') }}
                        block px-4 py-2 pr-4 text-white md:bg-transparent md:text-white-700 group transition duration-200">Pesanan
                        <span
                            class="{{ umkm_set_active('pesanan') }}
                            {{ umkm_set_active('pesanan-disiapkan') }}
                            {{ umkm_set_active('pesanan-dikirimkan') }}
                            {{ umkm_set_active('pesanan-selesai') }}
                            {{ umkm_set_active('pesanan-dibatalkan') }}
                            block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-[white]"></span>
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
                        </button>
                        <div class="z-50 hidden my-5 text-base list-none bg-white divide-y divide-gray-300 rounded-lg shadow"
                            id="user-dropdown-2">
                            <div class="flex flex-row items-center gap-2 px-4 py-3">
                                <div class="w-25">
                                    @if (Auth::User()->FotoProfil)
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
                                    <a href="/umkm/profileToko"
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
