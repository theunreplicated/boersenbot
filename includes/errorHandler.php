<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ErrorHandler{
    private $visual_mode=true;
    private $log_to_file=false;
    const logfile="error.log";
   private function helper_capture_var_dump($var){
       ob_start();
var_dump($var);
return ob_get_clean();
       } 
public function report($errorString,$passed_arguments,$caller){
    $result_errorstring="Fehler in {$caller} : {$errorString}\n,Argumente beim Aufruf:".$this->helper_capture_var_dump($passed_arguments);
    
    if($this->visual_mode){
    echo $result_errorstring;    
     
        
    }
    if($this->log_to_file){
        $fp=  fopen($this->log_to_file, "a");
        fwrite($fp, $result_errorstring.'\n');
        fclose($fp);
    }
    
    
}
  
}


?>
