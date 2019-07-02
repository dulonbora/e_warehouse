<?php

class String_Filter {
    
    private $encoding = 'UTF-8';
            
    function noHTML($input){
    return htmlentities($input, ENT_QUOTES | ENT_HTML5, $this->encoding);
    }
    
    
    
    
}
