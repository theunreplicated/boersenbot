<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Netfsockopen{
  public function request($url,$http_method="GET",$header=false,$postcontent=false)  
  {
     $url_p=  parse_url($url);
     $host=$url_p['host'];
     $path=(isset($url_p['path'])? $url_p['path']:'/');
      $out="";
     $out.="{$http_method} {$path} HTTP/1.1\r\n";
     $out.="Host: {$host}\r\n";
     if($header){           $out.=$header;}
     if($postcontent){$postdata=  http_build_query($postcontent);
                  $out.="Content-length: ".strlen($postdata).'\r\n';};
              
     $fp=  fsockopen($host, ($url_p['scheme']!=='http' ? 443:80));             
     fwrite($fp,$out.'\r\n'); 
     $buffer="";
     
  
     while (!feof($fp)) {
       $buffer.= fgets($fp, 128);
    }
    fclose($fp);
    return $buffer;
  }
    
    
}
?>
