 $(document).ready(Ena_List_By_Status(1));
 $(document).ready(Ena_List_By_Inward_Pending(1));
 $(document).ready(Ena_List_By_Lost_Pending(1));

// Pending Opening Stock
function Ena_List_By_Status(id) {
    var url = "../home_request/ena_list_by_status_io.php?i="+id+"&io=OS";
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                var ok = 1;
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var d = new Date(parseInt(json.CONTENTS[i].LONGDATE)*1000);
                    output += "<tr>"
                            + "<td>" + d.toLocaleDateString() + "</td>"
                            + "<td>" + json.CONTENTS[i].USER_FROM_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].TRANK_NO + "</td>"
                            + "<td>" + json.CONTENTS[i].ITEM_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].BL + " BL </td>"
                            + "<td class='text-center'><a href='view_ena_details_full.php?i="+json.CONTENTS[i].ID+"' class='btn btn-danger btn-xs btn-rounded text-danger text brandList' id='" + json.CONTENTS[i].ID + "'>View</a></td>"
                            + "</tr>";
                    ok++;
                }
                $('#OpeningStockTable').html(output);
            }
        }
    });
}


//Inward Pending List
function Ena_List_By_Inward_Pending(id) {
    var url = "../home_request/ena_list_by_status_io.php?i="+id+"&io=I";
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                var ok = 1;
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var d = new Date(parseInt(json.CONTENTS[i].LONGDATE)*1000);
                    output += "<tr>"
                            + "<td>" + d.toLocaleDateString() + "</td>"
                            + "<td>" + json.CONTENTS[i].USER_FROM_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].USER_TO_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].TRANK_NO + "</td>"
                            + "<td>" + json.CONTENTS[i].TRANK_NO + "</td>"
                            + "<td>" + json.CONTENTS[i].TRANK_NO + "</td>"
                            + "<td>" + json.CONTENTS[i].ITEM_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].BL + " BL </td>"
                            + "<td class='text-center'><a href='view_ena_details_full.php?i="+json.CONTENTS[i].ID+"' class='btn btn-danger btn-xs btn-rounded text-danger text brandList' id='" + json.CONTENTS[i].ID + "'>View</a></td>"
                            + "</tr>";
                    ok++;
                }
                $('#InwardStockTable').html(output);
            }
        }
    });
}

//Inward Pending List
function Ena_List_By_Lost_Pending(id) {
    var url = "../home_request/ena_list_by_status_io.php?i="+id+"&io=L";
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                var ok = 1;
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var d = new Date(parseInt(json.CONTENTS[i].LONGDATE)*1000);
                    output += "<tr>"
                            + "<td>" + d.toLocaleDateString() + "</td>"
                            + "<td>" + json.CONTENTS[i].USER_FROM_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].TRANK_NO + "</td>"
                            + "<td>" + json.CONTENTS[i].ITEM_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].BL + " BL </td>"
                            + "<td class='text-center'><a href='view_ena_details_full.php?i="+json.CONTENTS[i].ID+"' class='btn btn-danger btn-xs btn-rounded text-danger text brandList' id='" + json.CONTENTS[i].ID + "'>View</a></td>"
                            + "</tr>";
                    ok++;
                }
                $('#LostStockTable').html(output);
            }
        }
    });
}