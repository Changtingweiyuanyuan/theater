<?php
include_once "../base.php";
$db=new DB($_POST['table']);
$m=$db->find($_POST['Mid']);
$m['sh']=($m['sh']+1)%2;
$db->save($m);
// print_r($m);