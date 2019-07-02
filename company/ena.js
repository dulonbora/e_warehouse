
//Brand Master
$(document).ready(loadHtmlToModel());
 $(document).ready(Search_Html());
 $(document).ready(loadTable());
 $(document).ready(Edit());


 
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
                            + "<td>" + json.CONTENTS[i].GROUP_ID + "</td>"
                            + "<td>" + json.CONTENTS[i].CATEGORY_ID + "</td>"
                            + "<td>" + json.CONTENTS[i].TYPE_ID + "</td>"
                            + "<td>" + json.CONTENTS[i].FEE_REQUIRE + "</td>"
                            + "<td>" + json.CONTENTS[i].T_FEE + "</td>"
                            + "<td>" + json.CONTENTS[i].I_FEE + "</td>"
                            + "<td>" + json.CONTENTS[i].E_FEE + "</td>"
                            + "<td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td class='text-center'><buttom class='fa fa-times-circle-o text-danger text btndel' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td>" + json.CONTENTS[i].STATUS + "</td></tr>";
                }
                $('#TableBody').html(output);
            }
        }
    });


}













