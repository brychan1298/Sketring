@extends('konsumen.layouts.master')
@section('title', 'Tarik Saldo Konsumen')
@section('description', 'Halaman Tarik Saldo Konsumen')
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
</style>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

<div class="container m-auto mt-[130px]">
    <div class="flex items-center justify-center judulAddProduk">
        <a href="/tarikSaldo">
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
        <h2 class="text-4xl font-black max-md:text-2xl max-lg:text-3xl textJudul">Tarik Saldo</h2>
    </div>

    <hr class="my-8">

    <div class="flex justify-center">
        <div class="relative flex items-center justify-center w-1/2 btn-container bal" x-data="{ show: true }">
            <h1 class="money text-[#850000] text-3xl max-lg:text-2xl px-2 font-bold" id="saldo">@currency(Auth::User()->Saldo)</h1>
        </div>
    </div>

    <div class="flex flex-col pb-6 mx-12 md:mx-24 lg:mx-32" id="tarikSaldoForm">
        <h1 class="mt-16 text-2xl">Debit</h1>
        <hr class="h-px my-3 bg-gray-500 border-0">


        <form action="/tarikSaldoDebit/{{ Auth::User()->IdUser }}" method="POST">
            @csrf
            @method('put')
            <select required id="debit" class="bg-[#F3F3F3] shadow-md text-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4">
                <option selected disabled value="">Pilih Bank</option>
                <option value="BCA">BCA</option>
                <option value="Mandiri">Mandiri</option>
                <option value="BRI">BRI</option>
                <option value="BSI">BSI</option>
                <option value="BNI">BNI</option>
            </select>
            <div class="">
                <input type="text" id="rekening" placeholder="No Rekening" class="w-4/5 p-2 my-12 text-lg border-b-2 border-gray-400 outline-none 2xl:w-1/3 md:w-3/5 lg:w-2/5 focus:border-black" required>
            </div>
            <div class="">
                <input type="number" id="nominal" min="0" name="nominal" placeholder="Rp Jumlah" class="w-4/5 p-2 my-8 text-lg border-b-2 border-gray-400 outline-none 2xl:w-1/3 md:w-3/5 lg:w-2/5 focus:border-black" required>
            </div>
            <div class="flex justify-center my-10">
                <button type="submit" class="px-12 py-2 text-xl font-bold text-white bg-red-600 rounded hover:bg-red-800" id="tarik">
                    TARIK
                </button>
            </div>
        </form>

    </div>
</div>

<script>
    const tarikBtn = document.getElementById('tarik');
    tarikBtn.addEventListener('click', function(){
        var selectedOption = document.getElementById("debit").value;
        var noRekening = document.getElementById("rekening").value;
        var nominal = document.getElementById("nominal").value;

        // validasi
        if (selectedOption === null || selectedOption === "") {
            event.preventDefault();
            alert("Anda harus memilih salah satu bank.");
        } else if (noRekening === null || noRekening === "") {
            event.preventDefault();
            alert("Silahkan masukan nomor rekening!");
        } else if(!(noRekening >= '0' && noRekening <= '9')){
            event.preventDefault();
            alert('No.Rekening harus berupa angka!');
        } else if (noRekening.length != 15) {
            event.preventDefault();
            alert("No.Rekening yang Anda masukan tidak valid!");
        } else if (nominal <= 0) {
            event.preventDefault();
            alert("Jumlah saldo yang ingin ditarik tidak valid!");
        } else if (nominal > 0 && nominal > {{ Auth::User()->Saldo }}) {
            event.preventDefault();
            alert("Maaf, saldo Anda tidak mencukupi!");
        } else {
            alert("Saldo berhasil ditarik!");
        }

    })
</script>

@endsection
