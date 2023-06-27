@extends('konsumen.layouts.master')
@section('title', 'Keranjang')
@section('description', 'Halaman Keranjang')
@section('content')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        hr {
            border: 0.1px solid rgb(110, 110, 110);
        }

        .ProductData:hover {
            scale: 1.004;
        }
    </style>
    <form action="/konsumen/checkout" method="POST" onsubmit="return checkCheckbox()">
        @csrf
        <div class="container flex flex-col w-full mx-auto mt-36 max-sm:mt-12 px-4 xl:px-36 mb-[100px]">
            <div class="inline-flex max-sm:pt-16">
                <a href="/konsumen/listKeranjang">
                    <svg class="w-8 h-8 md:w-10 md:h-10" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                        fill="#000000">
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
                <h1 class="mx-auto text-2xl font-bold text-center max-md:text-lg">{{ $namaAcara }}</h1>
                <input type="hidden" name="NamaAcara" value="{{ $namaAcara }}">
            </div>
            <hr class="my-8">
            <div class="container lg:flex gap-16">
                <div class="w-full lg:w-3/4">
                    @foreach ($listAcara as $acaras => $items)
                        @php
                            $idAcara = 0;
                        @endphp
                        @foreach ($items as $KeranjangItems)
                            @php
                                $idAcara = $KeranjangItems->IdAcara;
                                break;
                            @endphp
                        @endforeach
                        <div class="mb-10 border-2 border-gray-200 shadow-lg rounded-xl">
                            <div class="flex items-center px-6 py-5 border-b-2 border-gray-200">
                                <div class="inline-flex items-center w-2/5">
                                    <input type="checkbox" class="check-all-btn-{{ $idAcara }} w-4 h-4 mr-4 "
                                        id="check-all-btn-{{ $idAcara }}">
                                    <h1>{{ $acaras }}</h1>
                                </div>
                            </div>
                            @foreach ($items as $KeranjangItems)
                                <div class="flex items-center px-6 py-5 rounded hover:bg-gray-200 ProductData">
                                    <input type="hidden" name="IdProduk" value="{{ $KeranjangItems->IdKeranjang }}"
                                        class="IdKeranjang" onchange="AddCheck({{ $KeranjangItems->Harga }})">
                                    <div class="flex items-center w-2/5">
                                        <input type="checkbox" value="{{ $KeranjangItems->IdKeranjang }}"
                                            name="IdKeranjangList[]"
                                            id="store-{{ $idAcara }}-checkbox-{{ $KeranjangItems->IdKeranjang }}"
                                            class="checkbox-group-{{ $idAcara }} w-4 h-4 mr-4 IdKeranjangList ">
                                        <div class="">
                                            <img class="object-contain w-24 h-24"
                                                src="{{ asset('storage/' . $KeranjangItems->FotoProduk) }}" alt="">
                                        </div>
                                        <div class="flex flex-col justify-between ml-4">
                                            <p>{{ $KeranjangItems->Nama }}</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-center w-1/5 DataQty">
                                        <svg class="w-3 text-gray-600 cursor-pointer fill-current decreaseItem"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                        </svg>

                                        <input class="w-12 mx-2 text-center border rounded-lg qtyItem" type="number"
                                            value="{{ $KeranjangItems->Qty }}" min="{{ $KeranjangItems->MinOrder }}"
                                            max="{{ $KeranjangItems->MaxOrder }}">

                                        <svg class="w-3 text-gray-600 cursor-pointer fill-current increaseItem"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                        </svg>
                                    </div>
                                    <span class="w-1/5 text-sm font-semibold text-center SubTotal">@currency($KeranjangItems->Harga * $KeranjangItems->Qty)</span>
                                    <input type="hidden" class="SubTotalProduk-{{ $idAcara }} SubTotalProduk"
                                        value="{{ $KeranjangItems->Harga * $KeranjangItems->Qty }}">
                                    <svg class="w-1/5 text-sm font-semibold text-center cursor-pointer deleteCart"
                                        width="28" height="29" viewBox="0 0 28 29" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.68114 1.52061L8.25175 2.31539H2.52656C1.47098 2.31539 0.618164 3.11017 0.618164 4.09391C0.618164 5.07766 1.47098 5.87244 2.52656 5.87244H25.4273C26.4829 5.87244 27.3357 5.07766 27.3357 4.09391C27.3357 3.11017 26.4829 2.31539 25.4273 2.31539H19.7021L19.2727 1.52061C18.9507 0.914802 18.2887 0.536865 17.5671 0.536865H10.3868C9.66516 0.536865 9.00318 0.914802 8.68114 1.52061ZM25.4273 7.65096H2.52656L3.79087 26.4922C3.88629 27.8983 5.13868 28.9932 6.64751 28.9932H21.3064C22.8152 28.9932 24.0676 27.8983 24.163 26.4922L25.4273 7.65096Z"
                                            fill="#888888" />
                                    </svg>
                                </div>
                            @endforeach

                        </div>
                    @endforeach
                </div>
                <div id="summary" class="w-full lg:w-1/4">
                    <div class="border-2 px-4 py-4 border-[#850000] rounded-2xl">

                        <h1 class="mb-5 text-lg font-extrabold">
                            Ringkasan Belanja
                        </h1>

                        <div class="flex justify-between text-sm">
                            <div>
                                Total Harga (<span id="JumlahBarang">0</span> barang)
                            </div>
                            <div id="TotalHarga">
                                0
                            </div>
                            <input type="hidden" name="TotalHarga" id="TotalHargaHidden" value="0">
                        </div>
                        <div class="flex justify-between text-sm mt-3 pb-12 border-b-2 border-[#850000]">
                            <div>
                                Ongkos Kirim
                            </div>
                            <div>
                                Rp 30.000
                            </div>
                        </div>

                        <div class="flex justify-between mt-2 text-sm mb-9">
                            <div class="text-lg font-extrabold">
                                Total Harga
                            </div>
                            <div id="TotalAndOngkir">
                                @currency(30000)
                            </div>

                        </div>

                        <button class="w-full bg-[#DC0000] text-white py-3 rounded-lg">
                            Beli (<span id="JumlahBarang2">0</span>)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('.confirmDelete').click(function(event) {
            var form = $(this).closest("form");
            var acara = $(this).closest("form").find(".NamaAcara").val();
            event.preventDefault();
            Swal.fire({
                    title: `Apakah anda yakin ingin menghapus keranjang ` + acara + ` ?`,
                    // text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                    dangerMode: true,
                    buttons: true
                })
                .then((result) => {
                    if (result.value) {
                        form.submit();
                    } else {
                        result.dismiss === Swal.DismissReason.cancel
                    }
                });
            return false;
        });
        $(document).ready(function() {
            $('.deleteCart').click(function(e) {
                e.preventDefault();

                Swal.fire({
                        title: `Apakah anda yakin ingin menghapus produk ini?`,
                        // text: "If you delete this, it will be gone forever.",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonText: "Ya",
                        cancelButtonText: "Tidak",
                        dangerMode: true,
                        buttons: true
                    })
                    .then((result) => {
                        if (result.value) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            var IdKeranjang = $(this).closest('.ProductData').find('.IdKeranjang')
                                .val();

                            // alert(IdKeranjang);
                            $.ajax({
                                method: "POST",
                                url: "/konsumen/deleteCart",
                                data: {
                                    'IdKeranjang': IdKeranjang,
                                },
                                success: function(response) {
                                    // alert("tes");

                                    Swal.fire({
                                        title: response.status,
                                        // text: "If you delete this, it will be gone forever.",
                                        icon: "success",
                                    }).then((result) => {
                                        window.location.reload();
                                    })
                                    // swal("", response.status, "success");
                                }
                            })
                        } else {
                            result.dismiss === Swal.DismissReason.cancel
                        }
                    });
                return false;
            })

            $('.decreaseItem').click(function(e) {
                e.preventDefault();

                var qtyItem = parseInt($(this).closest('.DataQty').find('.qtyItem').val());
                var minQtyItem = $(this).closest('.DataQty').find('.qtyItem').attr('min');

                if (qtyItem != minQtyItem) {
                    qtyItem -= 1;
                    $(this).closest('.DataQty').find('.qtyItem').val(qtyItem);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var IdKeranjang = $(this).closest('.ProductData').find('.IdKeranjang').val();
                    // alert(IdKeranjang);
                    $.ajax({
                        method: "POST",
                        url: "/konsumen/updateCart",
                        data: {
                            'IdKeranjang': IdKeranjang,
                            'Qty': qtyItem,
                        },
                        success: function(response) {
                            window.location.reload();
                            // alert(response.newQty)
                            // $(this).closest('.DataQty').find('.qtyItem').val(response.newQty)
                        }
                    })
                }
            })

            $('.increaseItem').click(function(e) {
                e.preventDefault();

                var qtyItem = parseInt($(this).closest('.DataQty').find('.qtyItem').val());
                var maxQtyItem = $(this).closest('.DataQty').find('.qtyItem').attr('max');


                if (qtyItem != maxQtyItem) {
                    qtyItem += 1;
                    $(this).closest('.DataQty').find('.qtyItem').val(qtyItem);
                    // $(this).closest('.ProductData').find('.SubTotal').html(qtyItem);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var IdKeranjang = $(this).closest('.ProductData').find('.IdKeranjang').val();
                    // alert(IdKeranjang);
                    $.ajax({
                        method: "POST",
                        url: "/konsumen/updateCart",
                        data: {
                            'IdKeranjang': IdKeranjang,
                            'Qty': qtyItem,
                        },
                        success: function(response) {
                            window.location.reload();
                            $(this).closest('.DataQty').find('.qtyItem').val('2');
                        }
                    })
                }
            })
        })

        window.onload = () => {
            var TotalHarga = document.getElementById("TotalHarga").textContent;
            document.getElementById("TotalHarga").textContent = Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(TotalHarga);
            var TotalHargaHidden = document.getElementById("TotalHargaHidden").value;
            var checks = document.getElementsByClassName("IdKeranjangList");
            var SubTotalProduk = document.getElementsByClassName("SubTotalProduk");
            for (let index = 0; index < checks.length; index++) {
                checks[index].onchange = function() {
                    var count = 0;
                    for (var i = 0; i < checks.length; i++) {
                        if (checks[i].checked) {
                            count++;
                        }
                    }
                    if (checks[index].checked == true) {
                        TotalHarga = document.getElementById("TotalHarga").textContent;
                        TotalHargaHidden = document.getElementById("TotalHargaHidden").value;
                        TotalHarga = parseInt(TotalHargaHidden) + parseInt(SubTotalProduk[index].value);
                        document.getElementById("TotalHargaHidden").value = parseInt(TotalHargaHidden) +
                            parseInt(SubTotalProduk[index].value);
                        TotalAndOngkir = parseInt(TotalHarga) + 30000;
                        TotalAndOngkir = Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR"
                        }).format(TotalAndOngkir);
                        TotalHarga = Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR"
                        }).format(TotalHarga);
                        document.getElementById("TotalHarga").textContent = TotalHarga.toString();
                        document.getElementById("TotalAndOngkir").textContent = TotalAndOngkir.toString();
                        document.getElementById("JumlahBarang").textContent = count.toString();
                        document.getElementById("JumlahBarang2").textContent = count.toString();

                    } else if (checks[index].checked == false) {
                        TotalHarga = document.getElementById("TotalHarga").textContent;
                        TotalHargaHidden = document.getElementById("TotalHargaHidden").value;
                        TotalHarga = parseInt(TotalHargaHidden) - parseInt(SubTotalProduk[index].value);
                        document.getElementById("TotalHargaHidden").value = parseInt(TotalHargaHidden) -
                            parseInt(SubTotalProduk[index].value);
                        TotalAndOngkir = parseInt(TotalHarga) + 30000;
                        TotalAndOngkir = Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR"
                        }).format(TotalAndOngkir);
                        TotalHarga = Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR"
                        }).format(TotalHarga);
                        document.getElementById("TotalHarga").textContent = TotalHarga.toString();
                        document.getElementById("TotalAndOngkir").textContent = TotalAndOngkir.toString();
                        document.getElementById("JumlahBarang").textContent = count.toString();
                        document.getElementById("JumlahBarang2").textContent = count.toString();
                        // document.getElementById("checkAll").checked = false;
                    }
                }
            };
        }

        function priceChange(IdAcara) {
            var TotalHarga = document.getElementById("TotalHarga").textContent;
            document.getElementById("TotalHarga").textContent = Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(TotalHarga);
            var TotalHargaHidden = document.getElementById("TotalHargaHidden").value;
            document.getElementById("TotalHargaHidden").value = 0;
            var checks = document.getElementsByClassName("IdKeranjangList");
            // var checks = document.querySelectorAll(`.checkbox-group-${IdAcara}`);
            var SubTotalProduk = document.getElementsByClassName("SubTotalProduk");


            TotalHarga = document.getElementById("TotalHarga").textContent;
            TotalHargaHidden = document.getElementById("TotalHargaHidden").value;
            TotalHarga = parseInt(TotalHargaHidden);
            document.getElementById("TotalHargaHidden").value = parseInt(TotalHargaHidden);
            TotalAndOngkir = parseInt(TotalHarga) + 30000;
            TotalAndOngkir = Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(TotalAndOngkir);
            TotalHarga = Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(TotalHarga);
            document.getElementById("TotalHarga").textContent = TotalHarga.toString();
            document.getElementById("TotalAndOngkir").textContent = TotalAndOngkir.toString();
            var count = 0;
            for (var i = 0; i < checks.length; i++) {
                if (checks[i].checked) {
                    count++;
                }
            }
            document.getElementById("JumlahBarang").textContent = count.toString();
            document.getElementById("JumlahBarang2").textContent = count.toString();
            for (let index = 0; index < checks.length; index++) {
                var count = 0;
                for (var i = 0; i < checks.length; i++) {
                    if (checks[i].checked) {
                        count++;
                    }
                }
                if (checks[index].checked == true) {
                    // alert(checks[index].value);
                    TotalHarga = document.getElementById("TotalHarga").textContent;
                    TotalHargaHidden = document.getElementById("TotalHargaHidden").value;
                    TotalHarga = parseInt(TotalHargaHidden) + parseInt(SubTotalProduk[index].value);
                    document.getElementById("TotalHargaHidden").value = parseInt(TotalHargaHidden) +
                        parseInt(SubTotalProduk[index].value);
                    TotalAndOngkir = parseInt(TotalHarga) + 30000;
                    TotalAndOngkir = Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    }).format(TotalAndOngkir);
                    TotalHarga = Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    }).format(TotalHarga);
                    document.getElementById("TotalHarga").textContent = TotalHarga.toString();
                    document.getElementById("TotalAndOngkir").textContent = TotalAndOngkir.toString();
                    document.getElementById("JumlahBarang").textContent = count.toString();
                    document.getElementById("JumlahBarang2").textContent = count.toString();
                }

                // else if (checks[index].checked == false) {
                //     TotalHarga = document.getElementById("TotalHarga").textContent;
                //     TotalHargaHidden = document.getElementById("TotalHargaHidden").value;
                //     TotalHarga = parseInt(TotalHargaHidden) - parseInt(SubTotalProduk[index].value);
                //     document.getElementById("TotalHargaHidden").value = parseInt(TotalHargaHidden) -
                //         parseInt(SubTotalProduk[index].value);
                //     TotalAndOngkir = parseInt(TotalHarga) + 30000;
                //     TotalAndOngkir = Intl.NumberFormat("id-ID", {
                //         style: "currency",
                //         currency: "IDR"
                //     }).format(TotalAndOngkir);
                //     TotalHarga = Intl.NumberFormat("id-ID", {
                //         style: "currency",
                //         currency: "IDR"
                //     }).format(TotalHarga);
                //     document.getElementById("TotalHarga").textContent = TotalHarga.toString();
                //     document.getElementById("TotalAndOngkir").textContent = TotalAndOngkir.toString();
                //     document.getElementById("JumlahBarang").textContent = count.toString();
                //     document.getElementById("JumlahBarang2").textContent = count.toString();
                //     // document.getElementById("checkAll").checked = false;
                // }
            };
        }

        function checkCheckbox() {
            var checks = document.getElementsByClassName("IdKeranjangList");
            var count = 0;
            for (var i = 0; i < checks.length; i++) {
                if (checks[i].checked) {
                    count++;
                }
            }

            if (count == 0) {
                alert("Silahkan pilih barang yang ingin dicheckout terlebih dahulu");
                return false;
            }
        }

        const checkAllBtns = document.querySelectorAll('[class^="check-all-btn-"]');
        checkAllBtns.forEach(checkAllBtn => {
            checkAllBtn.addEventListener('click', () => {
                const IdAcara = checkAllBtn.classList[0].split('-')[3];
                const checkboxes = document.querySelectorAll(`.checkbox-group-${IdAcara}`);
                if (checkAllBtn.checked === true) {
                    checkboxes.forEach(function(checkbox, i) {
                        checkbox.checked = true;
                    });
                    priceChange(IdAcara);
                } else {
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = false;
                    });
                    priceChange(IdAcara);
                }
            });
        });

        const checkboxes = document.querySelectorAll('[class^="checkbox-group-"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const IdAcara = checkbox.classList[0].split('-')[2];
                const groupCheckBox = document.querySelector(`#check-all-btn-${IdAcara}`);
                if (!checkbox.checked) {
                    groupCheckBox.checked = false;
                }
            });
        });
    </script>
@endsection
