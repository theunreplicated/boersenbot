<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class NetFile_get_contents{
    public function request($url,$http_method="GET",$header=false,$postcontent=false){
               
        
    return file_get_contents($url);    
    }
    
    
    
    
}
?>
