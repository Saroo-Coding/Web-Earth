function sdt() {
    document.getElementById("email-sdt").innerHTML = "Số điện thoại";
    document.getElementById("email").value = "";
    document.getElementById("email").type = "number";
    document.getElementById("email").name = "sdt";
    document.getElementById("email").id = "sdt";
    document.getElementById("pass").value = "";
  }
  
  function email() {
    document.getElementById("email-sdt").innerHTML = "Email";
    document.getElementById("sdt").value = "";
    document.getElementById("sdt").type = "email";
    document.getElementById("sdt").name = "email";
    document.getElementById("sdt").id = "email";
    document.getElementById("pass").value = "";
  }
  
  function login() {
    var pass = document.getElementById("pass").value;
    fetch("http://116.108.153.26/Login?email=" + document.getElementById("email").value + "&pass=" + pass)
      .then(function(response) {
        if (response.ok) {
          //console.log(response.statusText);
        }
        else{
          alert("Sai tài khoản hoặc mật khẩu !!!");
        }
        return response.json();
      })
      .then(data => {
        document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "token = " + data.refreshToken;
        document.cookie = "user = " + data.userId;
        window.location.href = "http://127.0.0.1:8000";   
      });
  }