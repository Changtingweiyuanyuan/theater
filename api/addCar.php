<?php
include_once "../base.php";
if(isset($_FILES['img']['tmp_name'])){
    $imgname=$Car->q("select max(id) from `theater_carousel`")[0][0]+1;
    $sub=end(explode(".",$_FILES['img']['name']));
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$imgname.".".$sub);
    $_POST['img']=$imgname.".".$sub;
    $_POST['rank']=$Car->q("select max(rank) from `theater_carousel` ")[0][0]+1;
    $_POST['sh']=1;
    $Car->save($_POST);
}

to("../backend.php?do=carousel");
?>