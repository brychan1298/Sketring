@extends('konsumen.layouts.master')
@section('title','Edit Profil')
@section('description','Sunting Profil Anda')
@section('content')
<div class="container-md mx-auto flex flex-col mt-[48px] w-full">
    <div class="flex flex-row w-full h-max justify-start py-[48px]">
        <a href="/profilekonsumen" class="z-50">
            <div class="px-[48px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#850000" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </div>
        </a>
        <p class="w-full text-center absolute text-2xl font-bold">
            SUNTING PROFIL
        </p>
    </div>
    <div class="container-md flex flex-row justify-center gap-[32px] w-full px-[48px] pb-[48px]">
        <div class="bg-[#850000] w-[75%] text-white flex flex-col gap-[16px] items-center p-[32px] rounded-[10px]">
            <div class="flex flex-col gap-0 ">
                <img class="rounded-full w-[360px] h-[360px]" src="images/daniljerge.jpeg" alt="">
                <label class="block mb-2 text-center mt-2 text-white font-bold dark:text-white" for="file_input">Ganti Foto Profil</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[8px] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                    <p class="font-bold">Nama Lengkap</p>
                </div>
                <div class="relative mb-3" data-te-input-wrapper-init>
                    <input
                      type="text"
                      class="px-[24px] py-[16px] bg-white text-black peer block min-h-[auto] w-full rounded-[10px] border-0 bg-transparent leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-1"
                      id="exampleFormControlInput1"
                      placeholder="~~Nama Lengkap sebelumnya~~" />
                </div>
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[8px] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7Z"/></svg>
                    <p class="font-bold">Alamat</p>
                </div>
                <div class="relative mb-3" data-te-input-wrapper-init>
                    <input
                      type="text"
                      class="px-[24px] py-[16px] bg-white text-black peer block min-h-[auto] w-full rounded-[10px] border-0 bg-transparent leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-1"
                      id="exampleFormControlInput1"
                      placeholder="~~Alamat sebelumnya~~" />
                </div>
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[8px] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20 20c-1.39 0-2.78-.47-4-1.33c-2.44 1.71-5.56 1.71-8 0C6.78 19.53 5.39 20 4 20H2v2h2c1.37 0 2.74-.35 4-1c2.5 1.3 5.5 1.3 8 0c1.26.65 2.62 1 4 1h2v-2h-2m.78-1H20c-1.18 0-2.36-.4-3.42-1.15l-.58-.4l-.58.4c-1.03.72-2.21 1.1-3.42 1.1c-1.23 0-2.41-.38-3.44-1.1l-.56-.4l-.57.4C6.36 18.6 5.18 19 4 19h-.78c.53-1.46 2.36-4 8.78-4c2 0 3 .24 3 .24c.68-1.37 1.83-4.47 1-8.42l1.06.71c.33 1.43.94 4.22-.26 8.12c2.63.85 3.62 2.35 3.98 3.35M22 7.59c-.79-1.09-2-1.88-3.42-2.06c.12.14.23.3.34.47a5.03 5.03 0 0 1-.45 5.95c.59-1.45.53-3.16-.39-4.59c-.08-.08-.12-.16-.18-.25c-.4-.58-.94-1.05-1.52-1.39c-2.03.65-3.5 2.55-3.5 4.78c0 .53.08 1.03.22 1.5c-.6-.83-.94-1.83-.94-2.93c0-1.66.8-3.12 2.04-4.04c-1.04-.08-2.11.15-3.06.75c-.44.27-.82.6-1.14.98c.39-.94 1.05-1.76 2-2.36a4.85 4.85 0 0 1 3.39-.71a5.2 5.2 0 0 0-1.06-1.09c-.41-.31-.86-.55-1.33-.72c1 .03 2.04.36 2.91 1.01c.44.33.79.73 1.09 1.16c.06 0 .12-.01.19-.01A5.03 5.03 0 0 1 22 7.59Z"/></svg>
                    <p class="font-bold">Provinsi</p>
                </div>
                <select id="provinsi" class="bg-white border border-gray-300 text-black rounded-lg focus:ring-[#DC0000] focus:border-[#DC0000] block w-full px-[24px] py-[16px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected>=== Pilih Provinsi ===</option>
                  <option value="1">DKI Jakarta</option>
                  <option value="2">Jawa Barat</option>
                  <option value="3">Jawa Tengah</option>
                  <option value="4">Jawa Timur</option>
                </select>
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[8px] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15 11V5.83c0-.53-.21-1.04-.59-1.41L12.7 2.71a.996.996 0 0 0-1.41 0l-1.7 1.7C9.21 4.79 9 5.3 9 5.83V7H5c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-6c0-1.1-.9-2-2-2h-4zm-8 8H5v-2h2v2zm0-4H5v-2h2v2zm0-4H5V9h2v2zm6 8h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V9h2v2zm0-4h-2V5h2v2zm6 12h-2v-2h2v2zm0-4h-2v-2h2v2z"/></svg>
                    <p class="font-bold">Kota</p>
                </div>
                <select id="kota" class="bg-white border border-gray-300 text-black rounded-lg focus:ring-[#DC0000] focus:border-[#DC0000] block w-full px-[24px] py-[16px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>=== Pilih Kota ===</option>
                    <option value="1">Malang</option>
                    <option value="2">Surabaya</option>
                    <option value="3">Banyuwangi</option>
                  </select>
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[8px] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5l-8-5V6l8 5l8-5v2z"/></svg>
                    <p class="font-bold">Email</p>
                </div>
                <div class="relative mb-3" data-te-input-wrapper-init>
                    <input
                      type="text"
                      class="px-[24px] py-[16px] bg-white text-black peer block min-h-[auto] w-full rounded-[10px] border-0 bg-transparent leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-1"
                      id="exampleFormControlInput1"
                      placeholder="~~Email sebelumnya~~" />
                </div>
            </div>
            <div class="w-[100%] flex flex-row justify-center gap-[24px]">
                <a href="/profilekonsumen" class="w-max">
                    <div class="flex flex-row w-max border-2 border-white text-white gap-[16px] items-center p-[16px] rounded-[10px]">
                        <p class="font-bold text-2xl">BATAL</p>
                    </div>
                </a>
                <a href="/profilekonsumen" class="w-max">
                    <div class="flex flex-row bg-white border-2 border-white w-max text-[#DC0000] gap-[16px] items-center p-[16px] rounded-[10px]">
                        <p class="font-bold text-2xl">SIMPAN</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
