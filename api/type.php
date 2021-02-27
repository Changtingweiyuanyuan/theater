<?php
include_once "../base.php";
$today = date('Y-m-d');
$startDay = date('Y-m-d', strtotime("-6days", strtotime($today)));
$ms = $Movie->all(['sh' => 1], " && `ondate` between '$startDay' and '$today'");
$movie=[];
if($_POST['type']!='all'){
foreach ($ms as $k => $m) {
    $m['type']=unserialize($m['type']);
    foreach($m['type'] as $t){
        if($t==$type[$_POST['type']]){
            // echo $m['name_c'];
            array_push($movie,$m['id']);
        }
    }
}
// print_r($movie);

foreach($movie as $movieid){
$m=$Movie->find($movieid)
?>


<div style="display:flex;flex-direction:column;align-items:center;width:fit-content;position:relative">

<?php
if(isset($_SESSION['mem'])){
    $mem=$Mem->find(['name'=>$_SESSION['mem']]);
    $chk=$Heart->find(['mem_id'=>$mem['id'],'movie_id'=>$m['id']]);
    if($chk){
        echo '<img src="icon/like.png" class="heartimg" onclick="like('.$chk['mem_id'].','.$chk['movie_id'].')">';
    }else{
        echo '<img src="icon/dislike.png" class="heartimg" onclick="like('.$mem['id'].','.$m['id'].')">';
    }
}
?>

    <a href="?do=movieintro&id=<?= $m['id'] ?>">
        <img class="movieintroimg" src="img/<?= $m['poster'] ?>" style="width:250px;height:355px">
    </a>
    <?= $m['name_c'] ?>
</div>

<?php
}
}else{
    foreach ($ms as $k => $m) {
        ?>
            <div style="display:flex;flex-direction:column;align-items:center;width:fit-content;position:relative">

<?php
if(isset($_SESSION['mem'])){
    $mem=$Mem->find(['name'=>$_SESSION['mem']]);
    $chk=$Heart->find(['mem_id'=>$mem['id'],'movie_id'=>$m['id']]);
    if($chk){
        echo '<img src="icon/like.png" class="heartimg" onclick="like('.$chk['mem_id'].','.$chk['movie_id'].')">';
    }else{
        echo '<img src="icon/dislike.png" class="heartimg" onclick="like('.$mem['id'].','.$m['id'].')">';
    }
}
?>

                <a href="?do=movieintro&id=<?= $m['id'] ?>">
                    <img class="movieintroimg" src="img/<?= $m['poster'] ?>" style="width:250px;height:355px">
                </a>
                <?= $m['name_c'] ?>
            </div>
        <?php } 
}