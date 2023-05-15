{{-- chat  --}}
<div class="sidebars_chat" id="sidebars_chat">
    <div class="wrapper_ms">
        <section class="chat-area">
            <header>
                <img id="old" alt="" class="old">
                <div class="details">
                    <span id="user_chat" class="user_chat"></span>
                </div>
                <div class="call_chat">
                    <i class="fa-solid fa-phone-volume"></i>
                </div>
                <div class="callvideo_chat" id="callvideo_chat">
                    <i class="fa-solid fa-video old_camera" id="show-meet"></i>
                </div>
                <div class="close_chat" onclick="onclickShowChat()">
                    <span> &times; </span>
                </div>
            </header>
            <div class="chat-box" id="chat-box"></div>

            <form class="typing-area" autocomplete="off">
                <label class="file-upload">
                    <i class="fa-solid fa-file-image"></i>
                    <input type="file" class="image_chat">
                </label>
                <input type="text" id="message" class="input-field" placeholder="Nhắn cho bạn bè...">
                <button type="button" id="btn_SendMess" title="send" onclick="send_mess()"><i
                        class="fa-solid fa-paper-plane"></i></button>
            </form>
        </section>
    </div>
</div>

<script>
    message.oninput = function() {
        if(document.getElementById('message').value != '')
            document.getElementById('btn_SendMess').style.display = 'block';
        else
            document.getElementById('btn_SendMess').style.display = 'none';
    };
</script>
