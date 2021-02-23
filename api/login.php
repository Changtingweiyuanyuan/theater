<?php

include_once "../base.php";

if(isset($_POST['acc']) && !isset($_POST['pw'])){
$chk=$Mem->find(['acc'=>$_POST['acc']]);
if($chk){
    echo "1";
}else{
    echo "0";
}
}elseif(isset($_POST['acc']) && isset($_POST['pw'])){
    $chk=$Mem->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
    if($chk){
        $_SESSION['mem']=$chk['name'];
        echo "1";
    }else{
        echo "0";
    }
}