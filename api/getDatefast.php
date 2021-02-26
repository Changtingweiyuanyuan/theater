<?php
include_once "../base.php";
?>



<!-- <div class="dates" style="width:100%;transform:translate(38.5%, 2px);display:flex;flex-wrap:wrap"> -->
<div class="dates" style="width:100%;">
    <?php
    $m = $Movie->find(['name_c' =>$_POST['m']]);
    $today = strtotime(date('Y-m-d'));
    $startDay = strtotime($m['ondate']);
    for ($i=0;$i<7;$i++) {
        $showDay=strtotime("+$i days",$startDay);
        if($showDay>=$today){
    ?>
        <div class="date ms-3 ps-5 p-1 pl-4" data-date="<?= date('Y-m-d',$showDay) ?>"><?= date('Y-m-d',$showDay) ?></div>
    <?php
        }
    }
    ?>

</div>