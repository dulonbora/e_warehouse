
//Brand Master
$(document).ready(loadHtmlToModel());
 $(document).ready(Search_Html());
 $(document).ready(loadTable());
 $(document).ready(loadTableUser());
 $(document).ready(Edit());
 $(document).ready(Secrch());
 $(document).ready(addOpeningStock());


//Index
 $(document).ready(loadTableIndex());


 
 //Add
 $(document).ready(addBrans());

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
    $('#statusresult').load("brand_add_ajax.php?i=" + i);
    $('#myModalBig').modal("show");
}



function addOpeningStock() {
    $(document).on("click", "#addOpeningSTock", function (e) {
        e.preventDefault();
        var url = "../ena_management_ajax_request/brand_add.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#EnaBrand").serialize(), // serializes the form's elements.
            success: function (data)
            {
                //alert(data);
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 2) {$("#MassageLabel1").html("Already Exits");}
                if (parseInt(json.SUCCESS) === 1) {$("#MassageLabel1").html("Successfully saved!");
                $("#OPENING_STOCK").val("");
                loadTableUser();
                $('#myModalBig').modal("hide");
                }
                if (parseInt(json.SUCCESS) === 0) {$("#MassageLabel1").html("Date failed to save!");}
            }
        });
    });
}


function loadTable() {
    var url = "../ena_ajax_request/load_brand_list.php";
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
                            + "<td class='text-right'>" + json.CONTENTS[i].FEE_REQUIRE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].T_FEE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].I_FEE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].E_FEE + "</td>"
                            + "<td class='text-center'><buttom class='fa icon-arrow-right text-danger text addToMyList' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "</tr>";
                }
                $('#TableBody').html(output);
            }
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
                            + "<td class='text-right'>" + json.CONTENTS[i].FEE_REQUIRE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].T_FEE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].I_FEE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].E_FEE + "</td>"
                            + "<td class='text-center'><buttom class='fa icon-arrow-right text-danger text addToMyList' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "</tr>";
                }
                $('#TableBody').html(output);
            }
        }
    });


}



function loadTableUser() {
    var url = "../ena_management_ajax_request/load_brand_list.php";
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
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].TAX_PERCENTAGE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].OPENING_STOCK + "</td>"
                            + "</tr>";
                }
                $('#TableBodyUser').html(output);
            }
        }
    });
}

function loadTableIndex() {
    var url = "../ena_management_ajax_request/load_brand_list.php";
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
                            + "<td>" + json.CONTENTS[i].CLOSEING_STOCK + "</td>"
                            + "</tr>";
                }
                $('#TableBodyIndex').html(output);
            }
        }
    });
}

















