
$(document).ready(Search_Html());
$(document).ready(LoadTable());





function Search_Html() {
    $('#search_html').load("search_html_date.php");
}

function LoadTable() {
    var url = "../account_request/load_all.php";
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
                            + "<td>" + json.CONTENTS[i].VOUCHER_NO + "</td>"
                            + "<td>" + json.CONTENTS[i].VOUCHER_TYPE + "</td>"
                            + "<td>" + json.CONTENTS[i].NOTE + "</td>"
                            + "<td>" + json.CONTENTS[i].STATUS + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].BALANCE + "</td>"
                            + "<td class='text-center'><a href='payment_details.php?i="+json.CONTENTS[i].AC_VOUCHER_ID+"' class='fa fa-bars text-danger text' id='" + json.CONTENTS[i].AC_VOUCHER_ID + "'></a></td>"
                            + "</tr>";
                }
                $('#TableBodyConsigmItemList').html(output);
            }
        }
    });
}
