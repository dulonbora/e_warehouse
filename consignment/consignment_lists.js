
$(document).ready(Search_Html());
$(document).ready(loadTableIndex());
$(document).ready(More());

function More() {
    $(document).on("click", "#Btn_More", function () {
        page_no = page_no+1;
        loadTableIndex();
    });
}


//
function Search_Html() {
    $('#search_html').load("search_html.php");
}

function loadTableIndex() {
    var url = "../consignment_ajax_request/consignment_list_by_users_status.php?s="+status+"&i="+page_no;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].LONGDATE + "</a></td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].USER_FROM_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].ID + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].ITEM_TOTAL + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].AVD_AMOUNT + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].PASS_AMOUNT + "</td>"
                            + "<td>" + json.CONTENTS[i].STATUS_STR + "</td>"
                            + "<td class='text-center'><a href='consignment_details.php?i="+json.CONTENTS[i].ID+"' class='fa fa-bars text-danger text' id='" + json.CONTENTS[i].ID + "'></a></td>"
                            + "</tr>";
                   }
                   $('#TableBodyConsigmItemList').append(output);
            }
            else{
                $("#Fotter_Part").html("No More Record Available");
            }

        }
    });
}
