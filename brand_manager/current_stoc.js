
//Index
 $(document).ready(loadTableIndex());
 $(document).ready(More());

//


//Brand Master
$(document).ready(Search_Html());
$(document).ready(Secrch());


function More() {
    $(document).on("click", "#Btn_More", function () {
        page_no = page_no+1;
        loadTableIndex();
    });
}


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
                    output += link
                            + "<td>" + json.CONTENTS[i].ML_PER_CASE + "." + json.CONTENTS[i].BOTTLES_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].CLOSEING_STOCK_STR + "</td>"
                            + "<td class='text-center'><a href='transection.php?i="+json.CONTENTS[i].ID+"' class='fa fa-bars text-danger text brandList' id='" + json.CONTENTS[i].ID + "'></a></td>"
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







function Search_Html() {
    $('#search_html').load("search_html.php");
}


function CallHtmlPage(i) {
    $('#statusresult').load("brand_add_to_production.php?i=" + i);
    $('#myModalBig').modal("show");
}







