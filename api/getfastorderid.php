<?php
include_once "../base.php";
$m=$Movie->find(['name_c'=>$_POST['m']]);
?>
<div id="orderButton">
    <a href="index.php?do=order&id=<?=$m['id']?>&date=<?=$m['ondate']?>">訂票囉
    <img src="icon/thumbsup.png" style="margin-left:5px;width:30px;height:40px;">
    </a>
</div>