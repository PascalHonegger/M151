/**
 * Created by Pascal on 04.04.2016.
 */
var offset = 0;
var amount = 100;

loadMoreElements(true);

$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() === $(document).height()) {
        loadMoreElements(false);
    }
});

$('#NameFilterString').change(function () {
        loadMoreElements(true);
    }
);

function loadMoreElements(startAgain) {

    if (startAgain) {
        offset = 0;
        amount = 50;
        $("#infiniteScroll").empty();
    }

    var filterString = $("#NameFilterString").val();

    if (filterString === undefined) {
        filterString = "";
    }

    var dataString = 'Offset=' + offset + '&Amount=' + amount + '&StringFilter=' + filterString;

    $.ajax({
        type: "POST",
        url: "DiscoverInput.php",
        data: dataString,
        cache: false,
        success: function (data) {
            $("#infiniteScroll").append(data);
            offset += amount;
            createSlides(data);
            addClickEvent();
        }
    });
}

function createSlides(html) {
    $(".newSlides").bxSlider({
        pager: false
    }).addClass("slides").removeClass("newSlides");
}

function addClickEvent() {
    $(".contentLocation").unbind("click").click(function () {
        //alert("You clicked on a location wiht the id: " + this.id);
    });
}

function openlocation(location, name) {
    window.location = "../Events/Event.php?id=" + location + "&name=" + name;
}