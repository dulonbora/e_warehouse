//Variables


//Brand Master
$(document).ready(loadHtmlToModel());
$(document).ready(Search_Html());
$(document).ready(Secrch());
$(document).ready(UpdateStatus());
$(document).ready(UpdateStatusAction());
 $(document).ready(loadTableIndex());

//Index
 
 $(document).ready(AddTxn());
 $(document).ready(addToTransfar());
 
  
  $(document).ready(More());

function More() {
    $(document).on("click", "#Btn_More", function () {
        page_no = page_no+1;
        loadTableIndex();
    });
}

//
function Search_Html() {
    $('#search_html').load("search_html_date_imfl.php?i="+user_item_id);
}

function loadHtmlToModel() {
    $(document).on("click", ".ViewTxnDetails", function () {
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

function UpdateStatus() {
    $(document).on("click", ".UpdateStatus", function () {
        var id = $(this).attr("id");
        CallStatusHtmlPage(id);
    });
}

function AddTxn() {
    $(document).on("click", ".addNewTranction", function () {
        var id = $(this).attr("id");
        CallTxnTransfar(id);
    });
}

function UpdateStatusAction() {
    $(document).on("click", "#UpdateStatusBtn", function () {
       var url = "../mix_ajax_request/update_status.php";
       var id = $("#ID").val();
       var status = $("#STATUS").val();
    $.ajax({
        type: "POST",
        url: url,
        data: {i : id, s : status},
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                loadTableIndex();
            }
        }
    });
    });
}

function CallHtmlPage(i) {
    $('#statusresult').load("view_transection_details.php?i=" + i);
    $('#myModalBig').modal("show");
}

function CallStatusHtmlPage(i) {
    $('#statusresult').load("update_status.php?i=" + i);
    $('#myModalBig').modal("show");
}

function CallTxnTransfar(i) {
    $('#statusresult').load("add_to_transction.php?i=" + i);
    $('#myModalBig').modal("show");
}


function loadTableIndex() {
    var url = "../brand_manager_ajax/list_by_item_tranction.php?i="+user_item_id+"&p="+page_no;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var a  = parseInt(json.CONTENTS[i].MASTER_ID)===0 ? "N/A" : "Consignment No: "+json.CONTENTS[i].MASTER_ID;
                    
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].LONGDATE + "</a></td>";
                    output += link
                            + "<td>" + a + "</td>"
                            + "<td>" + json.CONTENTS[i].STATUS + "</td>"
                            + "<td>" + json.CONTENTS[i].BATCH_NO + "</td>"
                            + "<td>" + json.CONTENTS[i].IO_TYPE + "</td>"
                            + "<td><span class='pull-rignt'>" + json.CONTENTS[i].QNTY + "</span></td>"
                            + "<td class='text-center'><buttom class='fa fa-bars text-danger text ViewTxnDetails' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
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

function addToTransfar() {
    $(document).on("click", "#addTooProduction", function (e) {
        e.preventDefault();
        var url = "../brand_manager_ajax/add_to_brand_transfar.php";
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













