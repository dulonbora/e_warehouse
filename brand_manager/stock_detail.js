
//Index
 $(document).ready(loadTableIndex());
 $(document).ready(More());

//


//Brand Master
$(document).ready(Search_Html());
$(document).ready(Secrch());




function loadTableIndex() {
    var url = "../brand_manager_ajax/load_brand_list.php?i="+page_no;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].NAME + "</a></td>";
                    var OPENING_STOCK_STR = parseInt(json.CONTENTS[i].OPENING_STOCK_STR) > 0 ? json.CONTENTS[i].OPENING_STOCK_STR : "0 BTL";
                    var INWARD_STOCK_STR = parseInt(json.CONTENTS[i].INWARD_STOCK_STR) > 0 ? json.CONTENTS[i].INWARD_STOCK_STR : "0 BTL";
                    var OUTWARD_STOCK_STR = parseInt(json.CONTENTS[i].OUTWARD_STOCK_STR) > 0 ? json.CONTENTS[i].OUTWARD_STOCK_STR : "0 BTL";
                    var PRODIUCED_STOCK_STR = parseInt(json.CONTENTS[i].PRODIUCED_STOCK_STR) > 0 ? json.CONTENTS[i].PRODIUCED_STOCK_STR : "0 BTL";
                    var LOST_STOCK_STR = parseInt(json.CONTENTS[i].LOST_STOCK_STR) > 0 ? json.CONTENTS[i].LOST_STOCK_STR : "0 BTL";
                    var CLOSEING_STOCK_STR = parseInt(json.CONTENTS[i].CLOSEING_STOCK_STR) > 0 ? json.CONTENTS[i].CLOSEING_STOCK_STR : "0 BTL";
                    
                    output += link
                            + "<td class='text-center'>" + json.CONTENTS[i].ML_PER_CASE + "</td>"
                            + "<td class='text-center'>" + json.CONTENTS[i].BOTTLES_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP + "</td>"
                            + "<td class='text-right'>" + OPENING_STOCK_STR + "</td>"
                            + "<td class='text-right'>" + INWARD_STOCK_STR + "</td>"
                            + "<td class='text-right'>" + OUTWARD_STOCK_STR + "</td>"
                            + "<td class='text-right'>" + PRODIUCED_STOCK_STR + "</td>"
                            + "<td class='text-right'>" + LOST_STOCK_STR + "</td>"
                            + "<td class='text-right'>" + CLOSEING_STOCK_STR + "</td>"
                            + "<td class='text-center'><a href='transection.php?i="+json.CONTENTS[i].ID+"' class='btn btn-success btn-xs text-danger text brandList' id='" + json.CONTENTS[i].ID + "'>View</a></td>"
                            + "</tr>";
                }
                   $('#TableBodyIndex').append(output);
            }
            else{
                $("#Fotter_Part").html("No More Record Available");
            }
        }
    });
}



function More() {
    $(document).on("click", "#Btn_More", function () {
        page_no = page_no+1;
        loadTableIndex();
    });
}







function Search_Html() {
    $('#search_html').load("search_html.php");
}


function CallHtmlPage(i) {
    $('#statusresult').load("brand_add_to_production.php?i=" + i);
    $('#myModalBig').modal("show");
}







