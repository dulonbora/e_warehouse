
$(document).ready(Search_Html());
$(document).ready(loadPaclingTables());
$(document).ready(Secrch());


$(document).ready(More());

function More() {
    $(document).on("click", "#Btn_More", function () {
        page_no = page_no+1;
        loadPaclingTables();
    });
}

function Secrch() {
    $(document).on("keyup", "#Search", function () {
        var id = $(this).val();
        loadTableSearch(id);
    });
}

//
    function Search_Html() {
    $('#search_html').load("search_html.php");
}


function loadTableSearch(str) {
    var url = "../brand_manager_ajax/load_brand_packing_list_search.php?s="+str;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].ID + "</a></td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].ITEM_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].GROUP_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].CATEGORY_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].ML_PER_CASE + "</td>"
                            + "<td>" + json.CONTENTS[i].BOTTLES_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP_PER_BOTTLE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].AVD_AMOUNT + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TFF_AMOUNT + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].IMPORT_FEE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].EXPORT_FEE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].VAT + "</td>"
                            + "</tr>";
                }
                $('#TableBodyPacking').html(output);
            }
        }
    });


}

function loadPaclingTables() {
    var url = "../brand_manager_ajax/load_brand_packing_list_all_value.php?i="+page_no;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td>" + json.CONTENTS[i].ID + "</td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].ITEM_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].GROUP_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].CATEGORY_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].ML_PER_CASE + "</td>"
                            + "<td>" + json.CONTENTS[i].BOTTLES_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP_PER_BOTTLE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].AVD_AMOUNT + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TFF_AMOUNT + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].IMPORT_FEE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].EXPORT_FEE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].VAT + "</td>"
                            + "</tr>";
                }
                   $('#TableBodyPacking').append(output);
            }
            else{
                $("#Fotter_Part").html("No More Record Available");
            }
        }
    });
}

    