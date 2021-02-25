<?php
include_once "../base.php";

if(!isset($_POST['pw']) && isset($_POST['acc'])){
    $chk=$Mem->find(['acc'=>$_POST['acc']]);
    if($chk){
        echo 1;
    }else{
        echo 0;
    }
}elseif(isset($_POST['pw']) && isset($_POST['acc'])){
    print_r( $_POST);
    $Mem->save($_POST);
}