//Variables


//Brand Master
$(document).ready(loadHtmlToModel());
$(document).ready(Search_Html());
$(document).ready(Secrch());
$(document).ready(Add());

$(document).ready(selectLabel());
$(document).ready(selectBottle());
$(document).ready(selectCup());
$(document).ready(selectMono());


//Index
 $(document).ready(loadTableIndex());
 
 $(document).ready(AddTxn());
 $(document).ready(addToTransfar());

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

function Add() {
    $(document).on("click", "#addnew", function () {
        CallHtmlPage();
    });
}

// TYpe
function selectLabel() {
    $(document).on("click", "#LABEL", function () {var id = $(this).attr("id");
        loadTableIndexByTYpe(id);
        $('#HeaderDetails').html("Label Manager");
    });
}
function selectBottle() {
    $(document).on("click", "#BOTTLE", function () {var id = $(this).attr("id");
        loadTableIndexByTYpe(id);
        $('#HeaderDetails').html("Bottle Manager");
    });
}
function selectCup() {
    $(document).on("click", "#CUP", function () {var id = $(this).attr("id");
        loadTableIndexByTYpe(id);
        $('#HeaderDetails').html("CUP Manager");
    });
}
function selectMono() {
    $(document).on("click", "#MONO_CARTOON", function () {var id = $(this).attr("id");
        loadTableIndexByTYpe(id);
        $('#HeaderDetails').html("Mono Cartoon Manager");
    });
}

function CallHtmlPage(i) {
    $('#statusresult').load("brand_add_ajax.php?i=" + i);
    $('#myModalBig').modal("show");
}

function CallHtmlPage() {
    $('#statusresult').load("brand_add_ajax.php");
    $('#myModalBig').modal("show");
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


function addToTransfar() {
    $(document).on("click", "#addTooProduction", function (e) {
        e.preventDefault();
        var url = "../mix_ajax_request/add_mix_item_tranfar.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#BrandListForm").serialize(), // serializes the form's elements.
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
    var url = "../mix_ajax_request/list_by_users.php";
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
                            + "<td>" + json.CONTENTS[i].ML_PER_CASE + "</td>"
                            + "<td>" + json.CONTENTS[i].UNIT + "</td>"
                            + "<td>" + json.CONTENTS[i].SUB_UNIT + "</td>"
                            + "<td>" +""+""+ json.CONTENTS[i].SUB_UNIT_VALUE + "</td>"
                            + "<td>" + json.CONTENTS[i].ITEM_TYPE + "</td>"
                            + "<td>" + json.CONTENTS[i].CLOSEING_STOCK_STR + "</td>"
                            + "<td class='text-center'><buttom class='fa fa-bars text-danger text addNewTranction' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td class='text-center'><a href='transection.php?i="+json.CONTENTS[i].ID+"' class='fa fa-bars text-danger text brandList' id='" + json.CONTENTS[i].ID + "'></a></td>"
                            + "</tr>";
                }
                $('#TableBodyIndex').html(output);
            }
        }
    });
}


function loadTableIndexByTYpe(type) {
    var url = "../mix_ajax_request/list_by_users_by_type.php?t="+type;
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
                            + "<td>" + json.CONTENTS[i].ML_PER_CASE + "</td>"
                            + "<td>" + json.CONTENTS[i].UNIT + "</td>"
                            + "<td>" + json.CONTENTS[i].SUB_UNIT + "</td>"
                            + "<td>" +""+""+ json.CONTENTS[i].SUB_UNIT_VALUE + "</td>"
                            + "<td>" + json.CONTENTS[i].ITEM_TYPE + "</td>"
                            + "<td>" + json.CONTENTS[i].CLOSEING_STOCK_STR + "</td>"
                            + "<td class='text-center'><a href='transection.php?i="+json.CONTENTS[i].ID+"' class='fa fa-bars text-danger text brandList' id='" + json.CONTENTS[i].ID + "'></a></td>"
                            + "<td class='text-center'><a href='transection.php?i="+json.CONTENTS[i].ID+"' class='fa fa-bars text-danger text brandList' id='" + json.CONTENTS[i].ID + "'></a></td>"
                            + "</tr>";
                }
                $('#TableBodyIndex').html(output);
            }
        }
    });
}















