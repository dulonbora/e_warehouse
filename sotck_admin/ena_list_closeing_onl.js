
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
    var url = "../ena_ajax_request/load_brand_list_closeing_only.php";
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
                            + "<td class='text-right'>" + json.CONTENTS[i].STRANGTH + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].CLOSEING + "</td>"
                            + "<td class='text-center'>"
                            + "<div class='btn-group'>"
                            + "<button class='btn btn-default btn-xs dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button>"
                            + "<ul class='dropdown-menu'>"
                            + "<li><a href='#'>Inward</a></li>"
                            + "</ul> </div></td></tr>";
                }
                $('#TableBody').html(output);
            }
        }
    });
}













