@extends('umkm.layouts.master')
@section('title', 'Edit Profil Toko')
@section('description', 'Sunting Profil Toko Anda')
@section('content')

<div class="flex flex-col w-full mx-auto container-md">
    <div class="px-10 pt-24">
        <a href="/">
            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z" fill="#850000"/>
            </svg>
        </a>
        <p class="w-full mx-auto text-2xl font-bold text-center">PROFIL TOKO</p>
    </div>
</div>

<div class="w-full mt-5">
    <img src="images/bannerToko.jpg" alt="">
    <div class="ml-20 text-center w-fit">
        <img src="images/syamsulkatering.png" alt="SyamsulKatering.id" class="rounded-full w-[18.75vw] h-[18.75vw] -mt-40">
        <p class="mt-8 text-2xl font-bold">SyamsulKatering.id</p>
    </div>
</div>

<div class="flex flex-col w-full mx-auto container-md">
    <div class="w-[100%] flex flex-row-reverse mb-5 pr-28 bder">
        <a href="/profileToko" class="flex flex-row w-max">
            <div class="flex flex-row bg-[#F8CB66] w-max text-[#DC0000] gap-[16px] items-center p-[16px] rounded-[10px]">
                <p class="text-xl font-bold">SUNTING</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#DC0000" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                </svg>
            </div>
        </a>
    </div>
    <div class="container-md flex flex-row justify-center gap-[32px] w-full px-[48px] pb-[48px]">
        <div class="container-md flex flex-col w-[15%] gap-[32px]">
            <div class="bg-[#FFE6AE] p-[24px] flex flex-col rounded-[10px] gap-[12px]">
                <div class="w-[100%] p-[12px] flex flex-row justify-center items-center gap-[12px] rounded-[10px] bg-[#F8CB66]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                    <p class="text-xl font-bold">Profil</p>
                </div>
                <div class="w-[100%] p-[12px] flex flex-row justify-center items-center gap-[12px] rounded-[10px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                    </svg>
                    <p class="text-xl font-bold">Keluar</p>
                </div>
            </div>
            <div class="bg-[#D6FFE1] p-[24px] flex flex-col rounded-[10px] gap-[12px] text-[#088443]">
                <div class="flex flex-col">
                    <div class="w-[100%] text-center">
                        <p class="text-2xl font-bold">SALDO:</p>
                    </div>
                    <div class="w-[100%] flex flex-row justify-center items-center gap-[12px] rounded-[10px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6z"/>
                        </svg>
                        <p class="text-2xl font-bold">Rp250.000</p>
                    </div>
                </div>
                <a href="#">
                    <p class="font-bold text-center underline text-1xl">Tarik Saldo >></p>
                </a>
            </div>
        </div>
        <div class="bg-[#850000] w-[76%] text-white flex flex-col gap-[2.5vw] items-center p-[3vw] rounded-[10px]">
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                    <p class="text-xl font-bold">Nama Lengkap</p>
                </div>
                <input type="text" name="nama" class="px-[24px] py-[16px] text-black bg-white rounded-[10px] text-lg" placeholder="Masukan Nama Lengkap Anda" value="Syamsul Said">
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7Z"/></svg>
                    <p class="text-xl font-bold">Alamat</p>
                </div>
                <textarea name="alamat" class="px-[24px] py-[16px] text-black bg-white rounded-[10px] text-lg" placeholder="Masukan Alamat Lengkap Anda">Jl. Raya Kedung Baruk No. 98B, RT 007/RW 001, Kelurahan Kedung Baruk, Kecamatan Rungkut, Kota Surabaya, Provinsi Jawa Timur, Kode Pos 60298, Indonesia</textarea>
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M12 20c4.4 0 8-3.6 8-8s-3.6-8-8-8s-8 3.6-8 8s3.6 8 8 8m0-18c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12S6.5 2 12 2m.5 10.8l-4.8 2.8l-.7-1.4l4-2.3V7h1.5v5.8Z"/></svg>
                    <p class="text-xl font-bold">Jam Operasional</p>
                </div>
                <input type="text" name="jam" class="px-[24px] py-[16px] text-black bg-white rounded-[10px] text-lg" placeholder="Masukan Jam Operasional" value="06.00 - 21.00">
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20 20c-1.39 0-2.78-.47-4-1.33c-2.44 1.71-5.56 1.71-8 0C6.78 19.53 5.39 20 4 20H2v2h2c1.37 0 2.74-.35 4-1c2.5 1.3 5.5 1.3 8 0c1.26.65 2.62 1 4 1h2v-2h-2m.78-1H20c-1.18 0-2.36-.4-3.42-1.15l-.58-.4l-.58.4c-1.03.72-2.21 1.1-3.42 1.1c-1.23 0-2.41-.38-3.44-1.1l-.56-.4l-.57.4C6.36 18.6 5.18 19 4 19h-.78c.53-1.46 2.36-4 8.78-4c2 0 3 .24 3 .24c.68-1.37 1.83-4.47 1-8.42l1.06.71c.33 1.43.94 4.22-.26 8.12c2.63.85 3.62 2.35 3.98 3.35M22 7.59c-.79-1.09-2-1.88-3.42-2.06c.12.14.23.3.34.47a5.03 5.03 0 0 1-.45 5.95c.59-1.45.53-3.16-.39-4.59c-.08-.08-.12-.16-.18-.25c-.4-.58-.94-1.05-1.52-1.39c-2.03.65-3.5 2.55-3.5 4.78c0 .53.08 1.03.22 1.5c-.6-.83-.94-1.83-.94-2.93c0-1.66.8-3.12 2.04-4.04c-1.04-.08-2.11.15-3.06.75c-.44.27-.82.6-1.14.98c.39-.94 1.05-1.76 2-2.36a4.85 4.85 0 0 1 3.39-.71a5.2 5.2 0 0 0-1.06-1.09c-.41-.31-.86-.55-1.33-.72c1 .03 2.04.36 2.91 1.01c.44.33.79.73 1.09 1.16c.06 0 .12-.01.19-.01A5.03 5.03 0 0 1 22 7.59Z"/></svg>
                    <p class="text-xl font-bold">Provinsi</p>
                </div>
                <select name="provinsi"
                    class="px-[24px] py-[16px] text-black bg-white rounded-[10px] text-lg">
                    <option value="">Pilih Provinsi</option>
                </select>
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15 11V5.83c0-.53-.21-1.04-.59-1.41L12.7 2.71a.996.996 0 0 0-1.41 0l-1.7 1.7C9.21 4.79 9 5.3 9 5.83V7H5c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-6c0-1.1-.9-2-2-2h-4zm-8 8H5v-2h2v2zm0-4H5v-2h2v2zm0-4H5V9h2v2zm6 8h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V9h2v2zm0-4h-2V5h2v2zm6 12h-2v-2h2v2zm0-4h-2v-2h2v2z"/></svg>
                    <p class="text-xl font-bold">Kota</p>
                </div>
                <select name="kota"
                    class="px-[24px] py-[16px] text-black bg-white rounded-[10px] text-lg">
                    <option value="">Pilih Kota</option>
                </select>
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5l-8-5V6l8 5l8-5v2z"/></svg>
                    <p class="text-xl font-bold">Email</p>
                </div>
                <input type="email" name="emailToko" class="px-[24px] py-[16px] text-black bg-white rounded-[10px] text-lg" placeholder="Masukan Email" value="syamsulkatering@gmail.com">
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                    <p class="text-xl font-bold">No. Telepon</p>
                </div>
                <input type="no_telepon" name="telepon" class="px-[24px] py-[16px] text-black bg-white rounded-[10px] text-lg" placeholder="Masukan Nomor Telepon" value="081232139392">
            </div>
        </div>
    </div>
    <div class="flex justify-center gap-5 mb-16">
        <a href="/profileToko" class="font-bold border-2 border-solid border-[#DC0000] text-[#DC0000] text-2xl px-7 py-2 my-5 rounded-md hover:text-[#850000] hover:border-[#850000]">
            BATAL
        </a>
        <button type="submit" class="border-2 text-white bg-[#DC0000] px-7 py-2 text-2xl rounded-md my-5 hover:bg-[#850000] hover:text-white">
            SIMPAN
        </button>
    </div>
</div>

@endsection
