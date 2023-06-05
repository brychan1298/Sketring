@extends('konsumen.layouts.master')
@section('title', 'Pesanan yang sudah selesai')
@section('description', 'Daftar Pesanan Konsumen Yang Sudah Selesai')
@section('content')
    <div class="container-md mx-auto flex flex-col items-center mt-[48px] w-full">
        <div class="flex flex-col justify-center items-center w-max m-[2vw] gap-[1vw]">
            {{-- Status Selection --}}
            @include('konsumen.pesanan.layoutPesanan')
            {{-- Select Event --}}
            <div class="flex flex-row w-[100%] justify-end">
                <select id="IdAcara" onchange="filterData()"
                    class="bg-[#850000] text-white text-sm rounded-[10px] focus:ring-blue-500 focus:border-blue-500 block w-[30%] p-[0.5vw]">
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
                    IdAcara : selectedIdAcara
                },
                success: function(data) {
                    $('#ListTransaksi').html(data);
                }
            })
        }

        // Get all the star SVGs
        const stars = document.querySelectorAll('.star-svg');

        // Function to handle the click event
        function handleClick(event) {
        const clickedStarId = event.currentTarget.id;

        // Loop through all the stars
        stars.forEach(star => {
            const starId = star.id;

            // Change the class based on the clicked star and its position
            if (clickedStarId === starId || (clickedStarId.startsWith('star-') && starId.startsWith('star-') && starId <= clickedStarId)) {
            star.classList.remove('text-gray-500');
            star.classList.add('text-yellow-500');
            } else {
            star.classList.remove('text-yellow-500');
            star.classList.add('text-gray-500');
            }
        });
        }

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
    </script>
@endsection
