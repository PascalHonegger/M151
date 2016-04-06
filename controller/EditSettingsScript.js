/**
 * Created by Pascal on 06.04.2016.
 */

function applySettings() {
    var username = $("#Username").val();
    var name = $("#Name").val();
    var surname = $("#Surname").val();
    var mail = $("#Mail").val();
    var password = $("#Password").val();
    var repPassword = $("#RepPassword").val();
    var code = $("#GoogleAuthenticatorCode").val();
    var secret = $("#GoogleAuthenticatorSecret").val();

    var dataString = 'Username=' + username + '&Name=' + name + '&Surname=' + surname + '&Mail=' + mail + '&Password=' + password + '&RepPassword=' + repPassword + "&GoogleAuthenticatorCode=" + code + "&GoogleAuthenticatorSecret=" + secret;

    $.ajax({
        type: "POST",
        url: "EditSettingsInput.php",
        data: dataString,
        cache: false,
        beforeSend: function () {
            $("#Submit").val('Übernehme...');
        },
        success: function (data) {
            if (data) {

            }
            else {
//Shake animation effect.
                $("#settingsForm").effect("shake", {times: 2}, 750);
                $("#Submit").val('✖');
                setTimeout(function () {
                    $('#Submit').val('Übernehmen')
                }, 3000);
            }
        }
    });

    return false;
}