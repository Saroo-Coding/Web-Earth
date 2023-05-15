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
                        <button type="button" title="seach" class="btn_messenger"><i class="fas sri fa-search"></i></button>
                    </div>
                    <div class="users-list">
                        {{-- 1 --}} 
                        <div class="content_msr">
                            <div class="content" onclick="onclickShowChat()">
                                <img src="{{asset('img/hoa.jpg')}}" alt="">
                                <div class="details">
                                    <span>Danh Nguyễn</span>
                                    <p>Chào bạn êyyy</p>
                                </div>
                            </div>
                            <div class="status-dot">
                                <i class="fas fa-circle"></i>
                            </div>
                        </div>

                        {{-- text --}}
                        <div class="content_msr">
                            <div class="content" onclick="onclickShowChat()">
                                <img src="{{asset('img/ho_vo.jpg')}}" alt="">
                                <div class="details">
                                    <span>Coding Nepal</span>
                                    <p>this is test message</p>
                                </div>
                            </div>
                            <div class="status-dot">
                                <i class="fas fa-circle"></i>
                            </div>
                        </div>
                        <div class="content_msr">
                            <div class="content" onclick="onclickShowChat()">
                                <img src="{{asset('img/ho_vo.jpg')}}" alt="">
                                <div class="details">
                                    <span>Coding Nepal</span>
                                    <p>this is test message</p>
                                </div>
                            </div>
                            <div class="status-dot">
                                <i class="fas fa-circle"></i>
                            </div>
                        </div>
                        <div class="content_msr">
                            <div class="content" onclick="onclickShowChat()">
                                <img src="{{asset('img/ho_vo.jpg')}}" alt="">
                                <div class="details">
                                    <span>Coding Nepal</span>
                                    <p>this is test message</p>
                                </div>
                            </div>
                            <div class="status-dot">
                                <i class="fas fa-circle"></i>
                            </div>
                        </div>
                        <div class="content_msr">
                            <div class="content" onclick="onclickShowChat()">
                                <img src="{{asset('img/ho_vo.jpg')}}" alt="">
                                <div class="details">
                                    <span>Coding Nepal</span>
                                    <p>this is test message</p>
                                </div>
                            </div>
                            <div class="status-dot">
                                <i class="fas fa-circle"></i>
                            </div>
                        </div>
                        <div class="content_msr">
                            <div class="content" onclick="onclickShowChat()">
                                <img src="{{asset('img/ho_vo.jpg')}}" alt="">
                                <div class="details">
                                    <span>Coding Nepal</span>
                                    <p>this is test message</p>
                                </div>
                            </div>
                            <div class="status-dot">
                                <i class="fas fa-circle"></i>
                            </div>
                        </div>
                        {{-- end text --}}
                    </div>
                </section>
            </div>
            {{-- <div id="search-messenger">
                <button id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="text" name="" id="search-mes" placeholder="Tìm kiếm bạn bè...">
            </div> --}}
            {{-- <div class="messenger-menu-inner">
                <div class="online-list">
                    <div class="online">
                        <img src="{{asset('img/1.jpg')}}" alt="">
                    </div>
                    <div class="des">
                        <h5>Công Danh</h5>
                        <p>Hello , chào cháo chào</p>
                    </div>
                </div>
                <!-- text -->
                <div class="online-list">
                    <div class="online">
                        <img src="{{asset('img/1.jpg')}}" alt="">
                    </div>
                    <div class="des">
                        <h5>Jackson</h5>
                        <p>Hello , my friends hihihfriendsfriends</p>
                    </div>
                </div>
                <div class="online-list">
                    <div class="online">
                        <img src="{{asset('img/1.jpg')}}" alt="">
                    </div>
                    <div class="des">
                        <h5>Ned</h5>
                        <p>Hello , my friends friends friends</p>
                    </div>
                </div>
                <div class="online-list">
                    <div class="online">
                        <img src="{{asset('img/1.jpg')}}" alt="">
                    </div>
                    <div class="des">
                        <h5>Alison Mina</h5>
                        <p>Hello , my friends hihihihihi</p>
                    </div>
                </div>
            
                <div class="online-list">
                    <div class="online">
                        <img src="{{asset('img/1.jpg')}}" alt="">
                    </div>
                    <div class="des">
                        <h5>Alison Mina</h5>
                        <p>Hello , my friends hihihihihiihihihih</p>
                    </div>
                </div>
                <div class="online-list">
                    <div class="online">
                        <img src="{{asset('img/1.jpg')}}" alt="">
                    </div>
                    <div class="des">
                        <h5>Jackson</h5>
                        <p>Hello , my friends hihihfriendsfriends</p>
                    </div>
                </div>
                <div class="online-list">
                    <div class="online">
                        <img src="{{asset('img/1.jpg')}}" alt="">
                    </div>
                    <div class="des">
                        <h5>Ned</h5>
                        <p>Hello , my friends friends friends</p>
                    </div>
                </div>
                <div class="online-list">
                    <div class="online">
                        <img src="{{asset('img/1.jpg')}}" alt="">
                    </div>
                    <div class="des">
                        <h5>Alison Mina</h5>
                        <p>Hello , my friends hihihihihi</p>
                    </div>
                </div>
                <!-- text -->
            </div> --}}
        </div>
    </div>
</li>