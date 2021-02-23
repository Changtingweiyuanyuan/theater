<?php

include_once "../base.php";


$today=date('Y-m-d');
$startD=date('Y-m-d',strtotime('-5 days',strtotime($today)));
$ms=$Movie->all(['sh'=>1]," && `ondate` between '$startD' and '$today' order by rank");
$type=$_POST['id'];

foreach($ms as $m){
    if($type=='all'){
        echo "<option value='{$m['id']}'>{$m['name_c']}({$m['name_e
            ']})</option>";
    }else{
        $se=($type==$m['id'])?'seleceted':'';
        echo "<option value='{$m['id']}' $se>{$m['name_c']}({$m['name_e
            ']})</option>";
        
    }
}

?>