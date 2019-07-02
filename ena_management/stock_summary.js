//Variables


//Brand Master
$(document).ready(loadHtmlToModel());
$(document).ready(Search_Html());
$(document).ready(Secrch());
$(document).ready(addTooProduction());
$(document).ready(More());


//Index
 $(document).ready(loadTableIndex());

//
function Search_Html() {
    $('#search_html').load("search_html.php");
}

function loadHtmlToModel() {
    $(document).on("click", ".addToMyList", function () {
        var id = $(this).attr("id");
        CallHtmlPage(id);
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
                if (parseInt(json.SUCCESS) === 1) {$("#MassageLabel1").html("Successfully saved!");
                loadTableIndex();
                $('#myModalBig').modal("hide");
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



function More() {
    $(document).on("click", "#Btn_More", function () {
        page_no = page_no + 1;
        loadTableIndex();
    });
}

function loadTableIndex() {
    var url = "../ena_management_ajax_request/load_brand_list.php?i="+page_no;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].ITEM_ID + "</a></td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].OPENING_STOCK + "</td>"
                            + "<td>" + json.CONTENTS[i].INWARD_STOCK + "</td>"
                            + "<td>" + json.CONTENTS[i].OUTWARD_STOCK + "</td>"
                            + "<td>" + json.CONTENTS[i].PRODIUCTING_STOCK + "</td>"
                            + "<td>" + json.CONTENTS[i].PRODIUCED_STOCK + "</td>"
                            + "<td>" + json.CONTENTS[i].LOST_STOCK + "</td>"
                            + "<td>" + json.CONTENTS[i].CLOSEING_STOCK + "</td>"
                            + "<td class='text-center'><a href='Ena_Transection.php?i="+json.CONTENTS[i].ID+"' class='fa fa-bars text-danger text brandList' id='" + json.CONTENTS[i].ID + "'></a></td>"
                            + "</tr>";
                }
                   $('#TableBodyIndex').append(output);
            }
            else {
                $("#Fotter_Part").html("No More Record Available");
            }
        }
    });
}













