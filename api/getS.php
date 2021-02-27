<?php

include_once "../base.php";

$m=$Movie->find($_POST['m']);
$bookingdate=$_POST['d'];
$today=strtotime(date('Y-m-d'));

$now=date("G"); //現在幾點 21=9pm


if($now<=10){
    $start=1;
}else{
    $start=ceil(($now-9)/2)+1;
}

// echo $start;
//只有今天要分是否顯示出乃
if($_POST['d']==date('Y-m-d')){
    
    if($start<=7){
        for($i=$start;$i<=7;$i++){
            $sum=$Order->q("SELECT sum(`qt`) FROM `theater_order` WHERE `movie`='{$m['name_c']}' && `moviedate`='{$bookingdate}' && `session`='{$i}'")[0][0];
            echo $sum;
        echo "<option value='$sess[$i]'>".$sess[$i]."時段，目前剩餘".(20-$sum)."個位置</option>";
        }
    }else{
        echo "<option>今天已無場次</option>";
    }
}else{
    for($i=1;$i<8;$i++){
        $sum=$Movie->q("select sum(qt) from `theater_order` where `movie`='{$m['name_c']}' && `moviedate`='{$bookingdate}' && `session`='{$i}' ")[0][0];
        echo "<option value='$sess[$i]'>".$sess[$i]."時段，目前剩餘".(20-$sum)."個位置</option>";
    }
}