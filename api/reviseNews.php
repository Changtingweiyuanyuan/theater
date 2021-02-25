<?php
include_once "../base.php";
$n=$News->find($_POST['id']);
foreach($_POST as $k=>$v){
    $n[$k]=$v;
}
// print_r($n);
$News->save($_POST);
to("../backend.php?do=news");
?>