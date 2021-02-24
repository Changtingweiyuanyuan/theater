<?php

include_once "../base.php";

$m=$Movie->find($_POST['m']);
$today=strtotime(date('Y-m-d'));
$startDay=strtotime($m['ondate']);

for($i=0;$i<8;$i++){
    $showDay=strtotime("+$i days",$startDay);
    if($showDay>=$today){
        echo "<option value='".date('Y-m-d',$showDay)."'>".date('Y-m-d',$showDay)."</option>";
    }
}