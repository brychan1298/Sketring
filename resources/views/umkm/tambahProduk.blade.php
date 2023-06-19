@extends('umkm.layouts.master')
@section('title', 'Tambah Produk')
@section('description', 'Halaman Tambah Produk')
@section('content')
    <style>

        .textJudul {
            text-align: center;
            margin: 0;
            flex-grow: 1;
        }

        hr {
            border: 0.1px solid rgb(110, 110, 110);
        }

        .formProduk label {
            font-family: 'Open Sans';
            /* font-weight: 500; */
            color: #850000;
        }

        .formProduk input[type=text] {
            /* background-color: purple; */
            width: 100%;
        }

        .form {
            /* background-color: blue; */
            /* padding: 0px 50px; */
            /* width: 450px; */
            align-items: center;
        }

        .formProduk input[type=number] {
            /* background-color: purple; */
            width: 100%;
        }

        .photoPreview {
            align-items: center;
            width: 10px;
        }

        .uploadPhoto {
            display: flex;
            justify-content: center;
            align-items: center;
            /* width: 20% */
        }

        input[type="file"] {
            z-index: -1;
            position: absolute;
            opacity: 0;
        }

        input:focus+label {
            outline: 2px solid;
        }

        .radioButton label {
            margin-right: 10px;
        }

        #photoPreview {
            display: none;
            width: 155px;
            border: 2px dashed #333;
            margin-bottom: 20px;
        }

        #photoPreview img {
            width: 100%;
            height: auto;
            display: block;
        }
    </style>

    <script>
        function displayPhoto() {
            const image = document.querySelector('#file-upload');
            const previewed = document.querySelector('.img-preview');
            const preview = document.querySelector('#Preview');

            preview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                previewed.src = oFREvent.target.result
            }
        }
    </script>

    <div class="container px-[8vw] mx-auto mt-32">
        <div class="judulAddProduk flex items-center justify-center">
            <a href="/umkm/dashboard">
                <svg class="w-10 h-10" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <title>ionicons-v5-a</title>
                        <polyline points="244 400 100 256 244 112"
                            style="fill:none;stroke:#850000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px">
                        </polyline>
                        <line x1="120" y1="256" x2="412" y2="256"
                            style="fill:none;stroke:#850000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px">
                        </line>
                    </g>
                </svg>
            </a>
            <h2 class="textJudul 2xl:text-4xl lg:text-4xl md:text-3xl font-black sm:text-3xl text-2xl">Tambah Produk</h2>
        </div>

        <hr class="my-8">

        <div class="formProduk flex justify-center">
            <form action="/tambahProduk" class=" w-full form" enctype="multipart/form-data" method="post">
                @csrf
                <label for="file-upload" class="cursor-pointer rounded-md font-semibold">
                    <div class="uploadFoto bg-[#BCBCBC] flex justify-center rounded-lg border border-dashed border-black-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" width="90" height="90" color="white"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 17.5q1.875 0 3.188-1.313T16.5 13q0-1.875-1.313-3.188T12 8.5q-1.875 0-3.188 1.313T7.5 13q0 1.875 1.313 3.188T12 17.5ZM4 21q-.825 0-1.413-.588T2 19V7q0-.825.588-1.413T4 5h3.15L9 3h6l1.85 2H20q.825 0 1.413.588T22 7v12q0 .825-.588 1.413T20 21H4Z" />
                            </svg>

                            <div class="mt-4 flex text-2xl leading-6 text-white">
                                <span>TAMBAH FOTO PRODUK</span>
                            </div>

                            <div id="photoPreview"></div>
                        </div>
                        <input id="file-upload" name="FotoProduk" type="file" class="hidden sr-only"
                                        accept=".jpg, .png, .jpeg" required onchange="displayPhoto()">
                    </div><br>
                </label>
                <p id="Preview" class="font-black hidden">Preview :</p>
                <img src="" alt="" class="img-preview mb-4">


                <label class="font-semibold" for="Nama">Nama Produk:</label>
                <input type="text" id="Nama" name="Nama" required value=""
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-400"
                    placeholder="Nama Produk"><br>

                <label class="font-semibold" for="Deskripsi">Deskripsi:</label>
                <textarea id="Deskripsi" name="Deskripsi" rows="4" required
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-400"
                    placeholder="Deskripsi"></textarea><br>

                <label class="font-semibold" for="Harga">Harga (Rp.):</label>
                <input type="number" id="Harga" required name="Harga" value=""
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-400"
                    placeholder="Harga"><br>

                <label class="font-semibold" for="MinOrder">Min. Pemesanan:</label>
                <input type="number" id="MinOrder" required name="MinOrder" value=""
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-400"
                    placeholder="Minimum Pemesanan"><br>

                <label class="font-semibold" for="MaxOrder">Max Order:</label>
                <input type="number" id="MaxOrder" required name="MaxOrder" value=""
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-400"
                    placeholder="Maximum Pemesanan"><br>

                <label class="font-semibold" for="MinimalWaktuPO">Minimal Waktu PO (hari):</label>
                <input type="number" id="MinimalWaktuPO" required name="MinimalWaktuPO" value=""
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-400"
                    placeholder="Minimum PO(Hari)"><br>

                <div class="flex justify-center my-6">
                    <button type="submit" class="bg-[#850000] py-2 px-6 text-white rounded-md my-5">
                        SUBMIT
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
