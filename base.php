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

$static=[
    '愛情片'=>0,
    '喜劇片'=>0,
    '驚悚片'=>0,
    '恐怖片'=>0,
    '科幻片'=>0,
    '卡通片'=>0,
    '戰爭片'=>0
];

$food=[
    1=>'小份爆米花',
    2=>'大份爆米花',
    3=>'吉拿棒',
    4=>'紅茶',
    5=>'汽水'
];

$seattable=[
    1=>'1排1號',
    2=>'1排2號',
    3=>'1排3號',
    4=>'1排4號',
    5=>'1排5號',
    6=>'2排1號',
    7=>'2排2號',
    8=>'2排3號',
    9=>'2排4號',
    10=>'2排5號',
    11=>'3排1號',
    12=>'3排2號',
    13=>'3排3號',
    14=>'3排4號',
    15=>'3排5號',
    16=>'4排1號',
    17=>'4排2號',
    18=>'4排3號',
    19=>'4排4號',
    20=>'4排5號'
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


$Admin=new DB("theater_admin");
$Mem=new DB("theater_mem");
$News=new DB("theater_news");
$Movie=new DB("theater_movie");
$Car=new DB("theater_carousel");
$Order=new DB("theater_order");
$Heart=new DB("theater_heartlog");

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
                foreach($arr as $k=>$v){
                    $tmp[]=sprintf("`%s`='%s'",$k,$v);
                }
                $sql.=implode(",",$tmp)." where `id`='{$arr['id']}'";
        }else{

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