<?php

include_once "../base.php";
$db=new DB($_POST['table']);
$x=$db->find($_POST['idx']);
$y=$db->find($_POST['idy']);

$tmp=$x['rank'];
$x['rank']=$y['rank'];
$y['rank']=$tmp;

$db->save($x);
$db->save($y);