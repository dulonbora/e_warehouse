
$(document).ready(loadHtmlToModel());
$(document).ready(selectActionType());
$(document).ready(addNewMassage());
$(document).ready(Load_Action_List());


function loadHtmlToModel() {
    $(document).on("click", ".TakeAction", function () {
        var id = $(this).attr("id");
        CallHtmlPage(id);
    });
}

function CallHtmlPage(id) {
    $('#statusresult').load("take_action_html_imfl.php?i=" + id);
    $('#myModalBig').modal("show");
}

function selectActionType() {

    $(document).on("change", "#ACTION", function () {
        var actionType = parseInt($("#ACTION").val());
        if (actionType === 1) {
            $("#NOTE").prop('disabled', false);
            $("#NOTE").focus();
        }
        if (actionType === 2) {
            $("#DESIGNATION").prop('disabled', false);
            $("#OFFICERS_NAME").prop('disabled', true);
        }

        if (actionType === 3) {
            $("#OFFICERS_NAME").prop('disabled', false);
            $("#DESIGNATION").prop('disabled', true);
        }
        if (actionType === 4) {
            $("#NOTE").prop('disabled', true);
            $("#OFFICERS_NAME").prop('disabled', true);
            $("#NOTE").prop('disabled', true);
        }


        //$("input").prop('disabled', true);
        //$("input").prop('disabled', false);
    });
}


function addNewMassage() {
    $(document).on("click", "#AddMassage", function (e) {
        e.preventDefault();
        var url = "../massage_request/add_new_imfl.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#fCompany").serialize(), // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 1) {
                    $("#MassageLabel1").html("Successfully saved!");
                    Load_Action_List(m_ids);
                    $('#myModalBig').modal("hide");
                    
                }
                if (parseInt(json.SUCCESS) === 0) {
                    $("#MassageLabel1").html("Date failed to save!");
                }
            }
        });
    });
}



function Load_Action_List() {
    var url = "../massage_request/massage_list_by_mid.php?m_ids="+m_ids+"&m_type=IMFL";
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var d = new Date(parseInt(json.CONTENTS[i].CREATE_ON)*1000);
                    output += "<tr>"
                            + "<td>" + d.toLocaleDateString() + "</td>"
                            + "<td>" + json.CONTENTS[i].CREATE_BY + "</td>"
                            + "<td>" + json.CONTENTS[i].NOTE + "</td>"
                            + "<td>" + json.CONTENTS[i].ACTION + "</td>"
                            + "</tr>";
                }
                $('#OpeningStockTable').html(output);
            }
        }
    });
}


