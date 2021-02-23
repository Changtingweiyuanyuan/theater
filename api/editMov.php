<?php
include_once "../base.php";

if(!empty($_FILES['poster']['tmp_name'])){
    $_POST['poster']=$_FILES['poster']['name'];
}
if(!empty($_FILES['tra']['tmp_name'])){
    $_POST['tra']=$_FILES['tra']['name'];
}

$_POST['ondate']=$_POST['y'].'-'.$_POST['m'].'-'.$_POST['d'];

$Movie->save($_POST);
to("../backend.php?do=movie");
