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

// comment
// var comment = document.getElementById('timess');
// window.onclick = function(event) {
//     if (event.target == comment) {
//         comment.style.display = "none";
//     }
// }
// comment trong comment
var modal = document.getElementById('section-cmt');
var albums = document.getElementById('id01'); // albums
var EDIT_USER = document.getElementById('EDIT_USER'); //EDIT USER
window.onclick = function (event) {
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


var url = "https://localhost:7126/";

function new_cmt(postId) {
    var content = document.getElementById("cmt_" + postId).value;
    var img = document.getElementById("user_img").src;
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
                            <h4>${document.getElementById("user_name").textContent}</h4>
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
function delete_post(id) {
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

//friend_request
function add_friend_req(id){
    $.ajax({
        url: url + "Newsfeed/Add_Friend",
        type: 'POST',
        headers: { Authorization: 'Bearer ' + cookie.token },
        contentType: "application/json;charset=utf-8",
        data: JSON.stringify({fromUser: cookie.user, toUser: id}),
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
function un_friend_req(id){
    $.ajax({
        url: url + "Newsfeed/Unfriend/" + id,
        type: 'DELETE',
        headers: { Authorization: 'Bearer ' + cookie.token },
        error: function (err) {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            alert("Đã hủy lời mời kết bạn !!!");
            location.reload();
        }
    });
}
//responce_friend
function addfriend(id){

}
function unfriend(me,you){
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