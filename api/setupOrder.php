
<?php
include_once "../base.php";

// print_r($_POST);

$memid=$Mem->find(['name'=>$_POST['memname']])['id'];
$moviename=$Movie->find($_POST['movieid']);
echo $memid;
$n=[
    'num'=>substr(date('Y'),2,2).date('mdHi'),
    'mem'=>$memid,
    'movie'=>$moviename['name_c'],
    'moviedate'=>$_POST['date'],
    'session'=>array_search($_POST['session'],$sess),
    'orderdate'=>date('Y-m-d'),
    'seat'=>serialize($_POST['seats']),
    'qt'=>count($_POST['seats']),
    'food'=>serialize($_POST['food']),
    'money'=>$_POST['money'],
    'ordertime'=>date('H:i:s'),
];

$Order->save($n);
// print_r($n);