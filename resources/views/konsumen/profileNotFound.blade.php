@extends('konsumen.layouts.master')
@section('title', 'Profil Belum Lengkap')
@section('description', 'Profil Sketring Belum Lengkap')
@section('content')

    <div class="container mx-auto mt-[80px] mb-12">
        <div class="flex justify-center">
            <img src="/images/ProfileBlank.png" style="width: 40vw">
        </div>
        <div class="row">
            <h2 class="text-center text-xl">
                Wah, Profile kamu belum lengkap
            </h2>
            <h3 class="text-center text-2xl">
                Ayo Lengkapi Profil Kamu Untuk Melanjutkan!!
            </h3>
            <div class="flex justify-center mt-4">
                <a href="/editprofile"
                class="bg-[#850000] max-lg:py-2 max-lg:px-4 py-3 px-7 text-white font-bold uppercase text-sm rounded">Edit Profil</a>
            </div>
        </div>
    </div>

@endsection
