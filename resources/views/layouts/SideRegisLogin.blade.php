@extends('konsumen.layouts.master')
@section('content')
<style>
    body{
        background-color: #FFDB89;
    }
    #left{
        background-image: url('/images/regis.png');
    }
    #right{
        background-color: white;
    }
</style>
<div class="container m-auto mt-[160px] mb-[60px]">
    <div class="flex ">
        <div class="flex items-center justify-center sm:w-1/2 max-lg:hidden rounded-l-md" id="left">
            <div class="bg-[black] bg-opacity-50 px-[8vw] py-[30%] text-center rounded-md">
                <img src="/images/LogoSketring.png" alt="" class="align-middle sm:w-72">
                <p class="mt-5 text-3xl font-bold text-white">
                    "RING MY KATERING!"
                </p>
            </div>
        </div>
        <div class="w-full lg:w-1/2 rounded-r-md" id="right">
            @yield('contents')
        </div>
    </div>
</div>
@endsection
