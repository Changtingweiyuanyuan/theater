<?php

include_once "../base.php";

$m=$Movie->find($_POST['m']);
$d=$_POST['d'];
$today=strtotime(date('Y-m-d'));

$now=date("G"); //現在幾點 21=9pm
echo $now;

if($now<=13){
    $start=1;
}else{
    $start=ceil(($now-13)/2)+1;
}

//只有今天要分是否顯示出乃
if($d==date('Y-m-d')){

}