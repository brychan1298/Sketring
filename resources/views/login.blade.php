@extends('layouts.SideRegisLogin')
@section('title','Login')
@section('description','Halaman Login Sketring')
@section('contents')
<div class="flex items-center justify-between p-5 pt-10">
    <svg width="24" height="24" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z" fill="#000000"/>
    </svg>
    <h1 class="text-3xl font-black">
        LOGIN
    </h1>
    <h1></h1>
</div>
<div class="px-12 py-12 bg-[#FFDB89] mx-[7vw] mb-8  shadow-2xl">
    <form action="">
        <div class="mb-12 mt-6">
            <label class="block text-gray-700 text-sm font-bold mb-2 text-xl" for="username">
                Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Email">
        </div>
        <div class="mb-12">
            <label class="block text-gray-700 text-sm font-bold mb-2 text-xl" for="Password">
                Password
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="password" placeholder="Password">
        </div>
        <div class="mb-8 flex justify-center">
            <button type="submit" class="bg-[#DC0000] px-10 py-3 text-white rounded-xl">
                MASUK
            </button>
        </div>
        <div class="text-center">
            Belum punya akun? <a href="/register" class="font-bold">Register</a>
        </div>
    </form>
</div>

<div>
    <p class="text-center mb-6">atau masuk menggunakan</p>
</div>
@endsection
