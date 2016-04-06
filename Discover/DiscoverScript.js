/**
 * Created by Pascal on 04.04.2016.
 */
var offset = 0;
var amount = 100;

$(document).on('click', 'div', function () {
    if (this.id == "infiniteScroll") {
        alert(this.id);
    }
});

loadMoreElements(true);

$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
        loadMoreElements(false);
    }
});

function loadMoreElements(startAgain) {

    if (startAgain) {
        offset = 0;
        amount = 20;
        $("#infiniteScroll").empty();
    }

    var filterString = $("#NameFilterString").val();

    if (filterString == undefined) {
        filterString = "";
    }

    var dataString = 'Offset=' + offset + '&Amount=' + amount + '&StringFilter=' + filterString;

    $.ajax({
        type: "POST",
        url: "DiscoverInput.php",
        data: dataString,
        cache: false,
        beforeSend: function () {
            $("#footer").val('Lade...');
        },
        success: function (data) {
            $("#infiniteScroll").append(data);
            offset += amount;
        }
    });
}