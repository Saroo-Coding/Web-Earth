var password = document.querySelector('#pass');
var confirmpassword = document.querySelector('#confirmpassword');
var btnSubmit = document.querySelector('.bg-danger');
confirmpassword.addEventListener("keyup", logKey);
password.addEventListener("keyup", logKey);

function logKey() {
    if (password.value !== confirmpassword.value) {
        btnSubmit.setAttribute("disabled", 'true');
    } else {
        btnSubmit.removeAttribute("disabled", 'false');
    }
}

var url = "http://116.108.153.26/";
function register() {
    var name = document.getElementById("firstname").value +" "+ document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var pass = document.getElementById("pass").value;
    var birthday = document.getElementById("date").value;
    var sex = document.querySelector('input[name="exampleRadios"]:checked').value;
    $.ajax({
        url: url + "Login",
        type: 'POST',
        contentType: "application/json;charset=utf-8",
        data: JSON.stringify({fullName:name,phone:phone,email:email,pass:pass,birthday:birthday,sex:sex}),
        error: function (err) {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            alert("Chào mừng "+ name + " đến với Earth !!!");
            window.location.href = "http://127.0.0.1:8000";
        }
    });
  }