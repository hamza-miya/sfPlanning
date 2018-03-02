$(function () {

    $(".event").draggable({
        cursor: "crosshair",
        drag: function (event, ui) {
        }
    });

    $(".space-event").droppable({
        drop: function (event, ui) {

            var elemDrop = ui.draggable;
            var color = elemDrop.css("background-color");

            elemDrop.removeAttr("style");
            elemDrop.css({'position': 'relative'});
            elemDrop.css({'background-color': color});

            $(this).append(elemDrop);

            var hour = $(this).attr("data-space-event");
            var date = $(this).parent().attr("data-day");

            var explode = date.split("-");

            var id = elemDrop.attr("data-id");

            $.post("http://127.0.0.1:8000/event/edit", {
                day: explode[2],
                month: explode[1],
                year: explode[0],
                hour: hour,
                id: id
            }, function (data) {
                alert("Ok")
            });

        }
    });
});