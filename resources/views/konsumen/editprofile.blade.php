@extends('konsumen.layouts.master')
@section('title', 'Edit Profil Anda')
@section('description', 'Sunting Profil Anda')
@section('content')

{{-- <div class="container flex flex-col w-full mx-auto mt-32 max-sm:mt-6 px-36 max-sm:px-12">
    <div class="inline-flex max-sm:pt-16">
        <a href="/umkm/profileToko">
            <svg class="max-md:w-6 max-md:h-6" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z" fill="#850000"/>
            </svg>
        </a>
        <p class="mx-auto text-2xl font-bold text-center max-md:text-lg">EDIT PROFIL ANDA</p>
    </div>
</div> --}}

<img src="/images/home_banner.png" alt="" class="w-full mt-10 h-96 max-md:h-48 object-cover">

<form action="/konsumen/update" enctype="multipart/form-data" method="post">
@method('put')
@csrf
<div class="container mx-auto w-max">
    <div class="w-full">
        <div class="text-center w-fit max-lg:mx-auto">
            @if (Auth::User()->FotoProfil)
                <img src="{{asset('storage/'.Auth::User()->FotoProfil)}}" alt="SyamsulKatering.id" class="-mt-40 rounded-full w-80 h-80 max-lg:w-52 max-lg:h-52 max-lg:-mt-28 max-sm:-mt-20 max-sm:text-center max-sm:w-40 max-sm:h-40 img-preview">
            @else
                <img src="/images/fotoprofile_default.png" alt="SyamsulKatering.id" class="-mt-40 rounded-full w-80 h-80 max-lg:w-52 max-lg:h-52 max-lg:-mt-28 max-sm:-mt-20 max-sm:text-center max-sm:w-40 max-sm:h-40 img-preview">
            @endif
            <label for="FotoProfil">
            <div class="opacity-0 hover:opacity-100 flex flex-col items-center justify-center absolute bg-[black] w-80 h-80 rounded-full bg-opacity-50 -mt-80 max-lg:w-52 max-lg:h-52 max-sm:w-40 max-sm:h-40 max-lg:-mt-52 max-sm:-mt-40">
                <svg class="text-center max-lg:w-52 max-md:w-14" width="80" height="72" viewBox="0 0 80 72" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M40 57.7467C45 57.7467 49.2507 56.0189 52.752 52.5633C56.2533 49.1077 58.0027 44.9138 58 39.9817C58 35.047 56.2493 30.8518 52.748 27.3962C49.2467 23.9406 44.9973 22.2141 40 22.2167C35 22.2167 30.7493 23.9445 27.248 27.4001C23.7467 30.8557 21.9973 35.0496 22 39.9817C22 44.9164 23.7507 49.1116 27.252 52.5672C30.7533 56.0228 35.0027 57.7493 40 57.7467ZM8 71.5639C5.80001 71.5639 3.91601 70.7902 2.34801 69.2426C0.780006 67.6951 -0.00265987 65.837 6.79117e-06 63.6684V16.295C6.79117e-06 14.1237 0.784007 12.2643 2.35201 10.7168C3.92001 9.16928 5.80267 8.39683 8 8.39947H20.6L28 0.503906H52L59.4 8.39947H72C74.2 8.39947 76.084 9.17323 77.652 10.7208C79.22 12.2683 80.0027 14.1264 80 16.295V63.6684C80 65.8397 79.216 67.6991 77.648 69.2466C76.08 70.7941 74.1973 71.5666 72 71.5639H8Z"
                        fill="white" />
                </svg>
                <div class="px-10 mt-4 text-4xl font-black text-center text-white max-lg:text-xl max-sm:text-base max-md:px-4">
                    GANTI FOTO PROFIL
                </div>
            </div>
            </label>
            <input type="file" name="FotoProfil" id="FotoProfil" class="hidden" onchange="previewImage()">
            <p class="mt-8 text-2xl font-bold text-center max-lg:text-lg max-md:mt-4">{{Auth::User()->Nama}}</p>
        </div>
    </div>
</div>

