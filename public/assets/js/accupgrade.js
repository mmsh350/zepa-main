$(document).ready(function () {
    if (!localStorage.getItem("modalShown")) {
        // Show the modal
        $("#Terms").modal("show");

        // Set the flag to indicate that the modal has been shown
        localStorage.setItem("modalShown", "true");
    }

    // When the user clicks on <span> (x), close the modal
    $(".close").click(function () {
        $("#Terms").fadeOut();
    });

    $("#proceed").click(function () {
        $("#Terms").modal("hide");
    });

    $("#reason").on("shown.bs.modal", function (event) {
        var button = $(event.relatedTarget);

        var reason = button.data("reason");
        if (reason != "") $("#message").html(reason);
        else $("#message").html("No Message Yet.");
    });
});
