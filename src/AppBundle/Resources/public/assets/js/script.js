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
            var day = $(this).parent().attr("data-day");
            var id = elemDrop.attr("data-id");

            var updateTime = new Date(day);
            updateTime.setHours(hour);


            $.post("http://127.0.0.1:8000/event/edit", {updateTime: updateTime, id: id}, function (data) {
                console.log("OK");
            });

        }
    });
});