<div class="container flex flex-col w-full mx-auto px-36 max-lg:px-8">
    {{-- <div class="w-[100%] flex flex-row-reverse mb-5 max-md:mb-2">
        <a href="/umkm/profileToko" class="flex flex-row w-max">
            <div class="flex flex-row bg-[#F8CB66] w-max text-[#DC0000] gap-[16px] items-center p-[16px] rounded-[10px]">
                <p class="text-xl font-bold max-md:text-base">SUNTING</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#DC0000" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                </svg>
            </div>
        </a>
    </div> --}}
    <div class="container-md flex flex-row justify-center w-full mt-12 gap-16 pb-[48px] max-xl:gap-12 max-lg:gap-8 max-md:grid max-md:grid-cols-1">
        {{-- <div class="container-md flex flex-col gap-[32px] max-md:grid max-md:grid-cols-2 max-sm:grid-cols-1">
            <div class="bg-[#D6FFE1] p-[24px] flex flex-col rounded-[10px] gap-[12px] text-[#088443] ml-16 max-lg:ml-0">
                <div class="flex flex-col">
                    <div class="w-[100%] flex flex-row justify-center items-center gap-[12px] rounded-[10px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6z"/>
                        </svg>
                        <p class="text-2xl font-bold max-lg:text-xl max-md:text-lg">SALDO:</p>
                    </div>
                    <p class="mt-2 text-xl font-bold text-center max-lg:text-lg max-md:text-base">@currency(Auth::User()->Saldo)</p>
                </div>
                <a href="#">
                    <p class="text-xl font-bold text-center underline max-md:text-lg">Tarik Saldo >></p>
                </a>
            </div>
            <div class="bg-[#FFE6AE] p-[24px] flex flex-col rounded-[10px] gap-[12px] ml-16 max-lg:ml-0">
                <div class="w-[100%] p-[12px] flex flex-row justify-center items-center gap-[12px] rounded-[10px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                    </svg>
                    <p class="text-2xl font-bold max-lg:text-xl max-md:text-lg">LOGOUT</p>
                </div>
            </div>
        </div> --}}
        <div class="bg-[#850000] w-9/12 text-white flex flex-col gap-[2.5vw] items-center p-[3vw] rounded-[10px] max-md:w-full max-md:p-6 max-md:gap-6">
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                    <p class="text-xl font-bold max-md:text-lg">Nama Toko</p>
                </div>
                <input type="text" name="Nama" class="max-md:text-base px-[24px] py-[16px] text-black bg-white rounded-[10px] text-lg" placeholder="Masukan Nama Lengkap Anda" value="{{Auth::User()->Nama}}">
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7Z"/></svg>
                    <p class="text-xl font-bold max-md:text-lg">Alamat</p>
                </div>
                <textarea name="Alamat" class="max-md:text-base px-[24px] py-[16px] text-black bg-white rounded-[10px] text-lg" placeholder="Masukan Alamat Lengkap Anda">{{Auth::User()->Alamat}}</textarea>
            </div>
            {{-- <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M12 20c4.4 0 8-3.6 8-8s-3.6-8-8-8s-8 3.6-8 8s3.6 8 8 8m0-18c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12S6.5 2 12 2m.5 10.8l-4.8 2.8l-.7-1.4l4-2.3V7h1.5v5.8Z"/></svg>
                    <p class="text-xl font-bold max-md:text-lg">Jam Operasional</p>
                </div>
                <input type="text" name="jam" class="max-md:text-base px-[24px] py-[16px] text-black bg-white rounded-[10px] text-lg" placeholder="Masukan Jam Operasional" value="06.00 - 21.00">
            </div> --}}
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20 20c-1.39 0-2.78-.47-4-1.33c-2.44 1.71-5.56 1.71-8 0C6.78 19.53 5.39 20 4 20H2v2h2c1.37 0 2.74-.35 4-1c2.5 1.3 5.5 1.3 8 0c1.26.65 2.62 1 4 1h2v-2h-2m.78-1H20c-1.18 0-2.36-.4-3.42-1.15l-.58-.4l-.58.4c-1.03.72-2.21 1.1-3.42 1.1c-1.23 0-2.41-.38-3.44-1.1l-.56-.4l-.57.4C6.36 18.6 5.18 19 4 19h-.78c.53-1.46 2.36-4 8.78-4c2 0 3 .24 3 .24c.68-1.37 1.83-4.47 1-8.42l1.06.71c.33 1.43.94 4.22-.26 8.12c2.63.85 3.62 2.35 3.98 3.35M22 7.59c-.79-1.09-2-1.88-3.42-2.06c.12.14.23.3.34.47a5.03 5.03 0 0 1-.45 5.95c.59-1.45.53-3.16-.39-4.59c-.08-.08-.12-.16-.18-.25c-.4-.58-.94-1.05-1.52-1.39c-2.03.65-3.5 2.55-3.5 4.78c0 .53.08 1.03.22 1.5c-.6-.83-.94-1.83-.94-2.93c0-1.66.8-3.12 2.04-4.04c-1.04-.08-2.11.15-3.06.75c-.44.27-.82.6-1.14.98c.39-.94 1.05-1.76 2-2.36a4.85 4.85 0 0 1 3.39-.71a5.2 5.2 0 0 0-1.06-1.09c-.41-.31-.86-.55-1.33-.72c1 .03 2.04.36 2.91 1.01c.44.33.79.73 1.09 1.16c.06 0 .12-.01.19-.01A5.03 5.03 0 0 1 22 7.59Z"/></svg>
                    <p class="text-xl font-bold max-md:text-lg">Provinsi</p>
                </div>
                <select required id="Province-dropdown" name="provinsi"
                            class="px-[24px] py-[16px] max-md:text-base text-black bg-white rounded-[10px]">
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
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15 11V5.83c0-.53-.21-1.04-.59-1.41L12.7 2.71a.996.996 0 0 0-1.41 0l-1.7 1.7C9.21 4.79 9 5.3 9 5.83V7H5c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-6c0-1.1-.9-2-2-2h-4zm-8 8H5v-2h2v2zm0-4H5v-2h2v2zm0-4H5V9h2v2zm6 8h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V9h2v2zm0-4h-2V5h2v2zm6 12h-2v-2h2v2zm0-4h-2v-2h2v2z"/></svg>
                    <p class="text-xl font-bold max-md:text-lg">Kota</p>
                </div>
                <select required id="kota-dropdown" class="max-md:text-base px-[24px] py-[16px] text-black bg-white rounded-[10px]"
                            name="IdKota">
                </select>
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5l-8-5V6l8 5l8-5v2z"/></svg>
                    <p class="text-xl font-bold max-md:text-lg">Email</p>
                </div>
                <input type="email" name="Email" class="max-md:text-base px-[24px] py-[16px] text-black bg-white rounded-[10px] text-lg" placeholder="Masukan Email" value="{{Auth::User()->Email}}">
            </div>
            <div class="w-[100%] flex flex-col gap-[8px]">
                <div class="w-[100%] flex flex-row gap-[1vw] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                    <p class="text-xl font-bold max-md:text-lg">No. Telepon</p>
                </div>
                <input type="no_telepon" name="Nohp" class="max-md:text-base px-[24px] py-[16px] text-black bg-white rounded-[10px] text-lg" placeholder="Masukan Nomor Telepon" value="{{Auth::User()->Nohp}}">
            </div>
        </div>
    </div>
    <div class="flex justify-center gap-5 mb-16">
        <a href="/profileKonsumen" class="max-md:text-lg font-bold border-2 border-solid border-[#DC0000] text-[#DC0000] text-2xl px-7 py-2 my-5 rounded-md hover:text-[#850000] hover:border-[#850000]">
            BATAL
        </a>
        <button type="submit" class="max-md:text-lg border-2 text-white bg-[#DC0000] px-7 py-2 text-2xl rounded-md my-5 hover:bg-[#850000] hover:text-white">
            SIMPAN
        </button>
    </div>
</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
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
                            '<option value="">Pilih Kota</option>');
                        $.each(result.states, function(key, value) {
                            $("#kota-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });

        function previewImage(){
            const image = document.querySelector('#FotoProfil');
            const previewed = document.querySelector('.img-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                previewed.src = oFREvent.target.result
            }
        }

    </script>

@endsection
