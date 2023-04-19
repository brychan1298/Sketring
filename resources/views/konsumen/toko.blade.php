@extends('konsumen.layouts.master')
@section('title', 'Toko')
@section('description', 'Halaman Toko')
@section('content')

<div class="container m-auto mt-[100px]">
    <div>
        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z" fill="#850000"/>
        </svg>
    </div>
    <div class="flex grid grid-cols-2">
        <div class="" class="">
            <img src="images/lupita.png" alt="" class="w-5/6 mx-auto py-12">
        </div>
        <div class="text-right border-2">
            <div class="flex justify-between">
                <div>
                    Buka
                </div>
                <h1>
                    KEDAI TERRACE LUPITA <br>
                    CATERING & SNACK BOX
                </h1>
            </div>

            <p>
                Jl. Sungai Mambramo No 77
            </p>
            <p>
                081211878683 / 081284093251
            </p>
            <p>
                Min. Pemesanan : 50 porsi | Maks. Pemesanan : 100 posi
            </p>
            <div class="flex">
                <p>
                    Jam Buka:   Hari ini  06:00-21:00
                </p>
                <img src="" alt="">
                <p>
                    3.5 km
                </p>
            </div>
        </div>
    </div>

    <div class="relative flex py-5 items-center mt-12">
        <div class="flex-grow border-t border-[#850000]"></div>
        <span class="flex-shrink mx-4 font-bold text-[#850000]">Menu</span>
        <div class="flex-grow border-t border-[#850000]"></div>
    </div>

    <div class="mt-10 grid grid-cols-4">
        <div class="rounded-md shadow-3xl p-5">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="font-extrabold mb-4">
                        Paket Nasi Hainam
                    </h1>
                    <p class="font-normal text-sm mb-3">
                        Nasi + daging ayam + sayur segar + kuah kaldu ayam
                    </p>
                    <div class="flex items-center">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.6899 1.0023C19.5062 0.816503 19.2874 0.669113 19.0462 0.568711C18.805 0.468309 18.5463 0.416903 18.285 0.417485H12.8387C12.4815 0.418151 12.1389 0.559675 11.8853 0.811346L0.997668 11.6968C0.626159 12.0691 0.417511 12.5735 0.417511 13.0994C0.417511 13.6254 0.626159 14.1298 0.997668 14.5021L6.18121 19.6856C6.55358 20.0573 7.0582 20.2661 7.58431 20.2661C8.11043 20.2661 8.61505 20.0573 8.98741 19.6856L19.8706 8.80464C20.1228 8.55147 20.2648 8.20899 20.2658 7.85166V2.4023C20.2674 2.14241 20.2174 1.88479 20.1185 1.64445C20.0196 1.4041 19.8739 1.18581 19.6899 1.0023ZM16.0127 6.08837C15.7323 6.08837 15.4582 6.00522 15.225 5.84944C14.9919 5.69366 14.8102 5.47224 14.7029 5.21319C14.5956 4.95413 14.5675 4.66908 14.6222 4.39407C14.6769 4.11906 14.8119 3.86644 15.0102 3.66817C15.2085 3.4699 15.4611 3.33487 15.7361 3.28017C16.0111 3.22547 16.2962 3.25354 16.5552 3.36085C16.8143 3.46815 17.0357 3.64986 17.1915 3.88301C17.3472 4.11615 17.4304 4.39025 17.4304 4.67065C17.4304 5.04665 17.281 5.40726 17.0151 5.67313C16.7493 5.939 16.3887 6.08837 16.0127 6.08837Z" fill="#8F8F8F"/>
                        </svg>
                        <p class="font-normal text-sm ml-2">
                            Rp. 25000/porsi
                        </p>
                    </div>
                </div>
                <img src="images/lupita.png" alt="" class="w-32 h-full object-cover aspect-square">
            </div>
            <div class="float-right mt-6">
                <button class="border-2 border-[#DC0000] rounded-xl text-[#DC0000] font-bold px-5 py-2">
                    Lihat Produk
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
