/**
 * Created by Serafin on 05.04.2016.
 */

function createLocation() {
    var genericFormData = new FormData($("form")[1]);

    $.ajax({
        type: "POST",
        url: "../Location/LocationInput.php",
        data: genericFormData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("#submit").val('Verbinde...');
        },
        success: function(data){
            //backToEvent();
            alert("Success!");
        },
        error: function (request, status, error) {
            //Shake animation effect.
            $("#createLocationForm").effect("shake", {times: 2}, 750);

            $("#submit").val('✖');
            setTimeout(function () {
                $('#submit').val('Absenden')
            }, 750);
        }
    });

    function backToEvent(){
        $("body").load("../Event/Event.php").hide().fadeIn(1500).delay(6000);
    }
}