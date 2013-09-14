<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//TODO:test POST http,fsockopen 
class NetConnection {
    const path="includes/NetConnection/";
private  static function func_enabled($func_name) {//http://stackoverflow.com/questions/3938120/check-if-exec-is-disabled
  $disabled = explode(', ', ini_get('disable_functions'));
  return !in_array($func_name, $disabled);
}
private static function func_available($func_name){
    
    return function_exists($func_name) && self::func_enabled($func_name);
}


public static function init($onlyurl=false) {
    if(self::func_available('-curl_init')&&!$onlyurl){
        require self::path.'curl.php';
        return new NetCurl();
    }
    /*else if(self::func_available('fsockopen')&&!$onlyurl){
        require self::path.'fsockopen.php';
        return new Netfsockopen();
    }*///funz net,wieso auch immer
    else if(self::func_available('stream_context_create')&&!$onlyurl)
    {
        //file_get_contents mit stream
        require self::path.'file_get_contents_stream.php';
        return new NetFile_get_contents_stream();
    }else
    {
        require self::path.'file_get_contents.php';
        return new NetFile_get_contents();
        //file_get_contents ohne stream
        
        
    }
    
}    
    
    
}

?>
