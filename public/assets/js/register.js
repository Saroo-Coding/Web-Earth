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

function register() {
    var url = "http://116.108.44.227/";
    var name = document.getElementById("firstname").value + " " + document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var pass = document.getElementById("pass").value;
    var birthday = document.getElementById("date").value;
    var sex = document.querySelector('input[name="exampleRadios"]:checked').value;
    $.ajax({
        url: url + "Login",
        type: 'POST',
        contentType: "application/json;charset=utf-8",
        data: JSON.stringify({ fullName: name, phone: phone, email: email, pass: pass, birthday: birthday, sex: sex, status:false }),
        error: function (err) {
            alert("Đã có lỗi xảy ra !!!")
            location.reload();
        },
        success: function () {
            sendEmail(email,name);
            alert("Chào mừng " + name + "đến với Earth !!!");
            window.location.href = "http://127.0.0.1:8000";
        }
    });
}

function sendEmail(email, name) {
    let html = `
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <title>
                </title>
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
                                                                    <p class="style1 text-center" style="text-align: center; margin: 0px; padding: 0px; color: #f24656; font-size: 36px; font-family: Helvetica, Arial, sans-serif;">
                                                                        <strong>Welcome To Earth</strong>
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
                                                                    <p style="margin: 0px; padding: 0px;">Chúc mừng và chào mừng bạn đến với cộng đồng toàn những thành viên thân thiện và đáng yêu này nhé ✨✨✨</p>
                                                                    <p style="margin: 0px; padding: 0px;"><br></p>
                                                                    <p style="margin: 0px; padding: 0px;">Mong rằng chúng ta sẽ cùng đóng góp để nhóm phát triển lớn mạnh hơn nữa trong tương lai.</p>
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
                                                                    <p style="margin: 0px; padding: 0px;"><span style="color: #ffffff;">Wish you and your friend's choice and good luck with your new body and love ✨✨✨</span></p>
                                                                    <p style="margin: 0px; padding: 0px;"><span style="color: #ffffff;"><br></span></p>
                                                                    <p style="margin: 0px; padding: 0px;"><span style="color: #ffffff;"><span style="color: #ffffff;">Dreaming of us moving on the street is a vision in the future.</span></span></p>
                                                                    <p style="margin: 0px; padding: 0px;"><span style="color: #ffffff;"><br></span></p>
                                                                    <p class="text-right" style="text-align: right; margin: 0px; padding: 0px;"><a href="#" style="color: #16c2d0; font-size: 14px; font-family: Helvetica, Arial, sans-serif; text-decoration: none;"><span style="color: #ffffff;"><u>Login now &gt;&gt;</u></span></a></p>
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
