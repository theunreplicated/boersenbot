<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class NetFile_get_contents_stream{
    private function detectssl($url){
    
    
   return (preg_match('~^https~',$url)? array('ssl','verify_peer'=>false):false); 
}
    public function request($url,$http_method="GET",$header=false,$postcontent=false){
        $opts = array( 'http'=>array('method'=>$http_method));
        //$opts=  array_merge($opts,$this->detectssl($url));
        if($this->detectssl($url)){$opts['ssl']['verify_peer']=FALSE;}
        if($header){
            $opts['header']=$header;
        }
        if($postcontent){
            $opts['content']=  http_build_query($postcontent);
        }
        
        $context = stream_context_create($opts);
      return file_get_contents($url,false,$context);  
        
    }
    
    
    
}
?>
