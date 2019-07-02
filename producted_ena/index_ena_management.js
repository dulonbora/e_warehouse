//Variables


//Brand Master
$(document).ready(loadHtmlToModel());
$(document).ready(Search_Html());
$(document).ready(Secrch());
$(document).ready(addTooProduction());


//Index
 $(document).ready(loadTableIndex());
 $(document).ready(io_type());
 

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
                //alert(data);
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 1) {
                $("#MassageLabel1").html("Successfully saved!");
                loadTableIndex();
                $('#myModalBig').modal("hide");
                }
                if (parseInt(json.SUCCESS) === 0) {$("#MassageLabel1").html("Date failed to save!");}
            }
        });
    });
}

function io_type() {
    $(document).on("change", "#IO_TYPE", function (e) {
        var io = $(this).val();
        if(io==="I" || io==="O"){
            $("#Extra_Area").load("extra_area.php");
            $("#Extra_Area").show();
        }
        else{
            $("#Extra_Area").hide();
        }
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
    var url = "../ena_management_ajax_request/load_brand_list.php?i="+userId;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><a href='Ena_Transection.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].ITEM_ID + "</a></td>";
                    output += link
                            + "<td class='text-right'>" + json.CONTENTS[i].CLOSEING_STOCK + "</td>"
                            + "<td class='text-center' style = 'width: 100px;'><buttom class='btn btn-success btn-xs text-danger text addToMyList' id='" + json.CONTENTS[i].ID + "'>Add to Produced Stock</buttom></td>"
                            + "<td class='text-center' style = 'width: 150px;'><a href='../ena_management/Ena_Transection.php?i="+json.CONTENTS[i].ID+"' class='btn btn-success btn-xs text-danger text brandList' id='" + json.CONTENTS[i].ID + "'>View Details</a></td>"
                            + "</tr>";
                }
                $('#TableBodyIndex').html(output);
            }
        }
    });
}













