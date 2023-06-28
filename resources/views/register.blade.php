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
    <div class="flex items-center justify-between p-5">
        <svg width="24" height="24" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z"
                fill="#000000" />
        </svg>
        <h1 class="text-2xl">
            REGISTRASI
        </h1>
        <h1></h1>
    </div>
    <div class="px-12 py-5 bg-[#FFDB89] mx-[7vw] mb-8  shadow-2xl">
        <form action="/register" method="post">
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
            <div class="relative inputForm mb-5 mt-5 " data-te-input-wrapper-init>
                <input id="Nama" type="text" placeholder="Nama" required value="{{ old('Nama') }}" name="Nama"
                    class="@if ($errors->has('Nama')) border border-red-500 @else shadow @endif
                text-[#850000] border-[#850000] border
                peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.32rem] leading-[2.15] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none
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
            <div class="relative inputForm mb-5 mt-5 " data-te-input-wrapper-init>
                <input type="text" name="Email" required value="{{ old('Email') }}"
                    class="@if ($errors->has('Email')) border border-red-500 @else shadow @endif
                    text-[#850000] border-[#850000] border
                    peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.32rem] leading-[2.15] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none focus:placeholder:text-sm
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
            <div class="relative inputForm mb-5 mt-5 " data-te-input-wrapper-init>
                <input type="password" name="password" required
                    class="@if ($errors->has('password')) border border-red-500 @else @endif
                    text-[#850000] border-[#850000] border
                    peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.32rem] leading-[2.15] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none focus:placeholder:text-sm
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
            <div class="relative inputForm mb-5 mt-5 " data-te-input-wrapper-init>
                <input type="number" name="Nohp" required
                    class="@if ($errors->has('Nohp')) border border-red-500 @else @endif
                    text-[#850000] border-[#850000] border
                    peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.32rem] leading-[2.15] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none focus:placeholder:text-sm
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
                    peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0
                    focus:outline-none focus:shadow-outline"
                    id="Alamat" placeholder="No Telepon">
                </textarea>
                <label for="Alamat"
                    class="pointer-events-none absolute bg-[#FFDB89] text-[#850000] px-2 left-3 top-3 transition-all duration-300 text-md">
                    No Telepon
                </label>
            </div> --}}
            <div class="relative inputForm mb-5 mt-5 " data-te-input-wrapper-init>
                <textarea required name="Alamat"
                    class="@if ($errors->has('Alamat')) border border-red-500 @else @endif
                    text-[#850000] border-[#850000] border
                    peer block min-h-[auto] w-full rounded bg-transparent px-3 py-[0.32rem] placeholder:opacity-0 placeholder:pt-2 leading-[2.15] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none focus:placeholder:text-sm
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
                            peer block min-h-[auto] w-full rounded bg-transparent px-1 pb-[0.32rem] transition-all duration-200 ease-linear placeholder:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none
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
                Sudah punya akun? <a href="/login" class="font-bold hover:text-red-600">Log In</a>
            </div>
        </form>
    </div>

    <div>
        <p class="text-center mb-6">atau registrasi menggunakan</p>
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
