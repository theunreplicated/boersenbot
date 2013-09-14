<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class NetCurl{
    
    public function request($url,$http_method="GET",$header=false,$postcontent=false){
        $ch=  curl_init();
        
        if(!$http_method=='GET')//wohl also POSt,es gibt zwar auch put,aber egal
        {
            $pq=  http_build_query($postcontent);
            curl_setopt($ch, CURLOPT_POST, count($postcontent));
            curl_setopt($ch,CURLOPT_POSTFIELDS, $pq);
                      
        }
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if($header){curl_setopt($ch,CURLOPT_HEADER,$header);}
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
        
        
    }
    
    
}
?>
