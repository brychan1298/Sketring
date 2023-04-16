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
        <div class="w-1/2" id="left">
            <div class="px-10 py-12 bg-[#D9D9D9] bg-opacity-75 m-10">
                <h1 class="uppercase font-extrabold text-5xl">
                    S'KETRING
                </h1>
                <p>
                    Ring MY Katering
                </p>
            </div>
        </div>
        <div class="w-1/2" id="right">
            @yield('contents')
        </div>
    </div>
</div>
@endsection
