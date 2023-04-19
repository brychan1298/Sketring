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
    @if(session()->has('loginError'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span>
            {{session('loginError')}}
        </span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
    @endif
    <form action="/login" method="post">
        @csrf
        <div class="mb-12 mt-6">
            <label class="block text-gray-700 text-sm font-bold mb-2 text-xl" for="email">
                Email
            </label>
            <input name="Email" autofocus required
                value="{{ old('Email') }}"
                class="@if($errors->has('Email')) border border-red-500 @else border-none shadow @endif
                shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Email">
        </div>
        <div class="mb-12">
            <label class="block text-gray-700 text-sm font-bold mb-2 text-xl" for="Password">
                Password
            </label>
            <input name="password" required
                class="@if($errors->has('password')) border border-red-500 @else border-none shadow @endif
                shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="password" placeholder="Password">
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
