<?php

date_default_timezone_set("Asia/Taipei");
session_start();


$type=[
    1=>'愛情片',
    2=>'喜劇片',
    3=>'驚悚片',
    4=>'恐怖片',
    5=>'科幻片',
    6=>'卡通片',
    7=>'戰爭片'
];

$food=[
    1=>'小份爆米花',
    2=>'大份爆米花',
    3=>'吉拿棒',
    4=>'紅茶',
    5=>'汽水'
];

$sess=[
    1=>'10:00-12:00',
    2=>'12:00-14:00',
    3=>'14:00-16:00',
    4=>'16:00-18:00',
    5=>'18:00-20:00',
    6=>'20:00-22:00',
    7=>'22:00-24:00'
];


$Mem=new DB("theater_mem");
$News=new DB("theater_news");
$Movie=new DB("theater_movie");

$Pos=new DB("poster");
$Order=new DB("order");

Class DB{
    private $dsn="mysql:host=localhost;charset=utf8;dbname=theater";
    private $pdo="";
    private $table="";

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,"root","");
    }

    function find($arr){
        $sql="select * from $this->table ";
        if(is_array($arr)){
            foreach($arr as $k=>$v){
                $tmp[]=sprintf("`%s`='%s'",$k,$v);
            }
            $sql.=" where ".implode(" && ",$tmp);
        }else{
            $sql.=" where `id`='$arr'";
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($arr){
        $sql="delete from $this->table ";
        if(is_array($arr)){
            foreach($arr as $k=>$v){
                $tmp[]=sprintf("`%s`='%s'",$k,$v);
            }
            $sql.=" where ".implode(" && ",$tmp);
        }else{
            $sql.=" where `id`='$arr'";
        }
        return $this->pdo->exec($sql);
    }

    function save($arr){
        if(isset($arr['id'])){
            $sql="update $this->table set ";
            //UPDATE `poster` SET `id`=[value-1],`name`=[value-2],`img`=[value-3],`sh`=[value-4],`rank`=[value-5],`ani`=[value-6] WHERE 1
                foreach($arr as $k=>$v){
                    $tmp[]=sprintf("`%s`='%s'",$k,$v);
                }
                $sql.=implode(",",$tmp)." where `id`='{$arr['id']}'";
        }else{
            //INSERT INTO `poster`(`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
            $sql="insert into $this->table (`".implode("`,`",array_keys($arr))."`) values ('".implode("','",$arr)."')";
        }

        return $this->pdo->exec($sql);
    }


    function all(...$arr){
        $sql="select * from $this->table ";
        if(isset($arr[0])){
            if(is_array($arr[0])){
                foreach($arr[0] as $k=>$v){
                    $tmp[]=sprintf("`%s`='%s'",$k,$v);
                }
                $sql.=" where ".implode(" && ",$tmp);
            }else{
                $sql.=$arr[0];
            }
        }
        if(isset($arr[1])){
            $sql.=$arr[1];
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchAll();
    }
    function count(...$arr){
        $sql="select count(*) from $this->table ";
        if(isset($arr[0])){
            if(is_array($arr[0])){
                foreach($arr[0] as $k=>$v){
                    $tmp[]=sprintf("`%s`='%s'",$k,$v);
                }
                $sql.=" where ".implode(" && ",$tmp);
            }else{
                $sql.=$arr[0];
            }
        }
        if(isset($arr[1])){
            $sql.=$arr[1];
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }

        function q($sql){
            // echo $sql;
            return $this->pdo->query($sql)->fetchAll();
        }
}

function to($url){
    header("location:".$url);
}