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
<div class="container m-auto mt-[100px] mb-[60px]">
    <div class="flex">
        <div class="w-1/2 flex justify-center items-center" id="left">
            <div class="bg-[#D9D9D9] bg-opacity-75 px-[8vw] py-[35%] text-center">
                <h1 class="uppercase font-extrabold text-6xl my-auto">
                    S'KETRING
                </h1>
                <p class="text-3xl mt-5">
                    Ring My Katering
                </p>
            </div>
        </div>
        <div class="w-1/2" id="right">
            @yield('contents')
        </div>
    </div>
</div>
@endsection
