<?php
function toMiladi($t){
    $date = substr($t,0,10);
    $date = str_replace('/','-',$date);
    $arr = explode('-',$date);
    $date = \Morilog\Jalali\jDateTime::toGregorian($arr[2],$arr[1], $arr[0]); // [2016, 5, 7]
    $date = implode('-',$date);
    $f = $date.''.substr($t,10);
    return $f;
}
function toJalaali($t){
    $date = substr($t,0,10);
    $arr = explode('-',$date);
    $date = \Morilog\Jalali\jDateTime::toJalali($arr[0], $arr[1], $arr[2]); // [1395, 2, 18]
    $date = array_reverse($date);
    $date = implode('/',$date);
    $f = $date.''.substr($t,10,6);
    return $f;
}
 function toMilad($t){
    $arr = array();
    $arr = explode('-', $t);
     $date = \Morilog\Jalali\jDateTime::toGregorian($arr[0],$arr[1], $arr[2]); // [2016, 5, 7]
     $date = $date[0]."-".$date[1]."-".$date[2];
     return $date;
}
function tokenize($t){
    $arr = array();
    $arr = explode('-', $t);

     if(strlen($arr[1]) == 1){
         $arr[1] = '0'.$arr[1];
     }
     if(strlen($arr[2]) > 5){
         $arr[2] = substr($arr[2], 0,-6);
     }
    if(strlen($arr[2]) == 1){
        $arr[2] = '0'.$arr[2];
    }
    $i = $arr[0].$arr[1].$arr[2];
     return $i;
}

function dateNoTime($dt){

    $d = array();
    $d = explode("-",$dt);
    $d[2] = substr($d[2],0,2);
    $d = $d[0].$d[1].$d[2];

}

