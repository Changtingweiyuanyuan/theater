<?php
//getdate!=undefined
//

include_once "../base.php";

$m=$Movie->find($_POST['m']);
$today=strtotime(date('Y-m-d'));
$startDay=strtotime($m['ondate']);

for($i=0;$i<7;$i++){
    $showDay=strtotime("+$i days",$startDay);
    if($showDay>=$today){

?>
<option value="<?=date('Y-m-d',$showDay)?>" <?=(date('Y-m-d',$showDay)==$_POST['getdate'])?'selected':''?>><?=date('Y-m-d',$showDay)?></option>;

<?php
    }
}