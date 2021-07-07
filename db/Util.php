<?php

namespace bercesteobs\util;

class Util
{

    public function getNameUrl(){
        $url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $a=explode("/",$url);
        $a=explode(".",$a[5] );
        return strtoupper(  $a[0]);
      
    }
    
    public function getNameUrl2(){
        $url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $a=explode("/",$url);
        $a=explode(".",$a[5] );
        return   $a[0];
      
    }
   
    
}
?>