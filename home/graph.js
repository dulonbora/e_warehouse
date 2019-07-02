function Esc() {
    $(document).keyup(function(e) {
    if (e.keyCode === 27){
        $('#myModalBig').modal("hide");
    }
    });
}