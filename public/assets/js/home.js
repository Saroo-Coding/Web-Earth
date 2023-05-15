var darkBtn = document.getElementById("dark-btn")
darkBtn.onclick = function () {
    darkBtn.classList.toggle("dark-btn-on");
    document.body.classList.toggle("dark-theme");

    if (localStorage.getItem("theme") == "light") {
        localStorage.setItem("theme", "dark");
    }
    else {
        localStorage.setItem("theme", "light");
    }
}
if (localStorage.getItem("theme") == "light") {
    darkBtn.classList.remove("dark-btn-on");
    document.body.classList.remove("dark-theme");
}
else if (localStorage.getItem("theme") == "dark") {
    darkBtn.classList.add("dark-btn-on");
    document.body.classList.add("dark-theme");
}
else {
    localStorage.setItem("theme", "light");
}

const albums = document.getElementById('id01'); // albums
const EDIT_USER = document.getElementById('EDIT_USER'); //EDIT USER
const searchs_header = document.getElementById('searchss');
window.onclick = function (event) {
    //searchs header
    if (event.target == searchs_header) {
        searchs_header.style.display = "none";
    }
    // albums
    if (event.target == albums) {
        albums.style.display = "none";
    }
    //EDIT USER
    if (event.target == EDIT_USER) {
        EDIT_USER.style.display = "none";
    }
}

// posts edit comment
var postrigh = document.querySelector(".posts");
function postrighsMenuToggle(id) {
    document.getElementById('post_' + id).classList.toggle("post-right-menu-height");
}

//click hiện ảnh ở ô chat
function showImg(id) {
    var modalChat = document.getElementById("myModal_" + id);
    var modalImg = document.getElementById("img_" + id);
    var captionText = document.getElementById("caption_" + id);
    modalChat.style.display = "block";
    modalImg.src = document.getElementById("myImg_" + id).src;
    captionText.innerHTML = this.alt;
}

// tìm kiếm ở bạn bè trong right-sidebar 
const searchFriendsHome = document.querySelector('#search-friends-home');
searchFriendsHome.addEventListener('input', handleSearch);
function handleSearch() {
    const inputs = this.value.toLowerCase();
    const onlineLists = document.querySelectorAll('.online-list');

    onlineLists.forEach((onlineList) => {
        const names = onlineList.querySelector('p').textContent.toLowerCase();
        const isMatchs = names.includes(inputs);

        onlineList.style.display = isMatchs ? 'flex' : 'none';
    });
}

// //chuyển ảnh trong bài comment
// let slideIndex = 1;
// showSlides(slideIndex);

// function plusSlides(n) {
//     showSlides(slideIndex += n);
// }

// function currentSlide(n) {
//     showSlides(slideIndex = n);
// }

// function showSlides(n) {
//     let i;
//     let slides = document.getElementsByClassName("mySlides");
//     if (n > slides.length) { slideIndex = 1 }
//     if (n < 1) { slideIndex = slides.length }
//     for (i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";
//     }
//     slides[slideIndex - 1].style.display = "block";
// }

// //chuyển ảnh trong bài post
// let slideIndex1 = 1;
// showSlidesImg(slideIndex1);

// function plusSlidesImg(b) {
//     showSlidesImg(slideIndex1 += b);
// }

// function currentSlideImg(b) {
//     showSlidesImg(slideIndex1 = b);
// }

// function showSlidesImg(b) {
//     let i;
//     let slidesImg = document.getElementsByClassName("mySlides_img");
//     let dots1 = document.getElementsByClassName("demo");
//     if (b > slidesImg.length) {
//         slideIndex1 = 1
//     }
//     if (b < 1) {
//         slideIndex1 = slidesImg.length
//     }
//     for (i = 0; i < slidesImg.length; i++) {
//         slidesImg[i].style.display = "none";
//     }
//     for (i = 0; i < dots1.length; i++) {
//         dots1[i].className = dots1[i].className.replace(" active1", "");
//     }
//     slidesImg[slideIndex1 - 1].style.display = "block";
//     dots1[slideIndex1 - 1].className += " active1";
// }

