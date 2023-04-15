var settingsmenu = document.querySelector(".settings-menu");
var searchBtnMenu = document.querySelector(".messenger-menu");
var notifiBtnMenu = document.querySelector(".notification-menu");
var cookie = document.cookie.split(";").map(cookie => cookie.split("=")).reduce((accumulator,[key,value]) => ({...accumulator, [key.trim()]:decodeURIComponent(value)}),{});


//search home
function messengerMenuToggle(){
    searchBtnMenu.classList.toggle("messenger-menu-height");
    notifiBtnMenu.classList.remove("notification-menu-height");
}
//notification home
function notificationMenuToggle(){
    notifiBtnMenu.classList.toggle("notification-menu-height");
    searchBtnMenu.classList.remove("messenger-menu-height");
}
//setting home
function settingsMenuToggle(){
    settingsmenu.classList.toggle("settings-menu-height");
    
}


// Pusher.logToConsole = true;

// var pusher = new Pusher('d4cccffb0b8a22806dbf', {
//     cluster: 'ap1'
// });

// var channel = pusher.subscribe('popup-channel');
// channel.bind('cmt-event', function (data) {
//     alert(JSON.stringify(data));
// });


// $(function(){
//     let ip ='127.0.0.1';
//     let socket_port = '3000';
//     let socket = io(ip + ':' + socket_port);
//     socket.on('disconnect');
//     socket.on('connection')
// });
