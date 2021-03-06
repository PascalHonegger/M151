/**
 * Created by Pascal on 04.04.2016.
 */

function fadeToHome()
{
    var delay = 750;
    $("body").fadeOut(delay);
    setTimeout(function () {
        window.location.replace("../Home/home.php");
    }, delay);
}

function register() {
    var username=$("#RegisterUsername").val();
    var name=$("#Name").val();
    var surname=$("#Surname").val();
    var mail=$("#Mail").val();
    var password=$("#RegisterPassword").val();
    var repPassword=$("#RepPassword").val();

    var dataString = 'Username='+username+'&Name='+name+'&Surname='+surname+'&Mail='+mail+'&Password='+password+'&RepPassword='+repPassword;

    $.ajax({
        type: "POST",
        url: "RegisterInput.php",
        data: dataString,
        cache: false,
        beforeSend: function(){ $("#Submit").val('Verbinde...');},
        success: function(data){
            fadeToHome();
        },
        error: function (request, status, error) {
            //Shake animation effect.
            $("#registerform").effect("shake", {times: 2}, 750);
            $("#Submit").val('✖');
            setTimeout(function () {
                $('#Submit').val('Registrieren')
            }, 750);
        }
    });
}

function login() {
    var username=$("#Username").val();
    var password=$("#Password").val();
    var googleAuthenticatorCode=$("#GoogleAuthenticatorCode").val();

    var dataString = 'Username='+username+'&Password='+password+'&GoogleAuthenticatorCode'+googleAuthenticatorCode;

    $.ajax({
        type: "POST",
        url: "LoginInput.php",
        data: dataString,
        cache: false,
        beforeSend: function(){ $("#SubmitLogin").val('Verbinde...');},
        success: function(data){
            fadeToHome();

        },
        error: function (request, status, error) {
            //Shake animation effect.
            $("#loginDiv").effect("shake", {times: 2}, 750);
            $("#SubmitLogin").val('✖');
            setTimeout(function () {
                $('#SubmitLogin').val('Einloggen')
            }, 750);
        }
    });
}

function dropdown() {
    document.getElementById("loginDiv").classList.add("show");
}
function hideLogin() {
    document.getElementById("loginDiv").classList.remove("show");
}