@extends('konsumen.layouts.master')
@section('title', 'Pesanan yang sudah selesai')
@section('description', 'Daftar Pesanan Konsumen Yang Sudah Selesai')
@section('content')
    <div class="container mx-auto flex flex-col items-center px-36 max-lg:px-12 w-full">
        <div class="flex flex-col justify-center items-center w-full gap-2">
            <div class="container flex flex-col w-full mx-auto mt-36 mb-8 max-sm:mt-12 justify-between">
                <div class="inline-flex max-sm:pt-16">
                    <a href="/profileKonsumen">
                        <svg class="max-md:w-6 max-md:h-6" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.0024 33.6666L0.335693 16.9999L17.0024 0.333252L19.9711 3.24992L8.30444 14.9166H33.669V19.0833H8.30444L19.9711 30.7499L17.0024 33.6666Z" fill="#850000"/>
                        </svg>
                    </a>
                    <p class="mx-auto text-2xl font-bold text-center">PESANAN ANDA</p>
                </div>
            </div>
            {{-- Status Selection --}}
            @include('konsumen.pesanan.layoutPesanan')
            {{-- Select Event --}}
            <div class="flex flex-row w-[100%] justify-end">
                <select id="IdAcara" onchange="filterData()"
                    class="bg-[#850000] text-white text-sm rounded-[10px] focus:ring-blue-500 focus:border-blue-500 block w-48 p-2">
                    <option selected value="0">Semua Keranjang</option>
                    @foreach ($ListAcara as $Acara)
                        <option value="{{ $Acara->IdAcara }}">{{ $Acara->Nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Order List --}}
            <div id="ListTransaksi" class="w-full">
                @include('konsumen.pesanan.datapesananselesai', ['ListTransaksi' => $ListTransaksi])
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function filterData() {
            var selectedIdAcara = document.getElementById("IdAcara").value;

            $.ajax({
                type: "GET",
                url: '/konsumen/filter-pesanan-selesai',
                data: {
                    IdAcara: selectedIdAcara
                },
                success: function(data) {
                    $('#ListTransaksi').html(data);
                }
            })
        }

        // Get all the star SVGs
        const stars = document.querySelectorAll('.star-svg');
        let lastClickedId = 'star-6';
        // Function to handle the click event
        function handleClick(event) {
            const clickedStarId = event.currentTarget.id;
            // const lastClickedId = event.currentTarget.id;


            lastClickedId = clickedStarId;
            // Loop through all the stars
            stars.forEach(star => {
                const starId = star.id;

                // Change the class based on the clicked star and its position
                if (clickedStarId === starId || (clickedStarId.startsWith('star-') && starId.startsWith('star-') &&
                        starId <= clickedStarId)) {
                    star.classList.remove('text-gray-500');
                    star.classList.add('text-yellow-500');
                } else {
                    star.classList.remove('text-yellow-500');
                    star.classList.add('text-gray-500');
                }
            });
        }

        var itemId = 0;
        var idx = 0;

        window.onload = () => {
            var rateBtn = document.getElementsByClassName('berirating');
            var list = document.getElementsByClassName("list");
            for (let index = 0; index < rateBtn.length; index++) {
                rateBtn[index].onclick = function() {
                    itemId = list[index].value;
                    idx = index;
                    // console.log(itemId);`
                }
            }
        }

        $('.rateBtn').on('click', function() {
            // console.log(itemId);
            var rateId = lastClickedId.split("-");
            var rateId = rateId[1];
            // var idProd = document.getElementById("idProdukSelected").value;
            // var idTransaksi = document.getElementById("idTransaksiSelected").value;
            var list = document.getElementsByClassName("list");
            // console.log(itemId);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                url: "/konsumen/rating",
                method: 'POST',
                data: {
                    // _token: "{{ csrf_token() }}",
                    rate: rateId,
                    transaksiId: itemId
                },
                success: function(response) {
                    console.log("berhasil");
                    var rateBtn = document.getElementsByClassName('berirating');
                    rateBtn[idx].classList = "hidden";
                    // do something here, like clear the textarea or show a success message
                },
                error: function(xhr, status, error) {
                    console.log("error");
                }
            });

        });

        // Attach the click event listener to each star SVG
        stars.forEach(star => {
            star.addEventListener('click', handleClick);
            star.addEventListener('click', () => {
                // Reset all stars
                stars.forEach(star => star.classList.remove('checked'));

                // Set the clicked star and update the hidden input value
                for (let i = 0; i <= index; i++) {
                    stars[i].classList.add('checked');
                }

                // Update the hidden input value with the rating
                document.getElementById('rating-input').value = index + 1;
            });
        });

        // document.addEventListener('DOMContentLoaded', function() {
        //     var submitButton = document.querySelector('button[type="submit"]');
        //     var svgIdInput = document.getElementById('svg-id-input');
        //     var svgElement = document.getElementById('my-svg-id');

        //     submitButton.addEventListener('click', function() {
        //         var svgId = svgElement.getAttribute('id');
        //         svgIdInput.value = svgId;
        //     });
        // });
    </script>
@endsection
