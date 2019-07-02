<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 Permit_No">
                <div class="form-group">
                    <label>Assam Excise Permit No</label>
                    <input type="text" name="PERMIT_NO" value="" id="PERMIT_NO" placeholder="Assam Excise Permit No" class="input-sm form-control" required>
                </div>
            </div>
            
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 Permit_No_btn">
                <div style="margin-top: 23px;" class="form-group">
                    <input type="button" id="Btn_AutoFill" value="Auto Fill" class="btn btn-primary btn-sm btn-block">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 Permit_Date">
                <div class="form-group">
                    <label>Permit Date</label>
                    <input type="text" name="PERMIT_DATE" value="" id="PERMIT_DATE" placeholder="Permit Date" class="input-sm form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 Permit_Date">
                <div class="form-group">
                    <label>Consignment No</label>
                    <input type="text" name="CONSIGNMENT_NO" value="" id="CONSIGNMENT_NO" placeholder="Consignment No" class="input-sm form-control" required>
                </div>
            </div>

<script type="text/javascript">
$(document).ready(AutoFill());
function AutoFill() {
    $(document).on("click", "#Btn_AutoFill", function (e) {
        
        var permit_no = $("#PERMIT_NO").val();

        var url = "http://assamexcise.in/wp/online/permit_deitails_json.php?i=" + permit_no;
                alert(url);
        $.ajax({
            type: "GET",
            url: url,
            success: function (data)
            {
                var json = $.parseJSON(data);
                if (parseInt(json.SUCCESS) === 1) {
                                    alert(json.CONTENTS.length);

                    for (var i = 0; i < json.CONTENTS.length; i++) {
                    var d = new Date(parseInt(json.CONTENTS[i].DATE_OF_ISSUE)*1000);
                    $("#PERMIT_DATE").val(d.toLocaleDateString());
                    $("#CONSIGNMENT_NO").val(json.CONTENTS[i].CONSIGNMENT_NO);
                }
                    
                }
                if (parseInt(json.SUCCESS) === 0) {
                    $("#MassageLabel1").html("Date failed to save!");
                }
            }
        });
    });
}
</script>