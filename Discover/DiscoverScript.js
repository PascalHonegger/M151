/**
 * Created by Pascal on 04.04.2016.
 */
var from = 0;
var to = 100;

$(document).on('click', 'div', function () {
    if (this.id == "infiniteScroll") {
        alert(this.id);
    }
});

loadMoreElements(true);

$(document).scroll(function () {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    //If reached bottom
    if ((elemBottom <= docViewBottom) && (elemTop >= docViewTop)) {
        loadMoreElements(false);
    }
});

function loadMoreElements(startAgain) {

    if (startAgain) {
        from = 0;
        to = 100;
        $("#infiniteScroll").val("Lade...");
    }

    var filterString = $("#NameFilterString").val();

    var dataString = 'Min=' + from + '&Max=' + to + '&StringFilter' + filterString;

    $.ajax({
        type: "POST",
        url: "DiscoverInput.php",
        data: dataString,
        cache: false,
        beforeSend: function () {
            $("#footer").val('Lade...');
        },
        success: function (data) {
            $("#infiniteScroll").val(data);
            from = to;
            to += 100;
        }
    });

    return false;
}