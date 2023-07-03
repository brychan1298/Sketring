@extends('layouts.SideRegisLogin')
@section('title', 'Register')
@section('description', 'Halaman Register Sketring')
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

        .inputForm textarea:focus+label,
        .inputForm textarea:not(:placeholder-shown)+label {
            transform: translateY(-50%) scale(0.75);
            top: 0;
        }

        .relative .select-wrapper {
            position: relative;
        }

        .relative .select-wrapper select {
            padding-top: 1.5rem;
            /* Adjust as needed */
        }

        .relative .select-wrapper label {
            position: absolute;
            left: 0;
            top: 0;
            pointer-events: none;
            transform-origin: top left;
            transform: translateY(1.5rem);
            /* Adjust as needed */
            transition: transform 0.3s ease-in-out;
        }

        .relative .select-wrapper label.active,
        .relative .select-wrapper select:focus+label {
            transform: translateY(-50%) scale(0.75);
            /* Adjust scale as needed */
        }

        .relative .select-wrapper label.focus {
            color: #0369ff;
            /* Adjust color as needed */
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

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <div class="flex items-center justify-center p-5">
        {{-- <svg width="24" height="24" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z"
                fill="#000000" />
        </svg> --}}
        <h1 class="text-2xl font-bold">
            REGISTRASI
        </h1>
        <h1></h1>
    </div>
    <div class="px-12 py-5 bg-[#FFDB89] mx-[6.4vw] mb-8 rounded-md shadow-2xl">
        <form action="/register" method="post" class="mx-4">
            @csrf
            <input type="hidden" name="Role" value="{{ $roleId }}">
            {{-- <div class="relative">
                <input id="nama" type="text" placeholder="Nama" required value="{{ old('Nama') }}" name="Nama"
                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-[#850000] bg-transparent border-[#850000] border rounded border appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="Nama"
                    class="absolute text-sm bg-[#FFDB89] text-[#850000] duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                    Nama
                </label>
            </div> --}}
            <div class="relative inputForm mb-3 mt-3 " data-te-input-wrapper-init>
                <input id="Nama" type="text" placeholder="Nama" required value="{{ old('Nama') }}" name="Nama"
                    class="@if ($errors->has('Nama')) border border-red-500 @else shadow @endif
                text-[#850000] border-[#850000] border
                peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.20rem] leading-[2.15] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none
                focus:outline-none focus:shadow-outline
                focus:ring-0 focus:border-[#dc0000]"
                    id="Nama" placeholder=" " />
                <label for="Nama"
                    class="peer-focus:text-[#dc0000] pointer-events-none absolute bg-[#FFDB89] text-[#85000070] px-2 left-3 top-3 origin-[0] transition-all duration-300 text-md ">
                    Nama
                </label>
            </div>
            {{-- <div class="mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                    Nama
                </label>
                <input required value="{{ old('Nama') }}" name="Nama"
                    class="@if ($errors->has('Nama')) border border-red-500 @else border-none shadow @endif
                    shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="nama" type="text" placeholder="Nama">
            </div> --}}
            <div class="relative inputForm mb-3 mt-3 " data-te-input-wrapper-init>
                <input type="text" name="Email" required value="{{ old('Email') }}"
                    class="@if ($errors->has('Email')) border border-red-500 @else shadow @endif
                    text-[#850000] border-[#850000] border
                    peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.20rem] leading-[2.15] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none focus:placeholder:text-sm
                    focus:outline-none focus:shadow-outline
                    focus:ring-0 focus:[#dc0000]"
                    id="Email" placeholder="Email" />
                <label for="Email"
                    class="peer-focus:text-[#dc0000] pointer-events-none absolute bg-[#FFDB89] text-[#85000070] px-2 left-3 top-3 origin-[0] transition-all duration-300 text-md">Alamat
                    Email
                </label>
            </div>
            {{-- <div class="mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input required value="{{ old('Email') }}" name="Email"
                    class="@if ($errors->has('Email')) border border-red-500 @else border-none shadow @endif
                    shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" type="text" placeholder="Email">
            </div> --}}
            <div class="relative inputForm mb-3 mt-3 " data-te-input-wrapper-init>
                <input type="password" name="password" required
                    class="@if ($errors->has('password')) border border-red-500 @else @endif
                    text-[#850000] border-[#850000] border
                    peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.20rem] leading-[2.15] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none focus:placeholder:text-sm
                    focus:outline-none focus:shadow-outline
                    focus:ring-0 focus:[#dc0000]"
                    id="password" placeholder="Password" />
                <label for="password"
                    class="peer-focus:text-[#dc0000] pointer-events-none absolute bg-[#FFDB89] text-[#85000070] px-2 left-3 top-3 origin-[0] transition-all duration-300 text-md">
                    Password
                </label>
            </div>
            {{-- <div class="mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input required name="password"
                    class="@if ($errors->has('password')) border border-red-500 @else border-none shadow @endif
                    shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" type="password" placeholder="Password">
            </div> --}}
            <div class="relative inputForm mb-3 mt-3 " data-te-input-wrapper-init>
                <input type="number" name="Nohp" required
                    class="@if ($errors->has('Nohp')) border border-red-500 @else @endif
                    text-[#850000] border-[#850000] border
                    peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.20rem] leading-[2.15] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none focus:placeholder:text-sm
                    focus:outline-none focus:shadow-outline
                    focus:ring-0 focus:border-[#dc0000]"
                    id="nohp" placeholder="No Telepon" />
                <label for="nohp"
                    class="peer-focus:text-[#dc0000] pointer-events-none absolute bg-[#FFDB89] text-[#85000070] px-2 left-3 top-3 origin-[0] transition-all duration-300 text-md">
                    No Telepon
                </label>
            </div>
            {{-- <div class="mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Nohp">
                    No Telepon
                </label>
                <input required value="{{ old('Nohp') }}" name="Nohp"
                    class="@if ($errors->has('Nohp')) border border-red-500 @else border-none shadow @endif
                    shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="Nohp" type="text" placeholder="No Telepon">
            </div> --}}
            {{-- <div class="relative inputForm mb-12 mt-5 " data-te-input-wrapper-init>
                <textarea type="number" name="Nohp" required
                    class="@if ($errors->has('Nohp')) border border-red-500 @else @endif
                    text-[#850000] border-[#850000] border
                    peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.20rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0
                    focus:outline-none focus:shadow-outline"
                    id="Alamat" placeholder="No Telepon">
                </textarea>
                <label for="Alamat"
                    class="pointer-events-none absolute bg-[#FFDB89] text-[#850000] px-2 left-3 top-3 transition-all duration-300 text-md">
                    No Telepon
                </label>
            </div> --}}
            <div class="relative inputForm mb-3 mt-3 " data-te-input-wrapper-init>
                <textarea required name="Alamat"
                    class="@if ($errors->has('Alamat')) border border-red-500 @else @endif
                    text-[#850000] border-[#850000] border
                    peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.20rem] placeholder:opacity-0 placeholder:pt-2 leading-[2.15] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none focus:placeholder:text-sm
                    focus:outline-none focus:shadow-outline
                    focus:ring-0 focus:border-[#dc0000]"
                    id="Alamat" placeholder="Alamat">{{ old('Alamat') }}</textarea>
                <label for="Alamat"
                    class="peer-focus:text-[#dc0000] pointer-events-none absolute bg-[#FFDB89] text-[#85000070] px-2 rounded-xl left-3 top-3 origin-[0] transition-all duration-300">
                    Alamat
                </label>
            </div>

            {{-- <div class="mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Alamat">
                    Alamat
                </label>
                <textarea required name="Alamat" id="" rows="2" class="w-full" placeholder="Alamat" value="">
                    {{ old('Alamat') }}
                </textarea>
            </div> --}}
            <div class="flex">
                <div class="relative mb-5 mr-1 w-1/2" data-te-input-wrapper-init>
                    <div class="inputForm relative select-wrapper">
                        <select required id="Province-dropdown" name="provinsi"
                            class="
                            text-[#850000] border-[#850000] border text-sm
                            peer block min-h-[auto] w-full rounded bg-transparent px-1 pb-[0.32rem] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none
                            focus:outline-none focus:shadow-outline
                            focus:ring-0 focus:border-[#dc0000]"
                            onchange="checkInputSelect(this)" onfocus="focusInput(this)" onblur="blurInput(this)">
                            <option value="" disabled selected hidden></option>
                            @foreach ($provinces as $data)
                                @if (old('provinsi') == $data->id)
                                    <option value="{{ $data->id }}" selected>
                                        {{ $data->name }}
                                    </option>
                                @else
                                    <option value="{{ $data->id }}">
                                        {{ $data->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        <label for="Province-dropdown"
                            class="peer-focus:text-[#dc0000] pointer-events-none absolute bg-[#FFDB89] text-[#85000070] px-2 mx-3 rounded-xl origin-[0] transition-all duration-300 text-sm"
                            id="selectLabel">Provinsi</label>
                    </div>
                </div>
                <div class="relative mb-5 ml-1 w-1/2" data-te-input-wrapper-init>
                    <div class="inputForm relative select-wrapper">
                        <select required id="kota-dropdown" name="IdKota"
                            class="
                            text-[#850000] border-[#850000] border text-sm
                            peer block w-full rounded bg-transparent pb-[0.32rem] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none
                            focus:outline-none focus:shadow-outline
                            focus:ring-0 focus:border-[#dc0000]"
                            onchange="checkInputSelect(this)" onfocus="focusInput(this)" onblur="blurInput(this)">
                            <option value="" disabled selected hidden></option>
                        </select>
                        <label for="kota-dropdown"
                            class="peer-focus:text-[#dc0000] pointer-events-none absolute bg-[#FFDB89] text-[#85000070] px-2 mx-3 rounded-xl origin-[0] transition-all duration-300 text-sm"
                            id="selectLabel">Kota/Kabupaten</label>
                    </div>
                </div>
            </div>

            {{-- <div class="flex">
                <div class="form-group mb-3 w-1/2 mr-1">
                    <select required id="Province-dropdown" name="provinsi" class="text-sm rounded-lg w-full py-2">
                        <option value="">Pilih Provinsi</option>
                        @foreach ($provinces as $data)
                            @if (old('provinsi') == $data->id)
                                <option value="{{ $data->id }}" selected>
                                    {{ $data->name }}
                                </option>
                            @else
                                <option value="{{ $data->id }}">
                                    {{ $data->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3 w-1/2 ml-1">
                    <select required id="kota-dropdown" class="text-sm rounded-lg w-full py-2" name="IdKota">
                    </select>
                </div>
            </div> --}}

            {{-- <div class="flex mb-8 justify-center">
                <input type="checkbox" name="" id="" class="mr-3 w-5">
                <p>
                    Saya setuju dengan <a href="" class="text-decoration-none font-bold">Syarat dan Ketentuan</a>
                </p>
            </div> --}}
            <div class="mb-4 flex justify-center">
                <button type="submit" class="bg-[#DC0000] px-10 py-2.5 text-white rounded-md w-full">
                    DAFTAR
                </button>
            </div>

            <div class="text-center">
                Sudah punya akun? <a href="/login"
                    class="font-bold text-[#850000] underline text-md hover:text-red-600">Log In</a>
            </div>
        </form>
        <div
        class="my-4 mx-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-[#850000] after:mt-0.5 after:flex-1 after:border-t after:border-[#850000]">
        <p class="mx-4 mb-0 text-center font-semibold text-[#850000]">
            Or
        </p>
    </div>
    {{-- <p class="text-center mb-6">atau masuk menggunakan</p> --}}
    <div class="flex gap-5 justify-between mx-4 grid grid-cols-2">
        <a href="https://www.google.com/" class="">
            <div
                class="flex items-center text-[0.9vw] shadow-2xl bg-[#FFFFFF] rounded-md w-[1/2] py-2.5 text-center justify-center gap-2 text-[#000000] font-black hover:bg-[#850000] hover:text-[#FFFFFF]">
                <svg width="22" height="22" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M54.5138 25.1038H52.5V25H30V35H44.1288C42.0675 40.8213 36.5288 45 30 45C21.7163 45 15 38.2837 15 30C15 21.7163 21.7163 15 30 15C33.8238 15 37.3025 16.4425 39.9513 18.7987L47.0225 11.7275C42.5575 7.56625 36.585 5 30 5C16.1937 5 5 16.1937 5 30C5 43.8063 16.1937 55 30 55C43.8063 55 55 43.8063 55 30C55 28.3238 54.8275 26.6875 54.5138 25.1038Z"
                        fill="#FFC107" />
                    <path
                        d="M7.88232 18.3637L16.0961 24.3875C18.3186 18.885 23.7011 15 29.9998 15C33.8236 15 37.3023 16.4425 39.9511 18.7987L47.0223 11.7275C42.5573 7.56625 36.5848 5 29.9998 5C20.3973 5 12.0698 10.4212 7.88232 18.3637Z"
                        fill="#FF3D00" />
                    <path
                        d="M29.9999 54.9999C36.4574 54.9999 42.3249 52.5286 46.7612 48.5099L39.0237 41.9624C36.4293 43.9354 33.2592 45.0025 29.9999 44.9999C23.4974 44.9999 17.9762 40.8536 15.8962 35.0674L7.74365 41.3486C11.8812 49.4449 20.2837 54.9999 29.9999 54.9999Z"
                        fill="#4CAF50" />
                    <path
                        d="M54.5138 25.1038H52.5V25H30V35H44.1288C43.1428 37.7705 41.3667 40.1915 39.02 41.9637L39.0237 41.9613L46.7613 48.5087C46.2138 49.0062 55 42.5 55 30C55 28.3238 54.8275 26.6875 54.5138 25.1038Z"
                        fill="#1976D2" />
                </svg>
                Google Login
            </div>
        </a>
        <a href="https://www.facebook.com/" class="">
            <div
                class="flex items-center text-[0.9vw] shadow-2xl bg-[#FFFFFF] rounded-md w-[1/2] py-2.5 text-center justify-center gap-2 text-[#000000] font-black hover:bg-[#850000] hover:text-[#FFFFFF]">
                <svg width="22" height="22" viewBox="0 0 60 60" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_934_1016)">
                        <path
                            d="M60 30C60 13.4316 46.5684 0 30 0C13.4316 0 0 13.4313 0 30C0 44.9738 10.9706 57.3851 25.3125 59.6355V38.6719H17.6953V30H25.3125V23.3906C25.3125 15.8719 29.7914 11.7188 36.6438 11.7188C39.9263 11.7188 43.3594 12.3047 43.3594 12.3047V19.6875H39.5766C35.8495 19.6875 34.6875 22.0001 34.6875 24.3727V30H43.0078L41.6777 38.6719H34.6875V59.6355C49.0294 57.3851 60 44.974 60 30Z"
                            fill="#1877F2" />
                        <path
                            d="M41.6777 38.6719L43.0078 30H34.6875V24.3727C34.6875 21.9998 35.8498 19.6875 39.5766 19.6875H43.3594V12.3047C43.3594 12.3047 39.9263 11.7188 36.6438 11.7188C29.7914 11.7188 25.3125 15.8719 25.3125 23.3906V30H17.6953V38.6719H25.3125V59.6355C26.8632 59.8786 28.4304 60.0004 30 60C31.5696 60.0005 33.1368 59.8786 34.6875 59.6355V38.6719H41.6777Z"
                            fill="white" />
                    </g>
                    <defs>
                        <clipPath id="clip0_934_1016">
                            <rect width="60" height="60" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                Facebook Login
            </div>
        </a>
    </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        // function checkInputSelect(select) {
        //     var label = document.getElementById("selectLabel");
        //     if (select.value !== "") {
        //         label.classList.add('active');
        //     } else {
        //         label.classList.remove('active');
        //     }
        // }

        // function focusInput(select) {
        //     var label = document.getElementById("selectLabel");
        //     label.classList.add('focus');
        // }

        // function blurInput(select) {
        //     var label = document.getElementById("selectLabel");
        //     label.classList.remove('focus');
        // }

        $(document).ready(function() {
            $('#Province-dropdown').on('change', function() {
                var idProvince = this.value;
                $("#kota-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-kota') }}",
                    type: "POST",
                    data: {
                        Province_id: idProvince,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#kota-dropdown').html(
                            '<option value="" disabled selected hidden></option>');
                        $.each(result.states, function(key, value) {
                            $("#kota-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });

        // import {
        //     Input,
        //     Ripple,
        //     initTE,
        // } from "tw-elements";

        // initTE({
        //     Input,
        //     Ripple
        // });

        $(document).ready(function() {
            $('.inputForm input').on('input', function() {
                checkInput($(this));
            });

            $('.inputForm input').each(function() {
                checkInput($(this));
            });

            $('.inputForm textarea').on('input', function() {
                checkInput($(this));
            });

            $('.inputForm textarea').each(function() {
                checkInput($(this));
            });

            $('.inputForm select').on('change', function() {
                checkInput($(this));
            });

            $('.inputForm select').each(function() {
                checkInput($(this));
            });

            function checkInput(input) {
                if (input.val().length > 0) {
                    input.siblings('label').addClass('active');
                } else {
                    input.siblings('label').removeClass('active');
                }
            }

            function checkInputSelect(select) {
                if (select.value !== "") {
                    select.siblings('label').addClass('active');
                } else {
                    select.siblings('label').removeClass('active');
                }
            }
        });
    </script>

@endsection
