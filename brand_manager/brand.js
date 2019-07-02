
//Brand Master
$(document).ready(loadHtmlToModel());
$(document).ready(addBrandToMyList());
$(document).ready(loadTable());
$(document).ready(Edit());
$(document).ready(Secrch());
$(document).ready(Search_Html());

//Brand Master
$(document).ready(AddPackingSize());


$(document).ready(CalclulateOpeningStockCase());
$(document).ready(CalclulateOpeningStockBottle());


$(document).ready(loadTableIndexMyBrands());

// Brand Packing Size Add
    
//
function Search_Html() {
    $('#search_html').load("search_html_item.php");

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


function AddPackingSize() {
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

function CallHtmlPage(i) {
    $('#statusresult').load("brand_add_ajax.php?i=" + i);
    $('#myModalBig').modal("show");
}

function addBrandToMyList() {
    $(document).on("click", "#addOpeningSTock", function (e) {
        e.preventDefault();
        var url = "../brand_manager_ajax/brand_list_add.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#BrandListForm").serialize(), // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 1) {
                    $("#MassageLabel").html("Successfully saved!");
                    $('#myModalBig').modal("hide");
                    loadTableIndexMyBrands();
                }
                if (parseInt(json.SUCCESS) === 2) {
                    $("#MassageLabel").html("Item Already Exits!");
                }
                if (parseInt(json.SUCCESS) === 0) {
                    $("#MassageLabel").html("Date Not Saved");
                }
            }
        });
    });
}

function loadTable() {
    var url = "../brand_manager_ajax/load_brand_packing_list.php";
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
                            + "<td>" + json.CONTENTS[i].GROUP_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].CATEGORY_NAME + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].ML_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].BOTTLES_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP_PER_BOTTLE + "</td>"
                            + "<td class='text-center'><buttom class='fa icon-arrow-right text-danger text addToMyList' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "</tr>";
                }
                $('#TableBody').html(output);
            }
        }
    });


}





function loadTableIndexMyBrands() {
    var url = "../brand_manager_ajax/load_brand_list.php";
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
                            + "<td class='text-right'>" + json.CONTENTS[i].ML_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].BOTTLES_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].OPENING_STOCK_STR + "</td>"
                            + "</tr>";
                }
                $('#TableBodyIndex').html(output);
            }
        }
    });
}



function CalclulateOpeningStockCase() {
    $(document).on("keyup", "#OPENING_STOCK_CASE", function () {
        var caseh = $("#OPENING_STOCK_CASE").val();
        var bottle = $("#OPENING_STOCK_BOTTLE").val();
        
        if(bottle===""){
            $("#Stock_Massage").html(caseh+" CASES");
        }
        else{
            $("#Stock_Massage").html(caseh+" CASES "+bottle+" BOTTLES");
        }
        
        
        
    });
}

function CalclulateOpeningStockBottle() {
    $(document).on("keyup", "#OPENING_STOCK_BOTTLE", function () {
        var caseh = $("#OPENING_STOCK_CASE").val();
        var bottle = $("#OPENING_STOCK_BOTTLE").val();
        
        if(bottle===""){
            $("#Stock_Massage").html(caseh+" CASES");
        }
        else{
            $("#Stock_Massage").html(caseh+" CASES "+bottle+" BOTTLES");
        }
        
        
        
    });
}


function loadTableSearch(str) {
    var url = "../brand_manager_ajax/load_brand_packing_list_search.php?s="+str;
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
                            + "<td>" + json.CONTENTS[i].GROUP_NAME + "</td>"
                            + "<td>" + json.CONTENTS[i].CATEGORY_NAME + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].ML_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].BOTTLES_PER_CASE + "</td>"
                            + "<td class='text-right'>" + json.CONTENTS[i].MRP_PER_BOTTLE + "</td>"
                            + "<td class='text-center'><buttom class='fa icon-arrow-right text-danger text addToMyList' id='" + json.CONTENTS[i].ID + "'></buttom></td>"
                            + "</tr>";
                }
                $('#TableBody').html(output);
            }
        }
    });


}



