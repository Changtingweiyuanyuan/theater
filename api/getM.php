<?php

include_once "../base.php";


$today=date('Y-m-d');
$startDay=date('Y-m-d',strtotime('-6 days',strtotime($today)));
$ms=$Movie->all(['sh'=>1]," && `ondate` between '$startDay' and '$today' order by rank");
$type=$_POST['type'];

foreach($ms as $m){
    if($type=='all'){
        echo "<option value='{$m['id']}'>{$m['name_c']}({$m['name_e']})</option>";
    }else{
        $selected=($type==$m['id'])?'selected':'';
        echo "<option value='{$m['id']}' $selected>{$m['name_c']}({$m['name_e']})</option>";
        
    }
}

?>