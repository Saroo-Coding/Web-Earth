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

// $(document).ready(function(){ 
//     $.ajax({
//         url: "https://localhost:7126/Account/IsMe/" + cookie.user,
//         type: 'GET',
//         headers: {Authorization: 'Bearer '+ cookie.token},
//         error : function(err) {
//             window.location.href = "login";
//           },
//           success: function(data) {
            
//           }
//       });
// });

  