<?php

include_once "../base.php";

$m=$Movie->find($_POST['m']);
$today=strtotime(date('Y-m-d'));
$startD=strtotime($m['ondate']);

for($i=0;$i<3;$i++){
    $showD=strtotime("+$i days",$startD);
    if($showD>=$today){
        echo "<option value='".date('Y-m-d',$showD)."'>".date('Y-m-d',$showD)."</option>";
    }
}