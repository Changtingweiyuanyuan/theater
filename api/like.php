<?php
include_once "../base.php";


$chk=$Heart->find(['mem_id'=>$_POST['memid'],'movie_id'=>$_POST['movieid']]);
if($chk){
    //刪掉
    $Heart->del(['mem_id'=>$_POST['memid'],'movie_id'=>$_POST['movieid']]);
    $m=$Mem->find($_POST['memid']);
    $m['heart']--;
    $Mem->save($m);
}else{
    //新增
    // $movietype=$Movie->find($_POST['movieid'])['type']
    $Heart->save(['mem_id'=>$_POST['memid'], 'movie_id'=>$_POST['movieid'], 'movie_type'=>$Movie->find($_POST['movieid'])['type']]);
    $m=$Mem->find($_POST['memid']);
    $m['heart']++;
    $Mem->save($m);
}