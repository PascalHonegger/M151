/**
 * Created by Serafin on 05.04.2016.
 */

function login() {
    var name=$("#name").val();
    var description=$("#description").val();
    var position=$("#position").val();

    var dataString = 'name='+name+'&description='+description+'&=position'+position;

    $.ajax({
        type: "POST",
        url: "LocationInput.php",
        data: dataString,
        cache: false,
        beforeSend: function(){ $("#SubmitLogin").val('Verbinde...');},
        success: function(data){
            if(data)
            {
                //backToEvent();
                alert("Succes");
            }
            else
            {
//Shake animation effect.
                $("#content").effect("shake", {times: 2}, 750);
                $("#submit").val('Absenden');
            }
        }
    });

    function backToEvent(){

        $("body").load("../Event/Event.php").hide().fadeIn(1500).delay(6000);

    }

    return false;
}

