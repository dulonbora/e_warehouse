
//Index
$(document).ready(loadTableIndex());
$(document).ready(AddTxn());
$(document).ready(More());
//


//Brand Master
$(document).ready(Search_Html());
$(document).ready(Secrch());
$(document).ready(addTooProduction());



function More() {
    $(document).on("click", "#Btn_More", function () {
        page_no = page_no+1;
        loadTableIndex();
    });
}


    function AddTxn() {
        $(document).on("click", ".addNewTranction", function () {
            var id = $(this).attr("id");
            CallTxnTransfar(id);
        });
    }


    function CallTxnTransfar(i) {
        $('#statusresult').load("add_to_transction.php?i=" + i);
        $('#myModalBig').modal("show");
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
                            + "<td class='text-center'>" + json.CONTENTS[i].ML_PER_CASE + "</td>"
                            + "<td class='text-center'>" + json.CONTENTS[i].BOTTLES_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].CLOSEING_STOCK_STR + "</td>"
                            + "<td class='text-center'>" + json.CONTENTS[i].USER_ITEM_STATUS + "</td>"
                            + "<td class='text-center'><a href='transection.php?i=" + json.CONTENTS[i].ID + "' class='btn btn-success btn-xs text-danger text brandList' id='" + json.CONTENTS[i].ID + "'>View Details</a></td>"
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



function addTooProduction() {
    $(document).on("click", "#addTooProduction", function (e) {
        e.preventDefault();
        var url = "../ena_management_ajax_request/ena_transfar_add.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#ENA_TO_PRRODUCTION").serialize(), // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 1) {
                    $("#MassageLabel1").html("Successfully saved!");
                    $('#myModalBig').modal("hide");
                    loadTableIndex();
                }
                if (parseInt(json.SUCCESS) === 0) {
                    $("#MassageLabel1").html("Date failed to save!");
                }
            }
        });
    });

}








