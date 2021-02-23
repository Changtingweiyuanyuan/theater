<?php
include_once "../base.php";

$m=$Movie->find($_POST['Mid']);
$m['sh']=($m['sh']+1)%2;
$Movie->save($m);