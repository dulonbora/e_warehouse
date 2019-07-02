
$(document).ready(loadHtmlToModel());
$(document).ready(loadHtmlToModelTax());
$(document).ready(loadHtmlToModelImage());

$(document).ready(UpdateCompanyDetails());
$(document).ready(UpdateCompanyTax());


function loadHtmlToModel() {
    $(document).on("click", "#CompanySetUp", function () {
        CallHtmlPage();
    });
}

function loadHtmlToModelTax() {
    $(document).on("click", "#CompanyTaxSetUp", function () {
        CallHtmlPageTax();
    });
}

function loadHtmlToModelImage() {
    $(document).on("click", "#CompanyLogo", function () {
        CallHtmlPageImage();
    });
}

function CallHtmlPage() {
    $('#statusresult').load("officers_details.php");
    $('#myModalBig').modal("show");
}

function CallHtmlPageTax() {
    $('#statusresult').load("tax_details.php");
    $('#myModalBig').modal("show");
}

function CallHtmlPageImage() {
    $('#statusresult').load("change_logo.php");
    $('#myModalBig').modal("show");
}

function UpdateCompanyDetails() {
    $(document).on("click", "#BtnUpdateCompany", function (e) {
        e.preventDefault();
        var url = "../home_request/update_company_ajax.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#fCompany").serialize(), // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 1) {
                    $("#MassageLabel").html("Successfully saved!");
                    location.reload();
                }
                else {
                    $("#MassageLabel").html("Date failed to save!");
                }
            }
        });
    });
}

function UpdateCompanyTax() {
    $(document).on("click", "#BtnUpdateTax", function (e) {
        e.preventDefault();
        var url = "../home_request/update_tax_details.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#fCompany").serialize(), // serializes the form's elements.
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 1) {
                    $("#MassageLabel").html("Successfully saved!");
                    location.reload();
                }
                else {
                    $("#MassageLabel").html("Date failed to save!");
                }
            }
        });
    });
}
