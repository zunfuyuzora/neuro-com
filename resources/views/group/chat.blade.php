@extends('extends.dashboard',['_pagename'=>"group",'_backLink'=>route('home'),'groupId'=>$group_data->id,'chat'=>true])

@section('main-content')
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

            @if (count($messages)>0)
            @foreach ($messages as $m)
                <div class="message {{$m->member_id == $member->id ? "self" : ""}}">
                    <div class="wrapper">
                        <div class="user">{{$m->member->user->full_name}}</div>
                        <div class="text">{{$m->message}}</div>
                        <div class="time">{{$m->created_at}}</div>
                    </div>
                </div>
            @endforeach 
         @endif
           </div>
        </div>
        <div class="chat-form">
            <form id="text-message" method="POST">
                @csrf
                <input type="hidden" id="memberId" name="memberId" value="{{$member->id}}">
                <textarea name="txt_message" id="message_box" rows="2" class="message-box form-control"></textarea>
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
<?php
    $host = $_SERVER['HTTP_HOST'];
    $host = explode(":",$host);
    $websocket = $host[0].":8090";
?>
    <script>
        
    $(document).ready(function(){

        function getCaret(el) { 
            if (el.selectionStart) { 
                return el.selectionStart; 
            } else if (document.selection) { 
                el.focus();
                var r = document.selection.createRange(); 
                if (r == null) { 
                    return 0;
                }
                var re = el.createTextRange(), rc = re.duplicate();
                re.moveToBookmark(r.getBookmark());
                rc.setEndPoint('EndToStart', re);
                return rc.text.length;
            }  
            return 0; 
        }

        var socketStatus = document.getElementById('status');
        var form = document.getElementById('text-message');
        var messageField = document.getElementById('message_box');
        var memberData = document.getElementById('memberId');
        var sendButton = document.getElementById('sendMessageButton');

        var chatContainer = document.getElementById('chat-container');
        var groupChat = document.getElementById('chat-scrollable');
        groupChat.scrollTop = groupChat.scrollHeight;

        var messageBox = document.getElementById('message_box');
        messageBox.onkeyup = function(e){
            if(e.keyCode == 13) {    
                var content = this.value;  
                var caret = getCaret(this);          
                if(event.shiftKey){
                    this.value = content.substring(0, caret - 1) + "\n" + content.substring(caret, content.length);
                    event.stopPropagation();
                } else {
                    this.value = content.substring(0, caret - 1) + content.substring(caret, content.length);
                    sendButton.click();
                }
            }
        }

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        var csrf_token = document.getElementsByName('_token')[0].value;

        var pusher = new Pusher('d40739247fa4ee317dd7', {
            cluster: 'ap1',
            authEndPoint : '/pusher/auth',
            auth: {
                headers: {
                    'X-CSRF-TOKEN': csrf_token,
                }
            }
        });

        var subs = 'group.'+"{{$group_data->id}}";
        var channel = pusher.subscribe(subs);
        channel.bind("ChatMessage", function(data) {
            alert(JSON.stringify(data));
            socketStatus.innerHTML("Connected");
        });

        Echo.channel(subs)
            .listen('ChatMessage', (e)=>{
            var messageContainer = document.createElement('div');
            messageContainer.className= 'message';
            messageContainer.innerHTML = '<div class="wrapper"><div class="user">'+e.member+'</div><div class="text">'+e.message+'</div><div class="time">'+e.created_at+'</div></div>';
            chatContainer.appendChild(messageContainer);
            console.log(e);
        })

        
        // var websocket = "{{$websocket}}";
        // var ws = new WebSocket("ws://"+websocket);

        // ws.onopen = function () {
        //     socketStatus.innerHTML = 'Connected';
        //     console.log("Websocket connected");
        //     var data = {
        //         "command" : "subscribe",
        //         "channel" : "{{$group_data->id}}"
        //     }
        //     ws.send(JSON.stringify(data))
        // };
        // ws.onmessage = function (event) {
        //     // Message received
        //     var messageContainer = document.createElement('div');
        //     messageContainer.className= 'message';
        //     let data = JSON.parse(event.data);
        //     messageContainer.innerHTML = '<div class="wrapper"><div class="user">'+data.name+'</div><div class="text">'+data.message+'</div><div class="time">'+data.time+'</div></div>';
        //     chatContainer.appendChild(messageContainer);
        // };
        // ws.onerror = function(e){
        //     console.log(e.data);
        // }

        // ws.onclose = function () {
        //     // websocket is closed.
        //     socketStatus.innerHTML = 'Disconnected';
        //     console.log("Connection closed");
        // };

        form.onsubmit = function(e) {
            e.preventDefault();
            var name = "{{Auth::user()->full_name}}"
            var group = "{{$group_data->id}}"
            var d = new Date();
            var dateTime = d.getFullYear()+"-"+d.getMonth()+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            var message = messageField.value;
            var member = memberData.value;
            var data = {
                "command" : "message",
                "message" : message,
                "member" : member,
                "time" : dateTime,
                "group" : group,
            }
            console.log(data);
            axios.post('/sendMessage', data).catch(error => {
                console.log(error.message);
            }).then(response => {
                console.log(response.data);
            });

            var messageContainer = document.createElement('div');
            messageContainer.className= 'message self';
            messageContainer.innerHTML = '<div class="wrapper"><div class="user">'+name+'</div><div class="text">'+data.message+'</div><div class="time">'+data.time+'</div></div>';
            chatContainer.appendChild(messageContainer);

            messageField.value = '';
            groupChat.scrollTop = groupChat.scrollHeight;


            return false;
        }
    });
    </script>
@endpush