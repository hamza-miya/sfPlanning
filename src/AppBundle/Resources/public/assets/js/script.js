$(function () {

    $(".event").draggable({
        cursor: "crosshair",
        drag: function (event, ui) {
        }
    });

    $(".space-event").droppable({
        drop: function (event, ui) {
            var elemDrop = ui.draggable;
            elemDrop.removeAttr("style");
            elemDrop.css({'position': 'relative'});

            $(this).append(elemDrop);
        }
    });
});