<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class BoerseStuttgart{
    private $net;
    function __construct($netrequest){
        $this->net=$netrequest;
    }
            function getdata($symbol){$m;
              $data=$this->net->request("https://www.boerse-stuttgart.de/rd/de/aktien/factsheet?sSymbol={$symbol}");  
             preg_match("~ var windowid = '([^']{1,})'~",$data,$m);
             $windowid=$m[1];echo $windowid;
             //TODO:das folgende optional setzen,denn vermutlich wird gar nichts zurückgegeben,wenn die Aktie aktuell nicht gehandelt wird,also denn einfach den letzten bekannten Wert von dem vorherigen nehmen
  //           $url='https://www.boerse-stuttgart.de/rd/de/push/?windowid='.$windowid."&param=/webservices/quotes/index.html&lfields=STD_Bid,STD_Ask,BOERSE_STU_VolumeBid,BOERSE_STU_VolumeAsk,BOERSE_STU_BidDateFull,BOERSE_STU_BidTimeFull,BOERSE_STU_aktSpread,STD_Price,RAW_kzs,BOERSE_STU_Nebenrecht,BOERSE_STU_BND_Volume,STD_PriceDateFull,BOERSE_STU_PriceTimeFull,STD_Volume,STD_High,STD_Low,STD_Close,RAW_kzs_close,BOERSE_STU_Kursart,STD_DiffA,STD_DiffP,BOERSE_STU_Iday_HighYear,BOERSE_STU_Iday_LowYear,BOERSE_STU_Iday_52WHigh,BOERSE_STU_Iday_52WLow&lsymbols={$symbol}";  
//echo $url;            
// echo  $this->net->request($url);
            }
    
    
}
?>
