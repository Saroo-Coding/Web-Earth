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
// xóa lịch sử tìm kiếm trên thanh search header
const closebtns = document.getElementsByClassName("fa-xmark");
let i;
for (i = 0; i < closebtns.length; i++) {
  closebtns[i].addEventListener("click", function() {
    this.parentElement.style.display = 'none';
  });
}

const searchBar = document.querySelector(".users .search_messenger input");
const searchBtn = document.querySelector(".users .search_messenger button");
const usersList = document.querySelector(".users .users-list");


searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle('active');
    searchBar.value = "";
}
  


//search ở logo nhắn tin
const searchInput = document.getElementById('search-input');
const userList = document.querySelector('.users-list');

searchInput.addEventListener('input', () => {
  const searchTerm = searchInput.value.toLowerCase();

  for (const user of userList.children) {
    const userName = user.querySelector('.details > span').textContent.toLowerCase();
    const userMessage = user.querySelector('.details > p').textContent.toLowerCase();
    const isMatched = userName.includes(searchTerm) || userMessage.includes(searchTerm);
    
    user.style.display = isMatched ? 'flex' : 'none';
  }
});