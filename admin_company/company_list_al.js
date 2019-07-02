 $(document).ready(All_Officers_List());

// Pending Opening Stock
function All_Officers_List() {
    var url = "../admin_company_request/company_list_all_by_status.php?i="+status;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                var ok = 1;
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    output += "<tr>"
                            + "<td>" + json.CONTENTS[i].EXCISE_USER_ID + "</td>"
                            + "<td>" + json.CONTENTS[i].COMPANY_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].COMPANY_TYPE + "</td>"
                            + "<td>" + json.CONTENTS[i].EMAIL + "</td>"
                            + "<td>" + json.CONTENTS[i].PHONE_NO + "</td>"
                            + "<td>" + json.CONTENTS[i].ADDRESS + "</td>"
                            + "<td>" + json.CONTENTS[i].DISTRICT + "</td>"
                            + "<td class='text-center'><a href='company.php?i="+json.CONTENTS[i].ID+"' class='btn btn-danger btn-xs btn-rounded text-danger text brandList' id='" + json.CONTENTS[i].ID + "'>View</a></td>"
                            + "</tr>";
                    ok++;
                }
                $('#OpeningStockTable').html(output);
            }
        }
    });
}

