<?php
include_once "../base.php";


$thismonth=date('Y-m');
$lastmonth=date('Y-m',strtotime("-1months",strtotime($thismonth)));
$themonthbeforelast=date('Y-m',strtotime("-2months",strtotime($thismonth)));
switch ($_POST['type']) {
    case 'bydate_month':
        $_SESSION['ordertypeSQL'] =" where `orderdate` like '{$thismonth}%' or `orderdate` like '{$lastmonth}%' or `orderdate` like '{$themonthbeforelast}%' order by `orderdate` desc";
        echo "bydate_month";
    break;
    case 'bydate_all':
        $_SESSION['ordertypeSQL'] = " order by `orderdate` desc";
        echo "bydate_all";
    break;
}

