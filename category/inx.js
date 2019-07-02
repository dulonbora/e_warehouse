
$(document).ready(loadHtmlToModel());
$(document).ready(addCategoryRequest());
$(document).ready(loadTable());
$(document).ready(Edit());
$(document).ready(Categorys());
$(document).ready(Type());
$(document).ready(group());
$(document).ready(Secrch());


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

function group() {
    $(document).on("click", "#View_All_Group", function () {
        loadTableByType("GROUP");
    });
}

function Categorys() {
    $(document).on("click", "#View_All_Category", function () {
        loadTableByType("CATEGORY");
    });
}

function Type() {
    $(document).on("click", "#View_All_Type", function () {
        loadTableByType("TYPE");
    });
}

function Secrch() {
    $(document).on("keyup", "#Search", function () {
        var id = $(this).val();
        loadTableSearch(id);
    });
}

function CallHtmlPage(i) {
    $('#statusresult').load("category_add_ajax.php?i=" + i);
    $('#myModal').modal("show");
}

function clearField() {
    $("#NAME").val("");
}

function addCategoryRequest() {
    $(document).on("click", "#adduser", function (e) {
        e.preventDefault();
        var url = "../category_ajax_request/category_add_post.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#fCategory").serialize(), // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                
                if (parseInt(json.SUCCESS) === 1) {
                    $("#MassageLabel").html("Successfully saved!");
                    clearField();
                    loadTable();
                    $('#myModal').modal("hide");
                }
                else {
                    $("#MassageLabel").html("Date failed to save!");
                }
            }
        });
    });
}

function loadTable() {
    var parentId = parseInt('<?php echo $_parent_id;?>');
    var url = parentId > 0 ? "../category_ajax_request/load_category_list.php?p=" + parentId : "../category_ajax_request/load_category_list.php?p=" + parentId;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = parentId > 0 ? "<tr><td><a href='../brand/index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].NAME + "</a></td>" : "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].NAME + "</a></td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].TYPE + "</td>"
                            + "<td>" + json.CONTENTS[i].TYPE + "</td>"
                            + "<td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td class='text-center'><buttom class='fa fa-times-circle-o text-danger text btndel' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td>" + json.CONTENTS[i].IS_ACTIVE + "</td></tr>";
                }
                $('#TableBody').html(output);
            }
        }
    });


}

function loadTableByType(i) {
    var url = "../category_ajax_request/load_category_list_By_Type.php?p=" + i;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var type = "";
                    if (json.CONTENTS[i].TYPE === "GROUP") {
                        type = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].NAME + "</a></td>"
                    }
                    else if (json.CONTENTS[i].TYPE === "GROUP") {
                        type = "<tr><td><a href='../brand/index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].NAME + "</a></td>";
                    }
                    else {
                        type = "<tr><td><a href='../brand/index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].NAME + "</a></td>";
                    }

                    output += type
                            + "<td>" + json.CONTENTS[i].TYPE + "</td>"
                            + "<td>" + json.CONTENTS[i].TYPE + "</td>"
                            + "<td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td class='text-center'><buttom class='fa fa-times-circle-o text-danger text btndel' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td>" + json.CONTENTS[i].IS_ACTIVE + "</td></tr>";
                }
                $('#TableBody').html(output);
            }
        }
    });
}

function loadTableSearch(i) {
    var url = "../category_ajax_request/load_category_list_Seach.php?p=" + i;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var type = "";
                    if (json.CONTENTS[i].TYPE === "GROUP") {
                        type = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].NAME + "</a></td>"
                    }
                    else if (json.CONTENTS[i].TYPE === "GROUP") {
                        type = "<tr><td><a href='../brand/index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].NAME + "</a></td>";
                    }
                    else {
                        type = "<tr><td><a href='../brand/index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].NAME + "</a></td>";
                    }

                    output += type
                            + "<td>" + json.CONTENTS[i].TYPE + "</td>"
                            + "<td>" + json.CONTENTS[i].TYPE + "</td>"
                            + "<td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td class='text-center'><buttom class='fa fa-times-circle-o text-danger text btndel' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td>" + json.CONTENTS[i].IS_ACTIVE + "</td></tr>";
                }
                $('#TableBody').html(output);
            }
        }
    });
}
