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

const modal = document.getElementById('section-cmt');
const albums = document.getElementById('id01'); // albums
const EDIT_USER = document.getElementById('EDIT_USER'); //EDIT USER
const searchs_header = document.getElementById('searchss');
window.onclick = function (event) {
    //searchs header
    if (event.target == searchs_header) {
        searchs_header.style.display = "none";
    }
    // comment
    if (event.target == modal) {
        modal.style.display = "none";
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

document.getElementById('logout').onclick = function () {
    document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    location.reload();

};

var url = "http://116.108.153.26/";
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
                //gui cmt len sever
                //socket.emit('send_Cmt',{img:img,content:content,postId:postId,name:name});
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
async function join_group_req(group_id){
    $.ajax({
        url: url + "Groups/JoinReq",
        type: 'POST',
        headers: { Authorization: 'Bearer ' + cookie.token },
        contentType: "application/json;charset=utf-8",
        data: JSON.stringify({ groupId:group_id, userId: cookie.user }),
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
async function undo_req(group_id){
    $.ajax({
        url: url + "Groups/DeleteJoinReq",
        type: 'DELETE',
        headers: { Authorization: 'Bearer ' + cookie.token },
        contentType: "application/json;charset=utf-8",
        data: JSON.stringify({ groupId:group_id, userId: cookie.user }),
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
async function join_group(req_id){
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
async function leave_group(group_id){
    $.ajax({
        url: url + "Groups/LeaveGroup",
        type: 'DELETE',
        headers: { Authorization: 'Bearer ' + cookie.token },
        contentType: "application/json;charset=utf-8",
        data: JSON.stringify({ groupId:group_id, userId: cookie.user }),
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