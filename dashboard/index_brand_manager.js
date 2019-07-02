//Variables


//Brand Master
$(document).ready(loadHtmlToModel());
$(document).ready(Search_Html());
$(document).ready(Secrch());
$(document).ready(addTooProduction());
$(document).ready(UpdateCompanyDetails());


//Index
 $(document).ready(loadTableIndex());
 $(document).ready(loadConsignmentTables());

//
function Search_Html() {
    $('#search_html').load("search_html.php");
}

function loadHtmlToModel() {
    $(document).on("click", "#CompanySetUp", function () {
        CallHtmlPage();
    });
}

function Secrch() {
            $(document).on("keyup", "#Search", function () {
                var id = $(this).val();
                loadTableSearch(id);
            });
        }


function Edit() {
    $(document).on("click", ".btnedit", function () {
        var id = $(this).attr("id");
        CallHtmlPage(id);
    });
}

function CallHtmlPage() {
    $('#statusresult').load("company_details.php");
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
                if (parseInt(json.SUCCESS) === 1) {$("#MassageLabel1").html("Successfully saved!");
                $('#myModalBig').modal("hide");
                loadTableIndex();
                }
                if (parseInt(json.SUCCESS) === 0) {$("#MassageLabel1").html("Date failed to save!");}
            }
        });
    });
}




function loadTableSearch(str) {
    var url = "../ena_ajax_request/seach_ajax.php?p=".str;
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
                            + "<td>" + json.CONTENTS[i].FEE_REQUIRE + "</td>"
                            + "<td>" + json.CONTENTS[i].T_FEE + "</td>"
                            + "<td>" + json.CONTENTS[i].I_FEE + "</td>"
                            + "<td>" + json.CONTENTS[i].E_FEE + "</td>"
                            + "<td class='text-center'><buttom class='fa icon-arrow-right text-danger text addToMyList' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "</tr>";
                }
                $('#TableBody').html(output);
            }
        }
    });


}




function loadTableIndex() {
//    var url = "../brand_manager_ajax/load_brand_list.php?i="+userId;
    var url = "../brand_manager_ajax/load_brand_list.php?i=1";
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
                            + "<td>" + json.CONTENTS[i].CURRENT_STOCK_STR + "</td>"
                            + "<td>" + json.CONTENTS[i].OPENING_STOCK_STR + "</td>"
                            + "<td class='text-center'><buttom class='fa icon-arrow-right text-danger text addToMyList' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td class='text-center'><a href='Ena_Transection.php?i="+json.CONTENTS[i].ID+"' class='fa fa-bars text-danger text brandList' id='" + json.CONTENTS[i].ID + "'></a></td>"
                            + "</tr>";
                }
                $('#TableBodyIndex').html(output);
            }
        }
    });
}


function loadConsignmentTables() {
    var url = "../consignment_ajax_request/consignment_list_from_users.php";
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].LONGDATE + "</a></td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].CONSIGNMENT_NO + "</td>"
                            + "<td>" + json.CONTENTS[i].FYEAR + "</td>"
                            + "<td>" + json.CONTENTS[i].ITEM_TOTAL + "</td>"
                            + "<td>" + json.CONTENTS[i].AVD_AMOUNT + "</td>"
                            + "<td>" + json.CONTENTS[i].PASS_AMOUNT + "</td>"
                            + "<td>" + json.CONTENTS[i].VAT_AMOUNT + "</td>"
                            + "<td>" + json.CONTENTS[i].COST_PRICE + "</td>"
                            + "<td>" + json.CONTENTS[i].TOTAL_TCS + "</td>"
                            + "<td>" + json.CONTENTS[i].STATUS + "</td>"
                            + "<td class='text-center'><a href='../consignment/consignment_list_full.php?i="+json.CONTENTS[i].ID+"' class='fa fa-bars text-danger text brandList' id='" + json.CONTENTS[i].ID + "'></a></td>"
                            + "</tr>";
                }
                $('#TableBodyConsigmMentList').html(output);
            }
        }
    });
}



        function UpdateCompanyDetails() {
            $(document).on("click", "#BtnUpdateCompnay", function (e) {
                e.preventDefault();
                var url = "../setup_ajax_request/update_compnay.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#fCompany").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                    var json = $.parseJSON(data);
                    if(parseInt(json.SUCCESS)===1){$("#MassageLabel").html("Successfully saved!");
                    clearField();
                    loadTable();
                    }
                        else{$("#MassageLabel").html("Date failed to save!");}
                    }
                });
            });
        }













