<?php
include_once "../base.php";
if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
    $_POST['rank']=$Car->q("select max(rank) from `theater_carousel` ")[0][0]+1;
    $_POST['sh']=1;
    $Car->save($_POST);
}

to("../backend.php?do=carousel");
?>