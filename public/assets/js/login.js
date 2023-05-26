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
  fetch("http://116.108.44.227/Login?email=" + document.getElementById("email").value + "&pass=" + pass)
    .then(function (response) {
      if (response.ok) {
        //console.log(response.statusText);
      }
      else {
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

function forgetPass() {
  var url = "http://116.108.44.227/";
  var email = document.getElementById('email').value;
  var sdt = document.getElementById('phone').value;
  $.ajax({
    url: url + "Login/ForgetPass",
    type: 'POST',
    contentType: "application/json;charset=utf-8",
    data: JSON.stringify({ email: email, sdt: sdt }),
    error: function (err) {
      document.getElementById('email').value = '';
      document.getElementById('phone').value = '';
      alert("Tài khoản và số điện thoại không tồn tại !!!");
    },
    success: function (req) {
      document.getElementById('forget').style.display = 'none';
      document.getElementById('success').style.display = 'block';
      sendMail(email,req.name,req.newPass);
    }
  });
}
function sendMail(email,name,pass){
  let html = `
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width">
      <style type="text/css">
          body,
          html {
              margin: 0px;
              padding: 0px;
              -webkit-font-smoothing: antialiased;
              text-size-adjust: none;
              width: 100% !important;
          }
          #outlook a { padding: 0px; }
          .ExternalClass,
          .ExternalClass p,
          .ExternalClass span,
          .ExternalClass font,
          .ExternalClass td,
          .ExternalClass div { line-height: 100%; }
          .ExternalClass { width: 100%; }
          @media only screen and (max-width: 480px) {
              table tr td table.edsocialfollowcontainer { width: auto !important; }
              table,table tr td,table td { width: 100% !important; }
              img { width: inherit; }
              .layer_2 { max-width: 100% !important; }
              .edsocialfollowcontainer table { max-width: 25% !important; }
              .edsocialfollowcontainer table td { padding: 10px !important; }
          }
      </style>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">
  </head>
  <body style="padding:0; margin: 0;background: #efefef">
      <table style="height: 100%; width: 100%; background-color: #efefef;" align="center">
          <tbody>
              <tr>
                  <td valign="top" id="dbody" data-version="2.31" style="width: 100%; height: 100%; padding-top: 30px; padding-bottom: 30px; background-color: #efefef;">
                      <table class="layer_1" align="center" border="0" cellpadding="0" cellspacing="0" style="max-width: 600px; box-sizing: border-box; width: 100%; margin: 0px auto;">
                          <tbody>
                              <tr>
                                  <td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
                                      <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                                          <table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%">
                                              <tbody>
                                                  <tr>
                                                      <td valign="top" class="emptycell" style="padding: 10px;">
                                                      </td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
                                      <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                                          <table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%">
                                              <tbody>
                                                  <tr>
                                                      <td valign="top" class="edimg" style="padding: 0px; box-sizing: border-box; text-align: center;">
                                                          <img src="https://api.elasticemail.com/userfile/a18de9fc-4724-42f2-b203-4992ceddc1de/geometric_divider1.png" alt="Image" width="576" style="border-width: 0px; border-style: none; max-width: 576px; width: 100%;">
                                                      </td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
                                      <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                                          <table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%">
                                              <tbody>
                                                  <tr>
                                                      <td valign="top" class="edtext" style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;">
                                                          <p class="style1 text-center"
                                                              style="text-align: center; margin: 0px; padding: 0px; color: #f24656; font-size: 36px; font-family: Helvetica, Arial, sans-serif;">
                                                              <strong>Welcome Back To Earth
                                                              </strong>
                                                          </p>
                                                      </td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
                                      <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                                          <table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%">
                                              <tbody>
                                                  <tr>
                                                      <td valign="top" class="edtext" style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;">
                                                          <p style="margin: 0px; padding: 0px;">Chào cư dân ${name},</p>
                                                          <p style="margin: 0px; padding: 0px;">Chúc mừng và chào mừng bạn trở lại với cộng đồng toàn những thành viên thân thiện và đáng yêu này nhé ✨✨✨</p>
                                                          <p style="margin: 0px; padding: 0px;"><br></p>
                                                          <p style="margin: 0px; padding: 0px;">Đây là tài khoản và mật khẩu mới của bạn !!!</p>
                                                          <p style="margin: 10px; padding: 0px;font-size: 17px;text-align: center;">Tài khoản: ${email}</p>
                                                          <p style="margin: 0px; padding: 0px;font-size: 17px;text-align: center;">Mật khẩu: ${pass}</p>
                                                          <p class="text-right"
                                                              style="text-align: right; margin: 0px; padding: 0px;">
                                                              <a href="#" style="color: #16c2d0; font-size: 14px; font-family: Helvetica, Arial, sans-serif; text-decoration: none;"><span><u>Đăng nhập ngay&gt;&gt;</u></span></a>
                                                          </p>
                                                      </td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
                                      <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                                          <table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%">
                                              <tbody><tr><td valign="top" class="emptycell" style="padding: 20px;"></td></tr></tbody>
                                          </table>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="drow" valign="top" align="center" style="background-color: #f24656; box-sizing: border-box; font-size: 0px; text-align: center;">
                                      <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                                          <table border="0" cellspacing="0" cellpadding="0" class="edcontent"
                                              style="border-collapse: collapse;width:100%">
                                              <tbody><tr><td valign="top" class="emptycell" style="padding: 10px;"></td></tr></tbody>
                                          </table>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="drow" valign="top" align="center" style="background-color: #f24656; box-sizing: border-box; font-size: 0px; text-align: center;">
                                      <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                                          <table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%">
                                              <tbody>
                                                  <tr>
                                                      <td valign="top" class="edtext" style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;">
                                                          <h3 style="margin: 0px; padding: 0px;"><span style="color: #ffffff;">Đây là tin quan trọng vui lòng không chia sẻ với bất kỳ ai !!!</span></h3>
                                                          <p style="margin: 0px; padding: 0px;"><span style="color: #ffffff;"><br></span></p>
                                                          <h3 style="margin: 0px; padding: 0px;"><span style="color: #ffffff;"><span style="color: #ffffff;">Mọi việc rò rỉ thông tin chúng tôi không chịu trách nhiệm.</span></span></h3>
                                                          <p style="margin: 0px; padding: 0px;"><span style="color: #ffffff;"><br></span></p>
                                                          <p class="text-right" style="text-align: right; margin: 0px; padding: 0px;">
                                                              <a href="#" style="color: #16c2d0; font-size: 14px; font-family: Helvetica, Arial, sans-serif; text-decoration: none;"><span style="color: #ffffff;"><u>Login now &gt;&gt;</u></span></a>
                                                          </p>
                                                      </td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="drow" valign="top" align="center" style="background-color: #f24656; box-sizing: border-box; font-size: 0px; text-align: center;">
                                      <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                                          <table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%">
                                              <tbody>
                                                  <tr>
                                                      <td valign="top" class="emptycell" style="padding: 10px;"></td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
                                      <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                                          <table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%">
                                              <tbody>
                                                  <tr>
                                                      <td valign="top" class="edtext" style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;">
                                                          <p style="margin: 0px; padding: 0px;">Mọi thắc mắc hãy liên hệ:  <a href="#" style="color: #16c2d0; font-size: 14px; font-family: Helvetica, Arial, sans-serif; text-decoration: none;">congdanh785@gmail.com</a></p>
                                                      </td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
                                      <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                                          <table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%">
                                              <tbody>
                                                  <tr>
                                                      <td valign="top" class="edimg" style="padding: 0px; box-sizing: border-box; text-align: center;">
                                                          <img src="https://api.elasticemail.com/userfile/a18de9fc-4724-42f2-b203-4992ceddc1de/geometric_footer1.png" alt="Image" width="587" style="border-width: 0px; border-style: none; max-width: 587px; width: 100%;">
                                                      </td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </td>
              </tr>
          </tbody>
      </table>
  </body>
  </html>
  `;
  Email.send({
    SecureToken: "66bf1cea-e665-4688-bd87-b88e6d88becc",
    To: email,
    From: "congdanh785@gmail.com",
    Subject: "Welcome To Earth",
    Body: html
});
}
document.getElementById('forgetPass').onclick = forgetPass;
