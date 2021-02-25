<?php
include_once "../base.php";

// `name_c`, `name_e`, `length`, `level`, `type`, `ondate`, `actor`, `poster`, `background`, `trailer`, `intro`, `sh`, `rank`, `heart` 
// print_r($_POST);
// echo '<hr>';
// print_r($_FILES);



if(isset($_POST['id'])){
    $m=$Movie->find($_POST['id']);
    $imgname=str_replace(' ','',$m['name_e']);
    if(!empty($_FILES['background']['tmp_name'])){
        $tmp=explode(".",$_FILES['background']['name']);
        $sub=end($tmp);
        move_uploaded_file($_FILES['background']['tmp_name'],"../img/".$imgname."B.".$sub);
        $_POST['background']=$imgname."B.".$sub;
    }

    if(!empty($_FILES['poster']['tmp_name'])){
        $tmp=explode(".",$_FILES['poster']['name']);
        $sub=end($tmp);
        move_uploaded_file($_FILES['poster']['tmp_name'],"../img/".$imgname.".".$sub);
        $_POST['poster']=$imgname.".".$sub;
    }

    $_POST['type']=serialize($_POST['type']);

}else{
    $imgname=str_replace(' ','',$_POST['name_e']);

    if(!empty($_FILES['background']['tmp_name'])){
        $sub=end(explode(".",$_FILES['background']['name']));
        move_uploaded_file($_FILES['background']['tmp_name'],"../img/".$imgname."B.".$sub);
        $_POST['background']=$imgname."B.".$sub;
    }

    if(!empty($_FILES['poster']['tmp_name'])){
        $sub=end(explode(".",$_FILES['poster']['name']));
        move_uploaded_file($_FILES['poster']['tmp_name'],"../img/".$imgname.".".$sub);
        $_POST['poster']=$imgname.".".$sub;
    }

    $_POST['type']=serialize($_POST['type']);
    $_POST['trailer']=NULL;
    $_POST['sh']=1;
    $_POST['rank']=$Movie->q("select max(rank) from `theater_movie` ")[0][0]+1;
    $_POST['heart']=0;
}

$Movie->save($_POST);
to("../backend.php?do=movie");
