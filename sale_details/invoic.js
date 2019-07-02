
$(document).ready(loadConsignMentTableFull());


function loadConsignMentTableFull() {
    var url = "../sale_details_ajax/load_brand_list_by_master_id.php?i="+consignment_no;
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
                            + "<td>" + json.CONTENTS[i].PACKING_SIZE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].QNTY + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TOTAL_COST + "</td>"
                            + "</tr>";
                    ok++;
                }
                $('#TableBodyForFullItemList').html(output);
            }
        }
    });
}
