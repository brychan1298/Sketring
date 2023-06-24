<div
    class="mt-16 container flex flex-row gap-[2vw] items-center justify-center p-6 mx-auto text-white capitalize bg-[#850000] w-max rounded-[10px]">
    <a href="/konsumen/pesanan" class="{{ set_active_pesanan_2('pesanan') }} text-white border-white mx-1.5 sm:mx-6 group transition duration-200">
        Belum Bayar
        <span class="{{ set_active_pesanan('pesanan') }} block group-hover:max-w-full transition-all duration-500 h-0.5 bg-[white]"></span>
    </a>

    <a href="/konsumen/disiapkan"
        class="{{ set_active_pesanan_2('pesanan-disiapkan') }} border-b-2 border-transparent mx-1.5 sm:mx-6 group transition duration-200">
        Disiapkan
        <span class="{{ set_active_pesanan('pesanan-disiapkan') }} block group-hover:max-w-full transition-all duration-500 h-0.5 bg-[white]"></span>
    </a>

    <a href="/konsumen/dikirimkan"
        class="{{ set_active_pesanan_2('pesanan-dikirimkan') }} border-b-2 border-transparent mx-1.5 sm:mx-6 group transition duration-200">
        Dikirimkan
        <span class="{{ set_active_pesanan('pesanan-dikirimkan') }} block group-hover:max-w-full transition-all duration-500 h-0.5 bg-[white]"></span>
    </a>

    <a href="/konsumen/selesai"
        class="{{ set_active_pesanan_2('pesanan-selesai') }} border-b-2 border-transparent mx-1.5 sm:mx-6 group transition duration-200">
        Selesai
        <span class="{{ set_active_pesanan('pesanan-selesai') }} block group-hover:max-w-full transition-all duration-500 h-0.5 bg-[white]"></span>
    </a>

    <a href="/konsumen/dibatalkan"
        class="{{ set_active_pesanan_2('pesanan-dibatalkan') }} border-b-2 border-transparent mx-1.5 sm:mx-6 group transition duration-200">
        Dibatalkan
        <span class="{{ set_active_pesanan('pesanan-dibatalkan') }} block group-hover:max-w-full transition-all duration-500 h-0.5 bg-[white]"></span>
    </a>

</div>
