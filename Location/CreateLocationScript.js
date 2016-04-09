/**
 * Created by Serafin on 05.04.2016.
 */

function createLocation() {
    var name=$("#name").val();
    var description=$("#description").val();
    var position=$("#position").val();

    var file_data = $('#userfile').prop('files')[0];
    var form_data = new FormData();
    form_data.append('userfile', file_data);
    form_data.append('name', name);
    form_data.append('description', description);
    form_data.append('position', position);


    $.ajax({
        type: "POST",
        url: "../Location/LocationInput.php",
        data: form_data,
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