var url = "http://116.108.153.26/";
var chatToUser;
//dang xuat
document.getElementById('logout').onclick = function () {
    $.ajax({
        url: url + "Login/Logout/" + cookie.user,
        type: 'POST',
        headers: { Authorization: 'Bearer ' + cookie.token },
        error: function (err) {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            location.reload();
        }
    });
};

//check friend online
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", url + "Account/MyFriend/" + cookie.user, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.response);
                data.forEach(element => {
                    if (element.status == true) {
                        if (document.getElementById('onl-' + element.userId).classList.contains('online-dot') == false)
                            document.getElementById('onl-' + element.userId).className += ' online-dot';
                    }
                    else {
                        document.getElementById('onl-' + element.userId).classList.remove('online-dot');
                    }
                });
            }
        }
    }
    xhr.send();
}, 1000);

//gui thong bao
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", url + "Newsfeed/Notify/" + cookie.user, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.response);
                data.forEach(element => {
                    let html = `<div id="notSeen_${element.id}" class="online-list notSeen">
                                <div class="online">
                                    <a href="/Profile/${element.fromUser}">
                                        <img src="${element.avatar}" alt="">
                                    </a>
                                </div>
                                <p class="dess">
                                    <span class="name-post">${element.fullName}</span>
                                    <span class="tt">${element.content}</span>
                                </p>
                                <i class="fa-solid fa-xmark" style="background-color: #eee;"></i>
                                </div>`;
                    if (document.getElementById('notSeen_' + element.id) == null) {
                        document.getElementById("notifications").insertAdjacentHTML("afterend", html);
                    }
                    else {
                        if (element.status == 1) {
                            document.getElementById('notSeen_' + element.id).classList.remove('notSeen');
                        }
                    }
                });
                if (document.getElementsByClassName("online-list notSeen").length > 0)
                    document.getElementById('qty_tb').innerHTML = document.getElementsByClassName("online-list notSeen").length;
                else {
                    if (document.getElementById('qty_tb') != null)
                        document.getElementById('qty_tb').remove();
                }
            }
        }
    }
    xhr.send();
}, 1000);

//click vào bạn bè hiện ô chat
const showChat = document.getElementById('sidebars_chat');
function onclickShowChat(toUser_id) {
    if (toUser_id != null) {
        document.getElementById("old").src = document.getElementById('avaName_' + toUser_id).src;
        document.getElementById("user_chat").innerHTML = document.getElementById('chatName_' + toUser_id).innerHTML;
        myInterval = setInterval(() => {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", url + "Account/Chating?from=" + cookie.user + "&to=" + toUser_id, true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.response);
                        data.forEach(element => {
                            if (element.fromUser == toUser_id && element.toUser == cookie.user) {
                                let html = `<div id="incoming_${element.id}" class="chat incoming">
                                                <img src="${element.fromAva}" alt="">
                                                <div class="details">
                                                    <p>${element.message1}</p>
                                                </div>
                                            </div>`;
                                if (document.getElementById('incoming_' + element.id) == null)
                                    document.getElementById('chat-box').insertAdjacentHTML("beforeend", html);
                            }
                            if (element.fromUser == cookie.user && element.toUser == toUser_id) {
                                let html = `<div id="outgoing_${element.id}" class="chat outgoing">
                                                <div class="details">
                                                    <p>${element.message1}</p>
                                                </div>
                                            </div>`;
                                if (document.getElementById('outgoing_' + element.id) == null)
                                    document.getElementById('chat-box').insertAdjacentHTML("beforeend", html);
                            }
                        });
                    }
                }
            }
            xhr.send();
        }, 500);
    }
    else {
        document.getElementById("old").src = '';
        document.getElementById("user_chat").innerHTML = '';
        document.getElementById("chat-box").innerHTML = '';
        clearInterval(myInterval);
    }
    showChat.classList.toggle("sidebars_chat_show");
    chatToUser = toUser_id;
}

