 $(document).ready(loadTableIndex("WHS"));


function loadTableIndex(status) {
    var url = "../company_request/all_company_list_by_type.php?type="+status;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].COMPANY_NAME + "</a></td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].DISTRICT + "</td>"
                            + "<td>" + json.CONTENTS[i].ADDRESS + "</td>"
                            + "<td class='text-center'><a href='create_consignment.php?i="+json.CONTENTS[i].ID+"' class='fa fa-bars text-danger text brandList' id='" + json.CONTENTS[i].ID + "'></a></td>"
                            + "</tr>";
                }
                $('#TableConsignor').html(output);
            }
        }
    });
}
