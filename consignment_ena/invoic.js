
$(document).ready(loadConsignMentTableFull());


function loadConsignMentTableFull() {
    var url = "../consignment_ajax_request_ena/load_brand_list_by_master_id.php?i="+consignment_no;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                var ok = 1;
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td>" + ok + "</td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].ITEM_NAME + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].BL + " BL</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TOTAL_MRP + "</td>"
                            + "</tr>";
                    ok++;
                }
                $('#TableBodyForFullItemList').html(output);
            }
        }
    });
}
