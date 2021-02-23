<?php
include_once "../base.php";

if(isset($_FILES['img']['tmp_name'])){
    $fn=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/$fn");
    $_POST['img']=$fn;
    $_POST['sh']=1;
    $_POST['rank']=$Pos->q("select max(rank) from poster")[0][0]+1;
    $_POST['ani']=rand(1,3);

    $Pos->save($_POST);
}

to('../backend.php?do=poster');

?>