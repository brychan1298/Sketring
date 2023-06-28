@extends('layouts.SideRegisLogin')
@section('title', 'Login')
@section('description', 'Halaman Login Sketring')
@section('contents')
    <style>
        .inputForm label {
            transform: translateY(-50%) scale(0.85);
            top: 50%;
            transition: all 0.3s ease-in-out;
        }

        .inputForm input:focus+label,
        .inputForm input:not(:placeholder-shown)+label {
            transform: translateY(-50%) scale(0.75);
            top: 0;
        }

        .inputForm div {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 1px;
            background-color: transparent;
            transform-origin: bottom;
            transition: transform 0.3s ease-in-out;
        }

        .inputForm div.active {
            transform: scale(1);
            background-color: gray;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-transition-delay: 9999s;
            transition-delay: 9999s;
        }
    </style>
    <div class="flex items-center justify-center p-5 pt-10">
        <h1 class="text-3xl font-black">
            LOGIN
        </h1>
        <h1></h1>
    </div>

    <div class="px-12 py-12 bg-[#FFDB89] mx-[7vw] mb-12  shadow-2xl mt-3">
        @if (session()->has('loginError'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span>
                    {{ session('loginError') }}
                </span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        @endif
        <form action="/login" method="post">
            @csrf
            <div class="relative inputForm mb-5 mt-5 mx-4" data-te-input-wrapper-init>
                <input type="text" name="Email" required value="{{ old('Email') }}"
                    class="@if ($errors->has('Email')) border border-red-500 @else shadow @endif
                    text-[#850000] border-[#850000] border
                    peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.32rem] leading-[2.15] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none focus:placeholder:text-sm
                    focus:outline-none focus:shadow-outline
                    focus:ring-0"
                    id="Email" placeholder="Email" />
                <label for="Email"
                    class="peer-focus:text-[#dc0000] pointer-events-none absolute bg-[#FFDB89] text-[#85000070] px-2 left-3 top-3 origin-[0] transition-all duration-300 text-md">Alamat
                    Email
                </label>
            </div>
            <div class="relative inputForm mb-8 mt-8 mx-4" data-te-input-wrapper-init>
                <input type="password" name="password" required
                    class="@if ($errors->has('password')) border border-red-500 @else @endif
                    text-[#850000] border-[#850000] border
                    peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.32rem] leading-[2.15] transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0
                    focus:outline-none focus:shadow-outline
                    focus:ring-0"
                    id="password" placeholder="Password" />
                <label for="password"
                    class="peer-focus:text-[#dc0000] pointer-events-none absolute bg-[#FFDB89] text-[#85000070] px-2 left-3 top-3 origin-[0] transition-all duration-300 text-md">
                    Password
                </label>
            </div>


            {{-- <div class="relative mb-6" data-te-input-wrapper-init>
                <input type="text"
                    class="@if ($errors->has('Email')) border border-red-500 @else border-none shadow @endif
                    text-gray-700
                    peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0
                    focus:outline-none focus:shadow-outline"
                    id="exampleFormControlInput3" placeholder="Email address" />
                <label for="exampleFormControlInput3"
                    class="pointer-events-none absolute left-3 top-3 text-gray-500 transition-all duration-300">Email
                    address
                </label>
            </div> --}}

            {{-- <div class="relative mb-6" data-te-input-wrapper-init>
                <input type="text"
                    class="@if ($errors->has('Email')) border border-red-500 @else border-none shadow @endif
                        text-gray-700
                        peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0
                        focus:outline-none focus:shadow-outline"
                    id="exampleFormControlInput3" placeholder="Email address" />
                <label for="exampleFormControlInput3"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8]">Email
                    address
                </label>
            </div> --}}
            {{-- <div>
                <div class="text-sm font-bold text-gray-700 tracking-wide">Email</div>
                <input name="Email" autofocus required value="{{ old('Email') }}"
                    class="
                    @if ($errors->has('Email')) border-b border-red-500 @else @endif
                    text-[#850000] placeholder:text-gray-500 placeholder:text-sm w-full text-lg py-2 border-b border-gray-400 bg-[#FFDB89] focus:outline-none focus:border-indigo-500"
                    type="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'"
                    placeholder="Alamat Email">
            </div>
            <div class="mb-12 mt-6">
                <div class="text-sm font-bold text-gray-700 tracking-wide">Password</div>
                <input name="Email" autofocus required value="{{ old('Email') }}"
                    class="
                    @if ($errors->has('Email')) border-b border-red-500 @else @endif
                    text-[#850000] placeholder:text-gray-500 placeholder:text-sm w-full text-lg py-2 border-b border-gray-400 bg-[#FFDB89] focus:outline-none focus:border-indigo-500"
                    type="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'"
                    placeholder="Password">
            </div> --}}
            {{-- <div class="mb-12 mt-6">
                <label class="block text-gray-700 text-sm font-bold mb-2 text-xl" for="email">
                    Email
                </label>
                <input name="Email" autofocus required value="{{ old('Email') }}"
                    class="@if ($errors->has('Email')) border border-red-500 @else border-none shadow @endif
                shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" type="text" placeholder="Email">
            </div>
            <div class="mb-12">
                <label class="block text-gray-700 text-sm font-bold mb-2 text-xl" for="Password">
                    Password
                </label>
                <input name="password" required
                    class="@if ($errors->has('password')) border border-red-500 @else border-none shadow @endif
                shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" type="password" placeholder="Password">
            </div> --}}

            <div class="mb-4 flex justify-center mx-4">
                <button type="submit" class="bg-[#DC0000] px-10 py-3 text-white rounded-xl w-full">
                    MASUK
                </button>
            </div>

            <div class="mx-4 text-center">
                Belum punya akun? <a href="/register"
                    class="font-bold text-[#850000] underline text-md hover:text-red-600">Register</a>
            </div>

            <div
                class="my-4 mx-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-[#850000] after:mt-0.5 after:flex-1 after:border-t after:border-[#850000]">
                <p class="mx-4 mb-0 text-center font-semibold text-[#850000]">
                    Or
                </p>
            </div>
            {{-- <p class="text-center mb-6">atau masuk menggunakan</p> --}}
            <div class="flex gap-5 justify-center">
                <a href="https://www.facebook.com/">
                    <div
                        class="shadow-2xl rounded-full border-2 w-12 h-12 flex justify-center items-center hover:bg-blue-800 hover:border-white">
                        <svg width="13" height="25" viewBox="0 0 27 50" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.5 28.75H23.75L26.25 18.75H17.5V13.75C17.5 11.175 17.5 8.75 22.5 8.75H26.25V0.35C25.435 0.2425 22.3575 0 19.1075 0C12.32 0 7.5 4.1425 7.5 11.75V18.75H0V28.75H7.5V50H17.5V28.75Z"
                                fill="black" />
                        </svg>
                    </div>
                </a>
                <a href="https://www.instagram.com/">
                    <div
                        class="shadow-2xl rounded-full border-2 w-12 h-12 flex justify-center items-center hover:bg-pink-500 hover:border-white">
                        <svg width="25" height="25" viewBox="0 0 50 50" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.5 0H35.5C43.5 0 50 6.5 50 14.5V35.5C50 39.3456 48.4723 43.0338 45.753 45.753C43.0338 48.4723 39.3456 50 35.5 50H14.5C6.5 50 0 43.5 0 35.5V14.5C0 10.6544 1.52767 6.96623 4.24695 4.24695C6.96623 1.52767 10.6544 0 14.5 0ZM14 5C11.6131 5 9.32387 5.94821 7.63604 7.63604C5.94821 9.32387 5 11.6131 5 14V36C5 40.975 9.025 45 14 45H36C38.3869 45 40.6761 44.0518 42.364 42.364C44.0518 40.6761 45 38.3869 45 36V14C45 9.025 40.975 5 36 5H14ZM38.125 8.75C38.9538 8.75 39.7487 9.07924 40.3347 9.66529C40.9208 10.2513 41.25 11.0462 41.25 11.875C41.25 12.7038 40.9208 13.4987 40.3347 14.0847C39.7487 14.6708 38.9538 15 38.125 15C37.2962 15 36.5013 14.6708 35.9153 14.0847C35.3292 13.4987 35 12.7038 35 11.875C35 11.0462 35.3292 10.2513 35.9153 9.66529C36.5013 9.07924 37.2962 8.75 38.125 8.75ZM25 12.5C28.3152 12.5 31.4946 13.817 33.8388 16.1612C36.183 18.5054 37.5 21.6848 37.5 25C37.5 28.3152 36.183 31.4946 33.8388 33.8388C31.4946 36.183 28.3152 37.5 25 37.5C21.6848 37.5 18.5054 36.183 16.1612 33.8388C13.817 31.4946 12.5 28.3152 12.5 25C12.5 21.6848 13.817 18.5054 16.1612 16.1612C18.5054 13.817 21.6848 12.5 25 12.5ZM25 17.5C23.0109 17.5 21.1032 18.2902 19.6967 19.6967C18.2902 21.1032 17.5 23.0109 17.5 25C17.5 26.9891 18.2902 28.8968 19.6967 30.3033C21.1032 31.7098 23.0109 32.5 25 32.5C26.9891 32.5 28.8968 31.7098 30.3033 30.3033C31.7098 28.8968 32.5 26.9891 32.5 25C32.5 23.0109 31.7098 21.1032 30.3033 19.6967C28.8968 18.2902 26.9891 17.5 25 17.5Z"
                                fill="black" />
                        </svg>
                    </div>
                </a>
                <a href="https://id.linkedin.com/?original_referer=https%3A%2F%2Fwww.google.com%2F">
                    <div
                        class="shadow-2xl rounded-full border-2 w-12 h-12 flex justify-center items-center hover:bg-blue-500 hover:border-white">
                        <svg width="24" height="23" viewBox="0 0 48 46" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 5.0025C9.99934 6.32858 9.47192 7.60009 8.53377 8.5373C7.59562 9.47452 6.32358 10.0007 4.9975 10C3.67142 9.99934 2.39991 9.47192 1.4627 8.53377C0.525486 7.59562 -0.000662415 6.32358 6.25904e-07 4.9975C0.000663667 3.67142 0.528084 2.39991 1.46623 1.4627C2.40439 0.525486 3.67642 -0.000662415 5.0025 6.25904e-07C6.32858 0.000663667 7.60009 0.528084 8.5373 1.46623C9.47452 2.40439 10.0007 3.67642 10 5.0025ZM10.15 13.7025H0.15V45.0025H10.15V13.7025ZM25.95 13.7025H16V45.0025H25.85V28.5775C25.85 19.4275 37.775 18.5775 37.775 28.5775V45.0025H47.65V25.1775C47.65 9.7525 30 10.3275 25.85 17.9025L25.95 13.7025Z"
                                fill="black" />
                        </svg>
                    </div>
                </a>
                <a href="https://twitter.com/?lang=id">
                    <div
                        class="shadow-2xl rounded-full border-2 w-12 h-12 flex justify-center items-center hover:bg-blue-300 hover:border-white">
                        <svg width="26" height="21" viewBox="0 0 53 43" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M52.3 5C50.375 5.875 48.3 6.45 46.15 6.725C48.35 5.4 50.05 3.3 50.85 0.775C48.775 2.025 46.475 2.9 44.05 3.4C42.075 1.25 39.3 0 36.15 0C30.275 0 25.475 4.8 25.475 10.725C25.475 11.575 25.575 12.4 25.75 13.175C16.85 12.725 8.925 8.45 3.65 1.975C2.725 3.55 2.2 5.4 2.2 7.35C2.2 11.075 4.075 14.375 6.975 16.25C5.2 16.25 3.55 15.75 2.1 15V15.075C2.1 20.275 5.8 24.625 10.7 25.6C9.12682 26.0305 7.47524 26.0904 5.875 25.775C6.55402 27.9062 7.88384 29.771 9.67754 31.1073C11.4712 32.4436 13.6386 33.1842 15.875 33.225C12.0841 36.2261 7.38499 37.8483 2.55 37.825C1.7 37.825 0.85 37.775 0 37.675C4.75 40.725 10.4 42.5 16.45 42.5C36.15 42.5 46.975 26.15 46.975 11.975C46.975 11.5 46.975 11.05 46.95 10.575C49.05 9.075 50.85 7.175 52.3 5Z"
                                fill="black" />
                        </svg>
                    </div>
                </a>
            </div>

        </form>
    </div>

    {{-- <div>
        <p class="text-center mb-6">atau masuk menggunakan</p>
        <div class="flex gap-5 mb-10 justify-center">
            <a href="https://www.facebook.com/">
                <div
                    class="shadow-2xl rounded-full border-2 w-12 h-12 flex justify-center items-center hover:bg-blue-800 hover:border-white">
                    <svg width="13" height="25" viewBox="0 0 27 50" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.5 28.75H23.75L26.25 18.75H17.5V13.75C17.5 11.175 17.5 8.75 22.5 8.75H26.25V0.35C25.435 0.2425 22.3575 0 19.1075 0C12.32 0 7.5 4.1425 7.5 11.75V18.75H0V28.75H7.5V50H17.5V28.75Z"
                            fill="black" />
                    </svg>
                </div>
            </a>
            <a href="https://www.instagram.com/">
                <div
                    class="shadow-2xl rounded-full border-2 w-12 h-12 flex justify-center items-center hover:bg-pink-500 hover:border-white">
                    <svg width="25" height="25" viewBox="0 0 50 50" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.5 0H35.5C43.5 0 50 6.5 50 14.5V35.5C50 39.3456 48.4723 43.0338 45.753 45.753C43.0338 48.4723 39.3456 50 35.5 50H14.5C6.5 50 0 43.5 0 35.5V14.5C0 10.6544 1.52767 6.96623 4.24695 4.24695C6.96623 1.52767 10.6544 0 14.5 0ZM14 5C11.6131 5 9.32387 5.94821 7.63604 7.63604C5.94821 9.32387 5 11.6131 5 14V36C5 40.975 9.025 45 14 45H36C38.3869 45 40.6761 44.0518 42.364 42.364C44.0518 40.6761 45 38.3869 45 36V14C45 9.025 40.975 5 36 5H14ZM38.125 8.75C38.9538 8.75 39.7487 9.07924 40.3347 9.66529C40.9208 10.2513 41.25 11.0462 41.25 11.875C41.25 12.7038 40.9208 13.4987 40.3347 14.0847C39.7487 14.6708 38.9538 15 38.125 15C37.2962 15 36.5013 14.6708 35.9153 14.0847C35.3292 13.4987 35 12.7038 35 11.875C35 11.0462 35.3292 10.2513 35.9153 9.66529C36.5013 9.07924 37.2962 8.75 38.125 8.75ZM25 12.5C28.3152 12.5 31.4946 13.817 33.8388 16.1612C36.183 18.5054 37.5 21.6848 37.5 25C37.5 28.3152 36.183 31.4946 33.8388 33.8388C31.4946 36.183 28.3152 37.5 25 37.5C21.6848 37.5 18.5054 36.183 16.1612 33.8388C13.817 31.4946 12.5 28.3152 12.5 25C12.5 21.6848 13.817 18.5054 16.1612 16.1612C18.5054 13.817 21.6848 12.5 25 12.5ZM25 17.5C23.0109 17.5 21.1032 18.2902 19.6967 19.6967C18.2902 21.1032 17.5 23.0109 17.5 25C17.5 26.9891 18.2902 28.8968 19.6967 30.3033C21.1032 31.7098 23.0109 32.5 25 32.5C26.9891 32.5 28.8968 31.7098 30.3033 30.3033C31.7098 28.8968 32.5 26.9891 32.5 25C32.5 23.0109 31.7098 21.1032 30.3033 19.6967C28.8968 18.2902 26.9891 17.5 25 17.5Z"
                            fill="black" />
                    </svg>
                </div>
            </a>
            <a href="https://id.linkedin.com/?original_referer=https%3A%2F%2Fwww.google.com%2F">
                <div
                    class="shadow-2xl rounded-full border-2 w-12 h-12 flex justify-center items-center hover:bg-blue-500 hover:border-white">
                    <svg width="24" height="23" viewBox="0 0 48 46" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 5.0025C9.99934 6.32858 9.47192 7.60009 8.53377 8.5373C7.59562 9.47452 6.32358 10.0007 4.9975 10C3.67142 9.99934 2.39991 9.47192 1.4627 8.53377C0.525486 7.59562 -0.000662415 6.32358 6.25904e-07 4.9975C0.000663667 3.67142 0.528084 2.39991 1.46623 1.4627C2.40439 0.525486 3.67642 -0.000662415 5.0025 6.25904e-07C6.32858 0.000663667 7.60009 0.528084 8.5373 1.46623C9.47452 2.40439 10.0007 3.67642 10 5.0025ZM10.15 13.7025H0.15V45.0025H10.15V13.7025ZM25.95 13.7025H16V45.0025H25.85V28.5775C25.85 19.4275 37.775 18.5775 37.775 28.5775V45.0025H47.65V25.1775C47.65 9.7525 30 10.3275 25.85 17.9025L25.95 13.7025Z"
                            fill="black" />
                    </svg>
                </div>
            </a>
            <a href="https://twitter.com/?lang=id">
                <div
                    class="shadow-2xl rounded-full border-2 w-12 h-12 flex justify-center items-center hover:bg-blue-300 hover:border-white">
                    <svg width="26" height="21" viewBox="0 0 53 43" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M52.3 5C50.375 5.875 48.3 6.45 46.15 6.725C48.35 5.4 50.05 3.3 50.85 0.775C48.775 2.025 46.475 2.9 44.05 3.4C42.075 1.25 39.3 0 36.15 0C30.275 0 25.475 4.8 25.475 10.725C25.475 11.575 25.575 12.4 25.75 13.175C16.85 12.725 8.925 8.45 3.65 1.975C2.725 3.55 2.2 5.4 2.2 7.35C2.2 11.075 4.075 14.375 6.975 16.25C5.2 16.25 3.55 15.75 2.1 15V15.075C2.1 20.275 5.8 24.625 10.7 25.6C9.12682 26.0305 7.47524 26.0904 5.875 25.775C6.55402 27.9062 7.88384 29.771 9.67754 31.1073C11.4712 32.4436 13.6386 33.1842 15.875 33.225C12.0841 36.2261 7.38499 37.8483 2.55 37.825C1.7 37.825 0.85 37.775 0 37.675C4.75 40.725 10.4 42.5 16.45 42.5C36.15 42.5 46.975 26.15 46.975 11.975C46.975 11.5 46.975 11.05 46.95 10.575C49.05 9.075 50.85 7.175 52.3 5Z"
                            fill="black" />
                    </svg>
                </div>
            </a>
        </div>
    </div> --}}
    <script>
        import {
            Input,
            Ripple,
            initTE,
        } from "tw-elements";

        initTE({
            Input,
            Ripple
        });

        $(document).ready(function() {
            $('.inputForm input').on('input', function() {
                checkInput($(this));
            });

            $('.inputForm input').each(function() {
                checkInput($(this));
            });

            function checkInput(input) {
                if (input.val().length > 0) {
                    input.siblings('label').addClass('active');
                } else {
                    input.siblings('label').removeClass('active');
                }
            }
        });
    </script>
@endsection
