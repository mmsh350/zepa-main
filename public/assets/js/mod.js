$(document).ready(function () {
    $("#reason").on("shown.bs.modal", function (event) {
        var button = $(event.relatedTarget);

        var reason = button.data("reason");
        if (reason != "") $("#message").html(reason);
        else $("#message").html("No Message Yet.");
    });

    //Options
    hide();

    // hideAgencyFields();

    // $("#enrollment_center").change(function () {
    //     var selectedIndex = this.selectedIndex;
    //     if (selectedIndex == 2) {
    //         $("#agency_fields").show();
    //         $("#email").attr("required", true);
    //         $("#password").attr("required", true);
    //     } else {
    //        // hideAgencyFields();
    //     }
    // });

    $("#options").change(function () {
        var selectedIndex = this.selectedIndex;
        var labelText = "";
        var value = "";

        // Clear the existing input first
        $("#data_to_modify").remove();

        switch (selectedIndex) {
            case 0:
                hide();
                return; // Early exit if no input should be shown
            case 1:
                labelText = "New Date of Birth";
                // Create a date input
                newInput = $(
                    '<input type="date" id="data_to_modify" name="data_to_modify" class="form-control text-center" required/>'
                );
                break;
            case 2:
                labelText = "Name to correct (e.g LastName: Abubakar  )";
                newInput = $(
                    '<input type="text" id="data_to_modify" name="data_to_modify" class="form-control text-center" required/>'
                );
                break;
            case 3:
                labelText = "New Phone Number";
                newInput = $(
                    '<input type="text" id="data_to_modify" name="data_to_modify" class="form-control text-center" required/>'
                );
                break;
            case 4:
                labelText = "New Gender";
                // Create a select input for gender
                newInput = `
            <select id="data_to_modify" name="data_to_modify" class="form-control text-center" required>
                <option value="">-- Select Gender --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>`;
                break;
            case 5:
                labelText = "New Name (e.g LastName MiddleName FirstName)";
                newInput = $(
                    '<input type="text" id="data_to_modify" name="data_to_modify" class="form-control text-center" required/>'
                );
                break;
            case 6:
                labelText = "BVN Revalidation";
                value = "BVN No: " + $("#bvn_number").val();
                newInput = $(
                    '<input type="text" id="data_to_modify" name="data_to_modify" class="form-control text-center" required/>'
                );
                break;
            case 7:
                labelText = "BVN Whitelisting:";
                value = "BVN No: " + $("#bvn_number").val();
                newInput = $(
                    '<input type="text" id="data_to_modify" name="data_to_modify" class="form-control text-center" required/>'
                );
                break;
            case 8:
            case 9:
            case 10:
            case 11:
            case 12:
            case 13:
            case 14:
            case 15:
            case 16:
            case 17:
                labelText = "Enter New Details";
                newInput = $(
                    '<textarea id="data_to_modify" name="data_to_modify" class="form-control text-center" required></textarea>'
                );
                break;
             case 18:
                  labelText = "New Email Address :";
                newInput = $(
                    '<input type="email" id="data_to_modify" name="data_to_modify" class="form-control text-center" required/>'
                );
                break;
            default:
                labelText = "Input:";
                newInput = $(
                    '<input type="text" id="data_to_modify" name="data_to_modify" class="form-control text-center" required/>'
                );
                break;
        }

        // Append the new input to the desired container
        $("#input-container").append(newInput);

        // Set the value and label text
        $("#data_to_modify").val(value);
        $("#modify_lbl").text(labelText);
        show(); // Call your show function to display the input
    });
});

function hide() {
    $("#data_to_modify").hide();
    $("#modify_lbl").hide();
}

function hideAgencyFields() {
    $("#agency_fields").hide();
    $("#email").attr("required", false);
    $("#password").attr("required", false);
}
function show() {
    $("#data_to_modify").show();
    $("#modify_lbl").show();
}
