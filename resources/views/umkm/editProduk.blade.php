@extends('umkm.layouts.master')
@section('title', 'Edit Produk')
@section('description', 'Edit Produk UMKM')
@section('content')
    <style>
        .judulAddProduk {
            /* background-color: red; */
        }

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

        .formProduk {
            /* background-color: skyblue */
        }

        .formProduk input[type=text] {
            /* background-color: purple; */
            width: 100%;
        }

        form {
            /* background-color: blue; */
            width: 100%;
            align-items: center;
            /* display: flex; */
            /* flex-direction: column; */
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
            width: 20%
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
        // JavaScript code
        // function displayPhoto(event) {
        //   // Get the input element
        //   var input = event.target;

        //   // Create a FileReader
        //   var reader = new FileReader();

        //   // Set the function to run when the file is loaded
        //   reader.onload = function(){
        //     // Create an image element and set the source to the loaded file
        //     var img = document.createElement("img");
        //     img.src = reader.result;

        //     // Add the image to the preview div
        //     var previewDiv = document.getElementById("photoPreview");
        //     previewDiv.innerHTML = "";
        //     previewDiv.appendChild(img);
        //   };

        //   // Load the file as a data URL
        //   reader.readAsDataURL(input.files[0]);
        // }

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

    <div class="container mx-auto mt-32 px-[8vw]">
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
            <h2 class="textJudul 2xl:text-4xl lg:text-4xl md:text-3xl font-black sm:text-3xl text-2xl">Edit Produk</h2>
        </div>

        <hr class="my-8">
        @if(session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span>
                    {{session('success')}}
                </span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif
        <div class="formProduk flex justify-center">
            <form action="/umkm/updateProduk" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <input type="hidden" name="IdProduk" value="{{$produk->IdProduk}}">
                <label for="file-upload" class="cursor-pointer rounded-md font-semibold hover:text-indigo-700">
                    <div
                        class="uploadFoto bg-[#BCBCBC] mt-2 flex justify-center rounded-lg border border-dashed border-black-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" width="90" height="90" color="white"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 17.5q1.875 0 3.188-1.313T16.5 13q0-1.875-1.313-3.188T12 8.5q-1.875 0-3.188 1.313T7.5 13q0 1.875 1.313 3.188T12 17.5ZM4 21q-.825 0-1.413-.588T2 19V7q0-.825.588-1.413T4 5h3.15L9 3h6l1.85 2H20q.825 0 1.413.588T22 7v12q0 .825-.588 1.413T20 21H4Z" />
                            </svg>

                            <div class="mt-4 flex text-2xl leading-6 text-white">
                                <span>GANTI FOTO PRODUK</span>
                            </div>
                        </div>
                        <input id="file-upload" name="FotoProduk" type="file" class="hidden sr-only"
                                        accept=".jpg, .png, .jpeg" onchange="displayPhoto()">
                    </div><br>
                </label>
                <p id="Preview" class="font-black">
                    Preview :
                </p>

                <div class="photo flex flex-col justify-center items-center mb-4">
                    <img src="{{asset('storage/'.$produk->FotoProduk)}}" class="rounded-lg img-preview">
                </div>

                <label class="font-semibold" for="Nama">Nama Produk:</label>
                <input type="text" id="Nama" name="Nama" required value="{{$produk->Nama}}"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-400"
                    placeholder="Nama Produk"><br>

                <label class="font-semibold" for="Deskripsi">Deskripsi:</label>
                <textarea id="Deskripsi" name="Deskripsi" rows="4" required
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-400"
                    placeholder="Deskripsi">{{$produk->Deskripsi}}</textarea><br>

                <label class="font-semibold" for="Harga">Harga (Rp.):</label>
                <input type="number" id="Harga" required name="Harga" value="{{$produk->Harga}}"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-400"
                    placeholder="Harga"><br>

                <label class="font-semibold" for="MinOrder">Min. Order:</label>
                <input type="number" id="MinOrder" required name="MinOrder" value="{{$produk->MinOrder}}"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-400"
                    placeholder="Minimum Pemesanan"><br>

                <label class="font-semibold" for="MaxOrder">Max. Order:</label>
                <input type="number" id="MaxOrder" required name="MaxOrder" value="{{$produk->MaxOrder}}"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-400"
                    placeholder="Maximum Pemesanan"><br>

                <label class="font-semibold" for="MinimalWaktuPO">Minimal Waktu PO (hari):</label>
                <input type="number" id="MinimalWaktuPO" required name="MinimalWaktuPO" value="{{$produk->MinimalWaktuPO}}"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-400"
                    placeholder="Minimum PO(Hari)"><br>

                <div class="flex justify-center my-6">
                    <button type="submit" class="bg-[#850000] py-2 px-6 text-white rounded-md my-5">
                        SIMPAN PERUBAHAN
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
