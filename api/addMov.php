<?php
include_once "../base.php";

print_r($_POST);
echo '<hr>';
print_r($_FILES);

$_POST['tra']=$_FILES['tra']['name'];
$_POST['poster']=$_FILES['poster']['name'];
$_POST['sh']=1;
$_POST['rank']=$Movie->q("select max(rank) from movie ")[0][0]+1;
$_POST['ondate']=$_POST['y'].'-'.$_POST['m'].'-'.$_POST['d'];

$Movie->save($_POST);
to("../backend.php?do=movie");
