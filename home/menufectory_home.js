$(document).ready(LoadImflConsignment());
$(document).ready(LoadImflOrder());



function LoadImflConsignment() {
    $('#IMFL_CONSIGNMENT').load("../graph_component/imfl_consignment.php");
}
function LoadImflOrder() {
    $('#IMFL_ORDER').load("../graph_component/imfl_order.php");
}