//post 
async function new_cmt(postId) {
    var content = document.getElementById("cmt_" + postId).value;
    var img = document.getElementById("user_img").src;
    var name = document.getElementById("user_name").textContent;
    if (content == '') {
        alert('Hãy viết bình luận !!!')
    }
    else {
        $.ajax({
            type: "POST",
            url: url + "Newsfeed/NewCmt",
            contentType: "application/json;charset=utf-8",
            headers: { Authorization: 'Bearer ' + cookie.token },
            data: JSON.stringify({ postId: postId, userId: cookie.user, content: content }),
            success: function () {
                let html = `
                <div id="user-cmt" class="user-cmt">
                    <img id="img_cmt" src="${img}">
                    <div class="name-user">
                        <div class="user-container">
                            <div class="name-user-cmt">
                                <h4>${name}</h4>
                                <p class="cmtt">${content}</p>
                            </div>
                        </div>
                    </div>
                </div>`;
                document.getElementById("cmt_" + postId).value = "";
                document.getElementById("user-cmt_" + postId).insertAdjacentHTML("afterend", html);
                document.getElementById("count_cmt_" + postId).innerHTML = parseInt(document.getElementById("count_cmt_" + postId).innerHTML) + 1;
            },
        });
    }
}
async function delete_post(id) {
    $.ajax({
        url: url + "Newsfeed/XoaPost/" + id,
        type: 'DELETE',
        headers: { Authorization: 'Bearer ' + cookie.token },
        error: function (err) {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            document.getElementById("post-container_" + id).remove();
        }
    });
}
async function heart(id) {
    if (document.getElementById(id + '-heart').classList.contains('fa-solid') == false) {
        $.ajax({
            url: url + "Newsfeed/NewLike",
            type: 'POST',
            headers: { Authorization: 'Bearer ' + cookie.token },
            contentType: "application/json;charset=utf-8",
            data: JSON.stringify({ postId: id, userId: cookie.user }),
            error: function (err) {
                alert("Đã có lỗi xảy ra !!!")
                location.reload();
            },
            success: function () {
                document.getElementById(id + '-heart').classList.remove('fa-regular');
                document.getElementById(id + '-heart').className += ' fa-solid';
                document.getElementById(id + '-count-heart').innerHTML = parseInt(document.getElementById(id + '-count-heart').innerHTML) + 1;
            }
        });
    }
    else {
        $.ajax({
            url: url + "Newsfeed/UnHeart",
            type: 'DELETE',
            headers: { Authorization: 'Bearer ' + cookie.token },
            contentType: "application/json;charset=utf-8",
            data: JSON.stringify({ postId: id, userId: cookie.user }),
            error: function (err) {
                alert("Đã có lỗi xảy ra !!!")
                location.reload();
            },
            success: function () {
                document.getElementById(id + '-heart').classList.remove('fa-solid');
                document.getElementById(id + '-heart').className += ' fa-regular';
                document.getElementById(id + '-count-heart').innerHTML = parseInt(document.getElementById(id + '-count-heart').innerHTML) - 1;
            }
        });
    }
}

//friend_request
async function add_friend_req(id) {
    $.ajax({
        url: url + "Newsfeed/Add_Friend",
        type: 'POST',
        headers: { Authorization: 'Bearer ' + cookie.token },
        contentType: "application/json;charset=utf-8",
        data: JSON.stringify({ fromUser: cookie.user, toUser: id }),
        error: function (err) {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            alert("Đã gửi lời mời kết bạn !!!");
            location.reload();
        }
    });
}
async function un_friend_req(id) {
    $.ajax({
        url: url + "Newsfeed/Unfriend/" + id,
        type: 'DELETE',
        headers: { Authorization: 'Bearer ' + cookie.token },
        error: function (err) {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            alert("Đã từ chối lời mời kết bạn !!!");
            location.reload();
        }
    });
}

