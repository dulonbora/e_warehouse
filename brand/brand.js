
//Brand Master
$(document).ready(loadHtmlToModel());
$(document).ready(addBrandMaster());
$(document).ready(loadTable());
$(document).ready(Edit());
$(document).ready(Secrch());
$(document).ready(Search_Html());

//Brand Master
$(document).ready(BrandList());

$(document).ready(More());

function More() {
    $(document).on("click", "#Btn_More", function () {
        page_no = page_no+1;
        loadTable();
    });
}

//
    function Search_Html() {
    $('#search_html').load("search_html.php");
}

    function loadHtmlToModel() {
    $(document).on("click", "#addnew", function () {
        CallHtmlPacking(0);
    });
}

    function Edit() {
    $(document).on("click", ".btnedit", function () {
        var id = $(this).attr("id");
        CallHtmlPage(id);
    });
}

    function BrandList() {
    $(document).on("click", ".brandList", function () {
        var id = $(".brandList").attr("id");
        $('#statusresult').load("brand_list_packing_html.php?i="+id);
        $('#myModalBig').modal("show");
        loadPaclingTables(id);
    });
}


  
    




    function Secrch() {
    $(document).on("keyup", "#Search", function () {
        var id = $(this).val();
        loadTableSearch(id);
    });
}

    function CallHtmlPage(i) {
    $('#statusresult').load("brand_add_ajax.php?i=" + i);
    $('#myModalBig').modal("show");
}

    function CallHtmlPacking(i) {
    $('#statusresult').load("brand_add_ajax.php?i=" + i);
    $('#myModalBig').modal("show");
}

    function addBrandMaster() {
    $(document).on("click", "#adduser", function (e) {
        e.preventDefault();
        var url = "../brand_ajax_request/brand_add.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#fBrand").serialize(), // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 1) {
                    $("#MassageLabel").html("Successfully saved!");
                    loadTable();
                    $('#myModalBig').modal("hide");
                }
                else {
                    $("#MassageLabel").html("Date failed to save!");
                }
            }
        });
    });
}


    function loadTable() {
    var url = "../brand_ajax_request/load_brand_list.php?i="+page_no;
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
                            + "<td>" + json.CONTENTS[i].GROUP_ID + "</td>"
                            + "<td>" + json.CONTENTS[i].CATEGORY_ID + "</td>"
                            + "<td>" + json.CONTENTS[i].TYPE_ID + "</td>"
                            + "<td>" + json.CONTENTS[i].COUNT + "</td>"
                            + "<td>" + json.CONTENTS[i].IS_IMPORTED + "</td>"
                            + "<td>" + json.CONTENTS[i].IS_NEW + "</td>"
                            + "<td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td class='text-center'><a href='packing_list.php?i=" + json.CONTENTS[i].ID + "' class='fa fa-bars text-danger text'></a></td>"
                            + "</tr>";
                }
                   $('#TableBody').append(output);
            }
            else{
                $("#Fotter_Part").html("No More Record Available");
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
    var url = "../brand_ajax_request/load_brand_list_Seach.php?p=" + i;
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
                            + "<td>" + json.CONTENTS[i].GROUP_ID + "</td>"
                            + "<td>" + json.CONTENTS[i].CATEGORY_ID + "</td>"
                            + "<td>" + json.CONTENTS[i].TYPE_ID + "</td>"
                            + "<td>" + json.CONTENTS[i].STRANGTH + "</td>"
                            + "<td>" + json.CONTENTS[i].IS_IMPORTED + "</td>"
                            + "<td>" + json.CONTENTS[i].IS_NEW + "</td>"
                            + "<td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "<td class='text-center'><a href='packing_list.php?i=" + json.CONTENTS[i].ID + "' class='fa fa-bars text-danger text'></a></td>"
                            + "</tr>";
                }
                $('#TableBody').html(output);
            }
        }
    });
    
    
      
  

    
    
}
