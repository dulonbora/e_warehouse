<?php

class Global_Functions {
    
    //after the execution of a function.
    public function pageRedirect($page) {
        echo "<script type=\"text/javascript\">	";
        echo "document.location = '" . $page . "' ";
        echo "</script>";
    }
    
    
    
    public function GenerateEnaTransectionStatus($id) {
        $type = "";
        switch ($id) {
            case 0:
                $type = "Sorry";
                break;
            case 1:
                $type = "Pending In Comm. Office ";
                break;
         
        }
        return $type;
    }

    
}
