//Variables


//Brand Master
$(document).ready(Search_Html());
$(document).ready(Secrch());

//Index
$(document).ready(loadTableIndex());


  $(document).ready(More());

function More() {
    $(document).on("click", "#Btn_More", function () {
        page_no = page_no+1;
        loadTableIndex();
    });
}
//
function Search_Html() {
    $('#search_html').load("search_html_date.php?i=" + user_item_id);
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




function CallHtmlPage(i) {
    $('#statusresult').load("view_transection_details.php?i=" + i);
    $('#myModalBig').modal("show");
}





function loadTableIndex() {
    var url = "../ena_management_ajax_request/ena_transection_list.php?id=" + user_item_id+"&i="+page_no;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var status = json.CONTENTS[i].STATUS === "0" ? "fa-archive" : "fa-check";
                    var link = "<tr><td><a href='index.php?i=" + json.CONTENTS[i].ID + "'>" + json.CONTENTS[i].LONGDATE + "</a></td>";
                    output += link
                            + "<td>" + json.CONTENTS[i].MODE + "</td>"
                            + "<td>" + json.CONTENTS[i].TOO + "</td>"
                            + "<td><span class='pull-rignt'>" + json.CONTENTS[i].BL + " BL</span></td>"
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


