//responce_friend
async function addfriend(id) {
    $.ajax({
        url: url + "Newsfeed/Answers_Friend/" + id,
        type: 'POST',
        headers: { Authorization: 'Bearer ' + cookie.token },
        contentType: "application/json;charset=utf-8",
        error: function (err) {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            alert("Kết bạn thành công !!!");
            location.reload();
        }
    });
}
async function unfriend(me, you) {
    $.ajax({
        url: url + "Newsfeed/XoaBan/" + me + "/" + you,
        type: 'DELETE',
        headers: { Authorization: 'Bearer ' + cookie.token },
        error: function (err) {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            alert("Đã hủy kết bạn !!!");
            location.reload();
        }
    });
}

//Join group
async function join_group_req(group_id) {
    $.ajax({
        url: url + "Groups/JoinReq",
        type: 'POST',
        headers: { Authorization: 'Bearer ' + cookie.token },
        contentType: "application/json;charset=utf-8",
        data: JSON.stringify({ groupId: group_id, userId: cookie.user }),
        error: function () {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            alert("Đã gửi yêu cầu tham gia nhóm !!!");
            location.reload();
        }
    });
}
async function undo_req(group_id) {
    $.ajax({
        url: url + "Groups/DeleteJoinReq",
        type: 'DELETE',
        headers: { Authorization: 'Bearer ' + cookie.token },
        contentType: "application/json;charset=utf-8",
        data: JSON.stringify({ groupId: group_id, userId: cookie.user }),
        error: function () {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            alert("Đã hủy yêu cầu join nhóm !!!");
            location.reload();
        }
    });
}
async function join_group(req_id) {
    $.ajax({
        url: url + "Groups/NewMember/" + req_id,
        type: 'POST',
        headers: { Authorization: 'Bearer ' + cookie.token },
        error: function () {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            alert("Đã chấp nhận tham gia nhóm !!!");
            // location.reload();
        }
    });
}
async function leave_group(group_id) {
    $.ajax({
        url: url + "Groups/LeaveGroup",
        type: 'DELETE',
        headers: { Authorization: 'Bearer ' + cookie.token },
        contentType: "application/json;charset=utf-8",
        data: JSON.stringify({ groupId: group_id, userId: cookie.user }),
        error: function () {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            alert("Đã rời khỏi nhóm !!!");
            location.reload();
        }
    });
}

//post_group
async function delete_post_group(id) {
    $.ajax({
        url: url + "Groups/DeletePost/" + id,
        type: 'DELETE',
        headers: { Authorization: 'Bearer ' + cookie.token },
        error: function (err) {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            document.getElementById("post-container_" + id).remove();
        }
    });
}
async function heart_group(id) {
    if (document.getElementById(id + '-heart').classList.contains('fa-solid') == false) {
        $.ajax({
            url: url + "Groups/NewLike",
            type: 'POST',
            headers: { Authorization: 'Bearer ' + cookie.token },
            contentType: "application/json;charset=utf-8",
            data: JSON.stringify({ postId: id, userId: cookie.user }),
            error: function (err) {
                alert("Đã có lỗi xảy ra !!!")
                location.reload();
            },
            success: function () {
                document.getElementById(id + '-heart').classList.remove('fa-regular');
                document.getElementById(id + '-heart').className += ' fa-solid';
                document.getElementById(id + '-count-heart').innerHTML = parseInt(document.getElementById(id + '-count-heart').innerHTML) + 1;
            }
        });
    }
    else {
        $.ajax({
            url: url + "Groups/UnHeart",
            type: 'DELETE',
            headers: { Authorization: 'Bearer ' + cookie.token },
            contentType: "application/json;charset=utf-8",
            data: JSON.stringify({ postId: id, userId: cookie.user }),
            error: function (err) {
                alert("Đã có lỗi xảy ra !!!")
                location.reload();
            },
            success: function () {
                document.getElementById(id + '-heart').classList.remove('fa-solid');
                document.getElementById(id + '-heart').className += ' fa-regular';
                document.getElementById(id + '-count-heart').innerHTML = parseInt(document.getElementById(id + '-count-heart').innerHTML) - 1;
            }
        });
    }
}
async function new_cmt_group(postId) {
    var content = document.getElementById("cmt_" + postId).value;
    var img = document.getElementById("user_img").src;
    var name = document.getElementById("user_name").textContent;
    if (content == '') {
        alert('Hãy viết bình luận !!!')
    }
    else {
        $.ajax({
            type: "POST",
            url: url + "Groups/NewCmt",
            contentType: "application/json;charset=utf-8",
            headers: { Authorization: 'Bearer ' + cookie.token },
            data: JSON.stringify({ postId: postId, userId: cookie.user, content: content }),
            success: function () {
                let html = `
                <div id="user-cmt" class="user-cmt">
                    <img id="img_cmt" src="${img}">
                    <div class="name-user">
                        <div class="user-container">
                            <div class="name-user-cmt">
                                <h4>${name}</h4>
                                <p class="cmtt">${content}</p>
                            </div>
                        </div>
                    </div>
                </div>`;
                document.getElementById("cmt_" + postId).value = "";
                document.getElementById("user-cmt_" + postId).insertAdjacentHTML("afterend", html);
                document.getElementById("count_cmt_" + postId).innerHTML = parseInt(document.getElementById("count_cmt_" + postId).innerHTML) + 1;
            },
        });
    }
}

