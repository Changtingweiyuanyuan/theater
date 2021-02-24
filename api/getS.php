<?php

include_once "../base.php";

$m=$Movie->find($_POST['m']);
$bookingdate=$_POST['d'];
$today=strtotime(date('Y-m-d'));

$now=date("G"); //現在幾點 21=9pm




if($now<=9){
    $start=1;
}else{
    $start=ceil(($now-9)/2)+1;
}


//只有今天要分是否顯示出乃
if($d==date('Y-m-d')){

}elseif($start<=7){
    for($i=1;$i<=8;$i++){
        $sum=$Movie->q("select sum(qt) from `orders` where `movie`='{$m['name_c']}' && `ondate`='{$bookingdate}' && `session`='{$sess[$i]}' ")[0][0];
        echo "<option value='$i'>".$sess[$i]."時段，目前剩餘".(20-$sum)."個位置</option>";
    }

}else{
    echo "<option>今天已無場次</option>";
}