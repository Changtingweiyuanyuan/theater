<?php
include_once "../base.php";

$m=$Movie->find(['name_c'=>$_POST['movie']]);
$today=strtotime(date('Y-m-d'));
$startDay=strtotime($m['ondate']);
?>
<div class="dates" style="width:100%;">

<?php
for($i=0;$i<8;$i++){
    $showDay=strtotime("+$i days",$startDay);
    if($showDay>=$today){
?>
    <div class="date ms-3 ps-5 p-1 pl-4" data-date="<?=date('Y-m-d',$showDay)?>"><?=date('Y-m-d',$showDay)?></div>
<?php
    }
}

?>

</div>