//Share
async function share(id) {
    $.ajax({
        url: url + "Newsfeed/NewShare",
        type: 'POST',
        headers: { Authorization: 'Bearer ' + cookie.token },
        contentType: "application/json;charset=utf-8",
        data: JSON.stringify({ postId: id, userId: cookie.user }),
        error: function (err) {
            alert("Đã có lỗi xảy ra !!!");
            location.reload();
        },
        success: function () {
            document.getElementById("count_share_" + id).innerHTML = parseInt(document.getElementById("count_share_" + id).innerHTML) + 1;
            alert("Đã chia sẻ bài viết !!!");
        }
    });
}
async function group_share(postId, groupId) {
    $.ajax({
        url: url + "Groups/NewShare",
        type: 'POST',
        headers: { Authorization: 'Bearer ' + cookie.token },
        contentType: "application/json;charset=utf-8",
        data: JSON.stringify({ postId: postId, userId: cookie.user, groupId: groupId }),
        error: function () {
            alert("Đã có lỗi xảy ra !!!");
            location.reload();
        },
        success: function () {
            document.getElementById("count_share_" + postId).innerHTML = parseInt(document.getElementById("count_share_" + postId).innerHTML) + 1;
            alert("Đã chia sẻ bài viết !!!");
        }
    });
}
async function un_share(id) {//tạo div mới lam vs group luon
    $.ajax({
        url: url + "Newsfeed/DeleteShare/" + id,
        type: 'DELETE',
        headers: { Authorization: 'Bearer ' + cookie.token },
        error: function (err) {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            document.getElementById("post-container_" + id).remove();//tạo div share xóa nó
        }
    });
}

//Notify
async function deleteNotify(id) {
    $.ajax({
        url: url + "Newsfeed/XoaNotify/" + id,
        type: 'DELETE',
        headers: { Authorization: 'Bearer ' + cookie.token },
        error: function (err) {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            document.getElementById("notSeen_" + id).remove();
        }
    });
}

//Chat 
async function send_mess() {
    const mess = document.getElementById('message');
    if (mess.value == '') {
        alert('Đã có lỗi xảy ra !!!');
    }
    else {
        $.ajax({
            url: url + "Account/SendMess",
            type: 'POST',
            headers: { Authorization: 'Bearer ' + cookie.token },
            contentType: "application/json;charset=utf-8",
            data: JSON.stringify({ fromUser: cookie.user, toUser: chatToUser, message1: mess.value }),
            error: function (err) {
                alert("Đã có lỗi xảy ra !!!")
                location.reload();
            },
            success: function () {
                mess.value = '';
                document.getElementById('btn_SendMess').style.display = 'none';
            }
        });
    }
}