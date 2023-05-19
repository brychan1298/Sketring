@extends('konsumen.layouts.master')
@section('title', 'Edit Profil')
@section('description', 'Edit Profil Anda')
@section('content')
    <div class="container-md mx-auto flex flex-col mt-[48px] w-full">
        <div class="flex flex-row w-full h-max justify-start p-[48px]">
            <a href="/" class="z-50">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#850000"
                        class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                </div>
            </a>
            <p class="w-full text-center ml-[-48px] text-2xl font-bold">
                PROFIL ANDA
            </p>
        </div>
        <form action="/konsumen/update" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="container-md xl:flex xl:flex-row justify-center gap-[32px] w-full px-[48px] pb-[48px]">
                <div class="container-md flex flex-col xl:w-[15%] gap-[32px] md:w-[100%]">
                    <div class="bg-[#FFE6AE] p-[24px] flex flex-col rounded-[10px] gap-[12px]">
                        <div
                            class="w-[100%] p-[12px] flex flex-row justify-center items-center gap-[12px] rounded-[10px] bg-[#F8CB66]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                            <p class="font-bold">PROFIL</p>
                        </div>
                        <div class="w-[100%] p-[12px] flex flex-row justify-center items-center gap-[12px] rounded-[10px]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                            </svg>
                            <p class="font-bold text-1xl">KELUAR</p>
                        </div>
                    </div>
                    <div class="bg-[#D6FFE1] p-[24px] flex flex-col rounded-[10px] gap-[12px] text-[#088443] mb-10">
                        <div class="flex flex-col">
                            <div class="w-[100%] text-center">
                                <p class="font-bold text-2xl">SALDO:</p>
                            </div>
                            <div class="w-[100%] flex flex-row justify-center items-center gap-[12px] rounded-[10px]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path
                                        d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6z" />
                                </svg>
                                <p class="text-2xl font-bold">{{ Auth::User()->Saldo }}</p>
                            </div>
                        </div>
                        <a href="#">
                            <p class="font-bold text-1xl text-center underline">Tarik Saldo >></p>
                        </a>
                    </div>
                </div>

                <div
                    class="bg-[#850000] md:w-[75%] w-[100%] text-white flex flex-col gap-[16px] items-center p-[32px] rounded-[10px]">
                    <label for="FotoProfil">
                        <div class="flex flex-col relative">
                            <input type="hidden" name="oldImage" value="{{ Auth::User()->FotoProfil }}">
                            @if (Auth::User()->FotoProfil)
                                <img class="img-preview rounded-full w-[360px] h-[360px]" id="images"
                                    src="{{ asset('storage/' . Auth::User()->FotoProfil) }}" alt="">
                            @else
                                <img class="img-preview rounded-full w-[360px] h-[360px]" id="images"
                                    src="images/profile.png" alt="">
                            @endif
                            <div
                                class="flex flex-col items-center justify-center absolute bg-[black] w-[360px] h-[360px] rounded-full bg-opacity-50">
                                <svg class="text-center" width="80" height="72" viewBox="0 0 80 72" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M40 57.7467C45 57.7467 49.2507 56.0189 52.752 52.5633C56.2533 49.1077 58.0027 44.9138 58 39.9817C58 35.047 56.2493 30.8518 52.748 27.3962C49.2467 23.9406 44.9973 22.2141 40 22.2167C35 22.2167 30.7493 23.9445 27.248 27.4001C23.7467 30.8557 21.9973 35.0496 22 39.9817C22 44.9164 23.7507 49.1116 27.252 52.5672C30.7533 56.0228 35.0027 57.7493 40 57.7467ZM8 71.5639C5.80001 71.5639 3.91601 70.7902 2.34801 69.2426C0.780006 67.6951 -0.00265987 65.837 6.79117e-06 63.6684V16.295C6.79117e-06 14.1237 0.784007 12.2643 2.35201 10.7168C3.92001 9.16928 5.80267 8.39683 8 8.39947H20.6L28 0.503906H52L59.4 8.39947H72C74.2 8.39947 76.084 9.17323 77.652 10.7208C79.22 12.2683 80.0027 14.1264 80 16.295V63.6684C80 65.8397 79.216 67.6991 77.648 69.2466C76.08 70.7941 74.1973 71.5666 72 71.5639H8Z"
                                        fill="white" />
                                </svg>
                                <div class="text-4xl px-10 text-center font-black mt-4">
                                    GANTI FOTO PROFIL
                                </div>
                            </div>
                        </div>
                    </label>
                    <input type="file" name="FotoProfil" id="FotoProfil" class="hidden" onchange="previewImage()">
                    <p class="text-center text-2xl font-bold">{{ Auth::User()->Nama }}</p>

                    <div class="w-[100%] flex flex-col gap-[8px]">
                        <div class="w-[100%] flex flex-row gap-[8px] items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                            <p class="font-bold">Nama Lengkap</p>
                        </div>
                        <input type="text" name="Nama" class="px-[24px] py-[16px] text-black bg-white rounded-[10px]"
                            value="{{ Auth::User()->Nama }}">
                    </div>
                    <div class="w-[100%] flex flex-col gap-[8px]">
                        <div class="w-[100%] flex flex-row gap-[8px] items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7Z" />
                            </svg>
                            <p class="font-bold">Alamat</p>
                        </div>
                        <input type="text" name="Alamat"
                            class="px-[24px] py-[16px] text-black bg-white rounded-[10px]"
                            value="{{ Auth::User()->Alamat }}">
                    </div>
                    <div class="w-[100%] flex flex-col gap-[8px]">
                        <div class="w-[100%] flex flex-row gap-[8px] items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M20 20c-1.39 0-2.78-.47-4-1.33c-2.44 1.71-5.56 1.71-8 0C6.78 19.53 5.39 20 4 20H2v2h2c1.37 0 2.74-.35 4-1c2.5 1.3 5.5 1.3 8 0c1.26.65 2.62 1 4 1h2v-2h-2m.78-1H20c-1.18 0-2.36-.4-3.42-1.15l-.58-.4l-.58.4c-1.03.72-2.21 1.1-3.42 1.1c-1.23 0-2.41-.38-3.44-1.1l-.56-.4l-.57.4C6.36 18.6 5.18 19 4 19h-.78c.53-1.46 2.36-4 8.78-4c2 0 3 .24 3 .24c.68-1.37 1.83-4.47 1-8.42l1.06.71c.33 1.43.94 4.22-.26 8.12c2.63.85 3.62 2.35 3.98 3.35M22 7.59c-.79-1.09-2-1.88-3.42-2.06c.12.14.23.3.34.47a5.03 5.03 0 0 1-.45 5.95c.59-1.45.53-3.16-.39-4.59c-.08-.08-.12-.16-.18-.25c-.4-.58-.94-1.05-1.52-1.39c-2.03.65-3.5 2.55-3.5 4.78c0 .53.08 1.03.22 1.5c-.6-.83-.94-1.83-.94-2.93c0-1.66.8-3.12 2.04-4.04c-1.04-.08-2.11.15-3.06.75c-.44.27-.82.6-1.14.98c.39-.94 1.05-1.76 2-2.36a4.85 4.85 0 0 1 3.39-.71a5.2 5.2 0 0 0-1.06-1.09c-.41-.31-.86-.55-1.33-.72c1 .03 2.04.36 2.91 1.01c.44.33.79.73 1.09 1.16c.06 0 .12-.01.19-.01A5.03 5.03 0 0 1 22 7.59Z" />
                            </svg>
                            <p class="font-bold">Provinsi</p>
                        </div>
                        <select required id="Province-dropdown" name="provinsi"
                            class="px-[24px] py-[16px] text-black bg-white rounded-[10px]">
                            <option value="">Pilih Provinsi</option>
                            @foreach ($provinces as $data)
                                @if (Auth::User()->Regency->Province->id == $data->id)
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
                    <div class="w-[100%] flex flex-col gap-[8px]">
                        <div class="w-[100%] flex flex-row gap-[8px] items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M15 11V5.83c0-.53-.21-1.04-.59-1.41L12.7 2.71a.996.996 0 0 0-1.41 0l-1.7 1.7C9.21 4.79 9 5.3 9 5.83V7H5c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-6c0-1.1-.9-2-2-2h-4zm-8 8H5v-2h2v2zm0-4H5v-2h2v2zm0-4H5V9h2v2zm6 8h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V9h2v2zm0-4h-2V5h2v2zm6 12h-2v-2h2v2zm0-4h-2v-2h2v2z" />
                            </svg>
                            <p class="font-bold">Kota</p>
                        </div>
                        <select required id="kota-dropdown" class="px-[24px] py-[16px] text-black bg-white rounded-[10px]"
                            name="IdKota">
                        </select>
                    </div>
                    <div class="w-[100%] flex flex-col gap-[8px]">
                        <div class="w-[100%] flex flex-row gap-[8px] items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5l-8-5V6l8 5l8-5v2z" />
                            </svg>
                            <p class="font-bold">Email</p>
                        </div>
                        <input type="email" name="Email"
                            class="px-[24px] py-[16px] text-black bg-white rounded-[10px]"
                            value="{{ Auth::User()->Email }}">
                    </div>
                    <div class="w-[100%] flex flex-col gap-[8px]">
                        <div class="w-[100%] flex flex-row gap-[8px] items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5l-8-5V6l8 5l8-5v2z" />
                            </svg>
                            <p class="font-bold">No Telepon</p>
                        </div>
                        <input type="text" name="Nohp"
                            class="px-[24px] py-[16px] text-black bg-white rounded-[10px]"
                            value="{{ Auth::User()->Nohp }}">
                    </div>
                    <div class="flex gap-5">
                        <a href="/profileKonsumen"
                            class="font-bold border-2 text-2xl px-7 py-2 my-5 rounded-md hover:text-[#DC0000] hover:bg-white">
                            BATAL
                        </a>
                        <button type="submit"
                            class="border-2 text-[#DC0000] bg-white px-7 py-2 text-2xl rounded-md my-5 hover:bg-[#850000] hover:text-white">
                            SIMPAN
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            var idProvince = document.querySelector("#Province-dropdown").value;
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
                        '<option value="">Pilih Kota</option>');
                    $.each(result.states, function(key, value) {
                        if (value.id == {{ Auth::User()->IdKota }}) {
                            $("#kota-dropdown").append('<option selected value="' + value
                                .id + '">' + value.name + '</option>');
                        }
                        $("#kota-dropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });

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
                            '<option value="">Pilih Kota</option>');
                        $.each(result.states, function(key, value) {
                            $("#kota-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });

        function previewImage() {
            const image = document.querySelector('#FotoProfil');
            const previewed = document.querySelector('.img-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                previewed.src = oFREvent.target.result
            }
        }
    </script>

@endsection
