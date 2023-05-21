@extends('layouts.SideRegisLogin')
@section('title','Pilih Role')
@section('description','Halaman Pemilihan Role Sketring')
@section('contents')
<div class="text-center pt-8">
    <h1 class="m-12 text-3xl font-bold">
        REGISTRASI
    </h1>
</div>
<div class="text-center sm:m-12">
    <p class="text-2xl m-8">
        Anda ingin mendaftar sebagai Apa?
    </p>
    <div class="flex justify-between sm:m-12 max-sm:px-12">
        <div>
            <a href="/register/{{1}}" class="text-decoration-none">
                <div class="border-4 p-10 border-[#850000] rounded-xl hover:border-[#DC0000]">
                    <svg class="max-sm:w-[10vw] sm:w-12 md:w-24" viewBox="0 0 95 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M47.4999 0.0709686C38.8002 0.0709686 31.1326 5.82726 28.6751 14.1911C26.0701 13.0103 23.3176 12.3707 20.4668 12.3707C15.2526 12.3707 10.2519 14.4441 6.56481 18.1348C2.87776 21.8254 0.806396 26.831 0.806396 32.0504C0.818042 36.4086 2.27107 40.6403 4.93862 44.0848C7.60617 47.5293 11.3381 49.9927 15.5517 51.0904V86.1693H79.4482V51.0904C88.0988 48.8272 94.1935 41.0046 94.1935 32.0504C94.1935 26.831 92.1221 21.8254 88.4351 18.1348C84.748 14.4441 79.7473 12.3707 74.5331 12.3707C71.6823 12.3707 68.9298 13.0103 66.3248 14.1911C63.8673 5.82726 56.1997 0.0709686 47.4999 0.0709686ZM45.0424 44.3501H49.9575V78.7895H45.0424V44.3501ZM30.2971 54.1899H35.2122V78.7895H30.2971V54.1899ZM59.7877 54.1899H64.7028V78.7895H59.7877V54.1899ZM15.5517 91.0892V96.0091C15.5517 97.314 16.0696 98.5654 16.9913 99.488C17.9131 100.411 19.1633 100.929 20.4668 100.929H74.5331C75.8366 100.929 77.0868 100.411 78.0086 99.488C78.9303 98.5654 79.4482 97.314 79.4482 96.0091V91.0892H15.5517Z" fill="black"/>
                    </svg>
                </div>
                <p class="my-4 text-xl">
                    Pemilik Katering
                </p>
            </a>
        </div>
        <div>
            <a href="/register/{{2}}" class="text-decoration-none hover:animate-bounce">
                <div class="border-4 p-10 border-[#850000] rounded-xl hover:border-[#DC0000]">
                    <svg class="max-sm:w-[10vw] sm:w-12 md:w-24" viewBox="0 0 92 99" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M45.7469 4.19617e-05C51.8133 4.19617e-05 57.6312 2.60267 61.9208 7.23539C66.2104 11.8681 68.6203 18.1514 68.6203 24.7031C68.6203 31.2547 66.2104 37.538 61.9208 42.1707C57.6312 46.8035 51.8133 49.4061 45.7469 49.4061C39.6805 49.4061 33.8625 46.8035 29.5729 42.1707C25.2833 37.538 22.8734 31.2547 22.8734 24.7031C22.8734 18.1514 25.2833 11.8681 29.5729 7.23539C33.8625 2.60267 39.6805 4.19617e-05 45.7469 4.19617e-05ZM45.7469 61.7576C71.022 61.7576 91.4938 72.8122 91.4938 86.4606V98.8121H0V86.4606C0 72.8122 20.4717 61.7576 45.7469 61.7576Z" fill="black"/>
                    </svg>
                </div>
                <p class="my-4 text-xl">
                    Konsumen
                </p>
            </a>
        </div>
    </div>

    <p class="pb-6">
        Sudah punya akun? <a href="/login" class="text-decoration-none font-bold hover:text-red-600">Login</a>
    </p>
</div>
@endsection
