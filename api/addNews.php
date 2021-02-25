<?php
include_once "../base.php";

$_POST['date']=date('Y-m-d');
$_POST['sh']=1;
$News->save($_POST);
print_r($_POST);
to("../backend.php?do=news");
?>