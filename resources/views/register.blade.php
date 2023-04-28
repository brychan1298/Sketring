@extends('layouts.SideRegisLogin')
@section('title','Register')
@section('description','Halaman Register Sketring')
@section('contents')
<div class="flex items-center justify-between p-5">
    <svg width="24" height="24" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z" fill="#000000"/>
    </svg>
    <h1 class="text-2xl">
        REGISTRASI
    </h1>
    <h1></h1>
</div>
<div class="px-12 py-5 bg-[#FFDB89] mx-[7vw] mb-8  shadow-2xl">
    <form action="/register" method="post">
        @csrf
        <input type="hidden" name="Role" value="{{$roleId}}">
        <div class="mb-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                Nama
            </label>
            <input required
                    value="{{ old('Nama') }}"
                    name="Nama"
                    class="@if($errors->has('Nama')) border border-red-500 @else border-none shadow @endif
                    shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" type="text" placeholder="Nama">
        </div>
        <div class="mb-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input required
                    value="{{ old('Email') }}"
                    name="Email"
                    class="@if($errors->has('Email')) border border-red-500 @else border-none shadow @endif
                    shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Email">
        </div>
        <div class="mb-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input required
                    name="password"
                    class="@if($errors->has('password')) border border-red-500 @else border-none shadow @endif
                    shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="password" placeholder="Password">
        </div>
        <div class="mb-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="Nohp">
                No Telepon
            </label>
            <input required
                    value="{{ old('Nohp') }}"
                    name="Nohp"
                    class="@if($errors->has('Nohp')) border border-red-500 @else border-none shadow @endif
                    shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Nohp" type="text" placeholder="No Telepon">
        </div>
        <div class="mb-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="Alamat">
                Alamat
            </label>
            <textarea required name="Alamat" id="" rows="2" class="w-full" placeholder="Alamat" value="">
                {{ old('Alamat') }}
            </textarea>
        </div>
        <div class="flex">
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
        </div>

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
</script>

@endsection
