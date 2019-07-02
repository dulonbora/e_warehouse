
$(document).ready(loadConsignMentTableFull());


function loadConsignMentTableFull() {
    var url = "../consignment_ajax_request/load_brand_list_by_master_id.php?i="+consignment_no;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].ITEM_NAME + "</a></td>";
                    output += link
                            + "<td class='text-center'>" + json.CONTENTS[i].PACKING_SIZE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].QNTY + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TOTAL_BL + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TOTAL_LPL + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TOTAL_MRP + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TOTAL_ADV + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TOTAL_FEE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TOTAL_VAT + "</td>"
                            + "</tr>";
                }
                $('#TableBodyForFullItemList').html(output);
            }
        }
    });
}
