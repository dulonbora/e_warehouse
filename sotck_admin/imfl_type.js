
//Brand Master
$(document).ready(loadHtmlToModel());
 $(document).ready(Search_Html());
 $(document).ready(loadTable());
 $(document).ready(Edit());
 
 $(document).ready(More());

function More() {
    $(document).on("click", "#Btn_More", function () {
        page_no = page_no+1;
        loadTable();
    });
}


 
 //Add
 $(document).ready(addBrans());

//
function Search_Html() {
    $('#search_html').load("search_html.php");
}

function loadHtmlToModel() {
    $(document).on("click", "#addnew", function () {
        CallHtmlPage(0);
    });
}
function Edit() {
    $(document).on("click", ".btnedit", function () {
        var id = $(this).attr("id");
        CallHtmlPage(id);
    });
}

function CallHtmlPage(i) {
    $('#statusresult').load("brand_add_ajax.php?i=" + i);
    $('#myModalBig').modal("show");
}

//Request

function addBrans() {
    $(document).on("click", "#adduser", function (e) {
        e.preventDefault();
        var url = "../ena_ajax_request/brand_add.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#EnaBrand").serialize(), // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 1) {
                    $("#ENaMassageLabel").html("Successfully saved!");
                    $('#myModalBig').modal("hide");
                    loadTable();
                }
                else {
                    $("#ENaMassageLabel").html("Date failed to save!");
                }
            }
        });
    });
}

function loadTable() {
    var url = "../brand_manager_ajax/load_brand_list_by_stock_type.php?t="+type+"&i="+page_no;
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
                            + "<td class='text-right'>" + json.CONTENTS[i].BTL + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].ML + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].OPENING + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].INWARD + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].OUTWARD + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].LOSE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].PRODUCTION + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].PRIDUCED + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].CLOSEING + "</td>"
                            + "<td class='text-center'><a href='stock_by_company_list_by_item_imfl.php?i="+json.CONTENTS[i].ID+"' class='btn btn-danger btn-xs btn-rounded text-danger text brandList' id='" + json.CONTENTS[i].ID + "'>View</a></td></tr>"
                    
                }
                $('#TableBody').append(output);
            }
            else{
                $("#Fotter_Part").html("No More Record Available");
            }
        }
    });


}













