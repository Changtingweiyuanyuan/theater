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



if(isset($_POST['adminacc']) && !isset($_POST['adminpw'])){
    $chk=$Admin->find(['acc'=>$_POST['adminacc']]);
    if($chk){
        echo "1";
    }else{
        echo "0";
    }
}elseif(!empty($_POST['adminacc']) && !empty($_POST['adminpw'])){
    $chk=$Admin->find(['acc'=>$_POST['adminacc'],'pw'=>$_POST['adminpw']]);
    if($chk){
        $_SESSION['admin']=true;
        echo "1";
    }else{
        print_r($chk);
        echo "0";
    }
}


