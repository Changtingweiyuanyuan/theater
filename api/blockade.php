<?php
include_once "../base.php";

$m=$Mem->find($_POST['memid']);
$m['status']=($m['status']+1)%2;
$Mem->save($m);