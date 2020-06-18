@extends('extends.dashboard',['_pagename'=>"group",'_backLink'=>route('home')])

@section('main-content')
    {{-- 
        #####
        ##  SMALL SCREEN - GROUP SELECTION
        #####
        --}}

<div id="sm-group-selection" class="container d-md-none">
    <div class="text-right">
        <form action="" class="form-group">
            <div class="row">
                <div class="col-6">
                    <a href="#" class="btn btn-primary form-control">
                        Buat Grup
                    </a>
                </div>
                <div class="col-6">
                    <select name="" id="" class="form-control">
                        <option value="">Private</option>
                        <option value="" selected>Grup #1</option>
                        <option value="">Kelompok ABC</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container d-flex flex-column justify-content-center bg-white p-4 shadow-sm mb-4">
    <div id="group-control" class=" text-center">
        <h3>Group Chat</h3>
    </div>
    <div id="group_chat" >
        <div id="chat-scrollable" class="group_chat">
            <div class="container border-top" id="chat-container">
                <div>
                <div class="mb-3 text-center ">
                <div class="bg-primary text-white">Welcome to group chat</div>
                <p>Start messaging and discuss with your team <br>
                <p id="status"></p> </p>
                </div>
                </div>
           </div>
        </div>
        <div class="chat-form">
            <form action="" id="text-message">
                <input type="hidden" id="memberId" name="memberId" value="{{$member->id}}">
                <textarea name="txt_message" id="message_box" rows="2" class="message-box form-control"></textarea>
                <button type="submit" class="btn btn-primary" id="#sendMessageButton">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
        var socketStatus = document.getElementById('status');
        var form = document.getElementById('text-message');
        var messageField = document.getElementById('message_box');
        var memberData = document.getElementById('memberId');

        var chatContainer = document.getElementById('chat-container');
        var groupChat = document.getElementById('chat-scrollable');
        groupChat.scrollTop = groupChat.scrollHeight;
        

        var ws = new WebSocket("ws://localhost:8090/");

        ws.onopen = function () {
            // Websocket is connected
            // socketStatus.innerHTML = 'Connected to: ' + event.currentTarget.url;
            socketStatus.innerHTML = 'Connected';
            console.log("Websocket connected");
        };
        ws.onmessage = function (event) {
            // Message received
            var messageContainer = document.createElement('div');
            messageContainer.className= 'message';
            let data = JSON.parse(event.data);
            console.log("Message From = " + data.name);
            console.log("Said = " + data.message);
            console.log("At time = " + data.time);
            messageContainer.innerHTML = '<div class="wrapper"><div class="user">'+data.name+'</div><div class="text">'+data.message+'</div><div class="time">'+data.time+'</div></div>';
            chatContainer.appendChild(messageContainer);
        };
        ws.onerror = function(e){
            console.log(e.data);
        }

        ws.onclose = function () {
            // websocket is closed.
            socketStatus.innerHTML = 'Disconnected';
            console.log("Connection closed");
        };

        form.onsubmit = function(e) {
            e.preventDefault();

            var message = messageField.value;
            var member = memberData.value;
            var data = {
                "message" : message,
                "member" : member,
            }
            ws.send(JSON.stringify(data));

            var messageContainer = document.createElement('div');
            messageContainer.className= 'message self';
            let data = JSON.parse(event.data);
            console.log("Message From = " + data.name);
            console.log("Said = " + data.message);
            console.log("At time = " + data.time);
            messageContainer.innerHTML = '<div class="wrapper"><div class="user">'+data.name+'</div><div class="text">'+data.message+'</div><div class="time">'+data.time+'</div></div>';
            chatContainer.appendChild(messageContainer);

            messageField.value = '';

            return false;
        }
    </script>
@endpush