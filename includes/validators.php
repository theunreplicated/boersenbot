<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class validator{
  
    
 private static $Error;
 //@param $errorHandler Class 
 //@desc muss beim Start 1* aufgerufen werden
 public static function __init($errorHandler){
 self::$Error=$errorHandler;    
  
 }
 private static function getCaller() {
    $trace = debug_backtrace();
    //http://www.sitecrafting.com/blog/php-getcaller/
    $name = $trace[2]['function'];
    return empty($name) ? 'global' : $name;
}
private static function reportError($errorString,$passed_arguments){
 self::$Error->report($errorString,$passed_arguments,self::getCaller());   
    
    
    
}  
 
 //@desc Stellt sicher,dass ein Array genau die bestimmte Anzahl an Items hat
 //@param $array das array
 //@param $expected_items_numbers ewrartete Nummern
 public static function assertEqualArrayItemsNumber($array,$expected_items_numbers){
     if (is_array($array)){
      if(count($array)==$expected_items_numbers){
       return true;   
             
      }else
      {
          
       self::reportError("Anzahl stimmt nicht überein",func_get_args());   
       return false;   
          
          
      }
         
     }else{
     self::reportError("Übergebener Typ ist kein Array",  func_get_args());
      return false;
     }  
         
 } 
 
 public static function assertEquals($n1,$n2){
     if($n1==$n2)//extra nicht ===
         {
         return true;
           
         }else{
             
             
             self::reportError("Nicht gleich",  func_get_args());
             return false;
         }
     
     
     
 }   
    
    
    
}

?>
