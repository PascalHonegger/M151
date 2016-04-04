/**
 * Created by Pascal on 04.04.2016.
 */
function login() {
    var username=$("#Username").val();
    var password=$("#Password").val();
    var googleAuthenticatorCode=$("#GoogleAuthenticatorCode").val();

    var dataString = 'Username='+username+'&Password='+password+'&GoogleAuthenticatorCode'+googleAuthenticatorCode;

    $.ajax({
        type: "POST",
        url: "LoginController.php",
        data: dataString,
        cache: false,
        beforeSend: function(){ $("#SubmitLogin").val('Verbinde...');},
        success: function(data){
            if(data)
            {
                $("body").load("../Home/home.php").hide().fadeIn(1500).delay(6000);
//or
                window.location.href = "../Home/home.php";
            }
            else
            {
//Shake animation effect.
                $("#loginDiv").effect("shake", {times: 2}, 750);
                $("#SubmitLogin").val('Einloggen');
            }
        }
    });

    return false;
}

function dropdown() {
    document.getElementById("loginDiv").classList.add("show");
}
function hideLogin() {
    document.getElementById("loginDiv").classList.remove("show");
}