
$(document).ready(CalclulateOpeningStockCase());
$(document).ready(CalclulateOpeningStockBottle());


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

