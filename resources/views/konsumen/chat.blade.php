@extends('konsumen.layouts.master')
@section('title', 'Chat')
@section('description', 'Halaman Chat')
@section('content')

<div class="container mx-auto mt-12">
    <div class="px-10 py-24 max-md:py-16">
        <a href="/">
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
        <div class="flex h-[750px] max-md:h-[510px] antialiased text-gray-800 border-4 border-solid border-[#850000] rounded-xl mt-6">
            <div class="flex flex-row w-full h-full overflow-hidden">
                {{-- kotak kiri --}}
                <div class="flex flex-col flex-shrink-0 hidden lg:block w-1/4 px-4 py-8 overflow-y-auto border-r-2 h-[97%] max-lg:w-full" id="chatMenu">
                    <div class="flex flex-row items-center justify-center">
                        <input type="text" placeholder="Cari..." class="w-full px-4 py-2 text-lg border border-gray-400 border-solid rounded-md max-lg:mr-5">
                        <button data-collapse-toggle="chatMenu" type="button"class="lg:hidden" aria-controls="chatMenu" aria-expanded="false">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 256 256"><path fill="currentColor" d="M208.49 191.51a12 12 0 0 1-17 17L128 145l-63.51 63.49a12 12 0 0 1-17-17L111 128L47.51 64.49a12 12 0 0 1 17-17L128 111l63.51-63.52a12 12 0 0 1 17 17L145 128Z"/></svg>
                        </button>
                    </div>
                    <div class="mt-8 mb-5 border border-gray-300 border-solid line"></div>
                    <div id="list-chat" class="flex flex-col">
                        <div class="flex flex-col -mx-2 space-y-1">
                        @php
                            $countId = 0;
                        @endphp
                        @foreach($lastChatRaw as $chatIds)
                            <a href="/konsumen/chat/{{$chatIds->IdUser}}" class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
                                <div class="flex-shrink-0">
                                    <img class="w-16 h-16 rounded-full" src="{{ asset('storage/' . $chatIds->FotoProfil) }}"/>
                                </div>
                                <div class="ml-2">
                                    <h1 class="text-lg font-semibold text-left">{{$chatIds->Nama}}</h1>
                                    <p class="text-sm text-left text-gray-500">{{\Illuminate\Support\Str::limit($chatIds->text, 30, '...')}}</p>
                                </div>
                                <div class="ml-auto notif">
                                    @if (($unread[$countId]->Count) > 0)
                                        <span class="flex justify-center w-6 h-6 text-white bg-red-500 rounded-full">{{$unread[$countId]->Count}}</span>
                                    @endif
                                </div>
                            </a>
                            <div class="my-8 border border-gray-300 border-solid line"></div>
                            @php
                                $countId++;
                            @endphp
                        @endforeach

                            {{-- <div class="my-8 border border-gray-300 border-solid line"></div> --}}
                        </div>
                    </div>
                </div>

                {{-- kotak kanan | message --}}
                <div class="flex flex-col flex-auto h-full">
                    <div class="flex flex-col flex-auto flex-shrink-0 h-full p-4 rounded-2xl">
                        {{-- Header --}}
                        <div class="flex items-center justify-between px-3 py-2 border-b-2 bg-grey-lighter">
                            <div class="flex items-center">
                                <button data-collapse-toggle="chatMenu" type="button"
                                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none"
                                    aria-controls="chatMenu" aria-expanded="false">
                                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div class="flex-shrink-0 ml-5">
                                    <img class="w-16 h-16 rounded-full" src="/images/natfood.png"/>
                                </div>
                                <div class="ml-4">
                                    <p class="text-2xl font-semibold max-md:text-lg">
                                        {{$receiver->Nama}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        {{-- Content --}}
                        <div class="relative h-full mb-10">
                            <div class="flex flex-col h-full">
                                {{-- <div class="flex justify-center mt-3">
                                    <div class="px-4 py-2 rounded bg-[#e9e9e9]">
                                        <p class="text-sm">
                                            Hari Ini
                                        </p>
                                    </div>
                                </div> --}}
                                <div id="chat-container" class="absolute bottom-0 grid w-full grid-cols-12 gap-5 h-[100%] overflow-x-hidden overflow-y-auto">
                                    @foreach($chats as $chat)
                                        @if($chat->IdSender == $myId && $chat->IdReceiver == $IdPerson)
                                            <div class="w-full col-start-6 col-end-13 mb-8 mr-3 rounded-lg max-md:mb-12 max-sm:mb-2">
                                                <div class="flex flex-row-reverse items-center justify-start">
                                                    <div class="relative px-4 py-2 mr-3 text-sm bg-[#850000] text-white shadow rounded-xl">
                                                        <div class="text-lg max-md:text-base">
                                                            {{ $chat->text }}
                                                        </div>
                                                        <div class="absolute bottom-0 right-0 -mb-8 text-base text-right text-gray-500 max-md:text-sm w-max">
                                                            {{ \Carbon\Carbon::parse($chat->time)->format('H:i | d/m/Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($chat->IdReceiver == $myId && $chat->IdSender == $IdPerson)
                                            <div class="col-start-1 col-end-8 mt-5 mb-8 ml-3 rounded-lg max-md:mb-12 max-sm:mb-8">
                                                <div class="flex flex-row items-center">
                                                    <div class="relative flex-col px-4 py-2 ml-3 text-sm bg-gray-200 shadow d-flex rounded-xl">
                                                        <div class="text-lg max-md:text-base">
                                                            {{ $chat->text }}
                                                        </div>
                                                        <div class="absolute bottom-0 left-0 mr-2 -mb-8 text-base text-gray-500 max-md:text-sm w-max">
                                                            {{ \Carbon\Carbon::parse($chat->time)->format('H:i | d/m/Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row items-center w-full h-16 px-4 rounded-xl">
                            <div class="flex-grow ml-4">
                                <div class="relative w-full">
                                    <textarea id="kotakPesan" name="kotakPesan" placeholder="Ketik Pesan..." class="flex w-full h-12 pt-2 pl-4 border-2 border-gray-300 resize-none max-sm:text-xs rounded-xl focus:outline-none focus:border-gray-500"></textarea>
                                    <button class="absolute top-0 right-0 flex items-center justify-center w-12 h-full text-gray-400 hover:text-gray-600">
                                    </button>
                                </div>
                            </div>
                            <div class="ml-4">
                                <button class="flex items-center flex-shrink-0 py-1 justify-centerpx-4 send-message-btn">
                                    <span class="ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="#850000" d="M2.01 21L23 12L2.01 3L2 10l15 2l-15 2z"/></svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

setInterval(function(){
    $("#chat-container").load(location.href + " #chat-container>*","");
    $("#list-chat").load(location.href + " #list-chat>*","");
}, 1000);

const chatContainer = document.getElementById('chat-container');
chatContainer.scrollTop = chatContainer.scrollHeight - chatContainer.clientHeight;

function scrollToBottom() {
    var chatContainer = document.getElementById("chat-container");
    chatContainer.scrollTop = chatContainer.scrollHeight;
}

prevVal = chatContainer.scrollHeight;
currVal = chatContainer.scrollHeight;

setInterval(function(){
    currVal = chatContainer.scrollHeight;
    if(currVal != prevVal){
        prevVal = currVal;
        // alert('scroll height changed');
        scrollToBottom();
    }
},100);

$('.send-message-btn').on('click', function () {
    var message = document.getElementById('kotakPesan').value;
    var IdPerson = window.location.pathname.split('/').pop();

    $.ajax({
        url: "/send-message/" + IdPerson,
        method: 'POST',
        data: {
            _token: "{{ csrf_token() }}",
            message: message
        },
        success: function (response) {
            console.log(response);
            document.getElementById("kotakPesan").value = "";
            // do something here, like clear the textarea or show a success message
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            // handle the error here
        }
    });

});


</script>

@endsection
