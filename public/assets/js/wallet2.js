$(document).ready(function () {
    $("#reason").on("shown.bs.modal", function (event) {
        var button = $(event.relatedTarget);

        var reason = button.data("reason");
        if (reason != "") $("#message").html(reason);
        else $("#message").html("No Message Yet.");
    });

    $("#wallet_id").on("input", function () {
        let walletID = $("#wallet_id").val();

        if (walletID.length < 11) {
            $("#validationMessage").text(
                error_message("Wallet ID must be at least 11 characters long.")
            );
            $("#data").hide();
            return;
        }

        let reciever = document.getElementById("reciever");

        if (walletID != "") {
            $.ajax({
                type: "get",
                url: "getReciever",
                dataType: "json",
                data: { walletID: walletID },
                success: function (response) {
                    if (response == 0) {
                        error_message(null);
                    } else if (response == "kyc") {
                        error_message("Reciever Pending KYC");
                    } else {
                        success_message(response);
                        $.ajax({
                            type: "get",
                            url: "getUserdetails",
                            dataType: "json",
                            data: { walletID: walletID },
                            success: function (response) {
                                $("#data").show();
                                fill_data(response);
                            },
                            error: function (data) {},
                        });
                    }
                },
                error: function (data) {
                    error_message(null);
                },
            });
        } else {
            error_message("Please Enter a valid wallet ID");
        }
    });

    function error_message(msg) {
        if (msg) reciever.textContent = msg;
        else reciever.textContent = "Please Enter a valid wallet ID";
        reciever.classList.remove("bg-success", "border-success");
        reciever.classList.add(
            "bg-danger",
            "border-danger",
            "p-3",
            "bg-opacity-10",
            "border",
            "rounded",
            "rounded-top-0",
            "border-top-0",
            "mt-0"
        );
    }
    function success_message(response) {
        reciever.textContent = "Verified";
        reciever.classList.add(
            "bg-sucess",
            "border-success",
            "p-3",
            "bg-opacity-10",
            "border",
            "rounded",
            "rounded-top-0",
            "border-top-0",
            "mt-0"
        );
        reciever.classList.remove("bg-danger", "border-danger");
    }

    hide();
    $("#enrollment_type").prop("selectedIndex", 0).trigger("change");

    $("#enrollment_type").on("change", function () {
        if ($(this).val() == "2") {
            hide();
            show();
        } else if ($(this).val() == "1") {
            walletID = $("#selfid").val();
             hide();
            show();
              $("#wallet_id").hide(); // Hide the wallet ID field
                    $("#wallet_div").hide(); // Show the wallet ID field
                    $("#wallet_id").removeAttr("required");
            $.ajax({
                //create an ajax request to get session data
                type: "get",
                url: "getUserdetails",
                dataType: "json", //expect json File to be returned
                data: { walletID: walletID },
                success: function (response) {
                    $("#data").show();
                    fill_data(response);
                },
                error: function (data) {},
            });
        } else {
            hide();
            $("#enroll").trigger("reset");
        }
    });

    function hide() {
        $("#wallet_id").hide();
        $("#wallet_div").hide();
        $("#wallet_id").val(null);
        $("#wallet_id").removeAttr("required");
        $("#data").hide();
        $("#reciever").removeClass();
        $("#reciever").html(null);
    }
    function show() {
        $("#wallet_div").show();
        $("#wallet_id").show();
        $("#wallet_id").attr("required", "required");
    }
    function fill_data(response) {
        $("#fullname").val(
            response.first_name +
                " " +
                response.middle_name +
                " " +
                response.last_name
        );
        $("#email").val(response.email);
        $("#phone").val(response.phone_number);
        $("#state").val(null);
        $("#lga").val(null);
        $("#address").val(null);
        $("#username").val(null);
    }
});
