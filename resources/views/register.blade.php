@extends('layouts.SideRegisLogin')
@section('title','Register')
@section('description','Halaman Register Sketring')
@section('contents')
<div class="flex items-center justify-between p-5">
    <svg width="24" height="24" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z" fill="#000000"/>
    </svg>
    <h1 class="text-2xl">
        REGISTRASI
    </h1>
    <h1></h1>
</div>
<div class="px-12 py-12 bg-[#FFDB89] mx-[7vw] mb-8  shadow-2xl">
    <form action="">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Username
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Email">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Password
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="password" placeholder="Password">
        </div>
        <div class="flex mb-8 justify-center">
            <input type="checkbox" name="" id="" class="mr-3 w-5">
            <p>
                Saya setuju dengan <a href="" class="text-decoration-none font-bold">Syarat dan Ketentuan</a>
            </p>
        </div>
        <div class="mb-4 flex justify-center">
            <button type="submit" class="bg-[#DC0000] px-10 py-3 text-white rounded-xl">
                DAFTAR
            </button>
        </div>
        <div class="text-center">
            Sudah punya akun? <a href="" class="font-bold">Log In</a>
        </div>
    </form>
</div>

<div>
    <p class="text-center mb-6">atau registrasi menggunakan</p>
</div>
@endsection
