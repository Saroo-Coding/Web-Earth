<li class="messenger">
    <div class="icon-mes" onclick="messengerMenuToggle()">
        <i class="fa-regular fa-comment-dots"></i>
        <span class="qty_tn">2</span>
    </div>
    <div class="messenger-menu">
        <!-- search-messenger -->
        <div class="container-ms">
            <div class="wrapper_ms">
                <h3>Tin nhắn</h3>
                <section class="users">
                    <div class="search_messenger">
                        <span class="text">Chọn 1 người để trò chuyện</span>
                        <input type="text" name="" id="search-input" placeholder="Tìm kiếm bạn bè...">
                        <button type="button" title="seach" class="btn_messenger"><i
                                class="fas sri fa-search"></i></button>
                    </div>
                    <div class="users-list">
                        @foreach ($listChat as $item)
                            <div class="content_msr">
                                <div class="content" onclick="onclickShowChat()">
                                    <img src="{{ $item['avatar'] }}" alt="">
                                    <div class="details">
                                        <span>{{ $item['fullName'] }}</span>
                                    </div>
                                </div>
                                <div class="status-dot">
                                    @if ($item['status'] == false)
                                        <i class="fas fa-circle" style="color: red"></i>
                                    @else
                                        <i class="fas fa-circle"></i>
                                    @endif

                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
</li>
