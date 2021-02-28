<!-- 已愛心 -->
<!-- 喜歡電影種類比例 (比例圖套件) 左邊 -->
<!-- 右邊出現四格喜歡的電影 -->
<style>
    #hearttitle {
        color: #25c179;
        font-weight: bolder;
        border: none !important;
        font-size: large;
    }

    .imgblock {
        width: 47%;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        font-weight: bolder;

        background: #4168a25e;
        border-radius: 15px;
    }

    .imgblock img {
        border: 1px #ffffff solid;
        padding: 5px;
        width: 140px;
        height: 200px;
    }

    .heartimg {
        width: 30px !important;
        height: 30px !important;
        border: none !important;
        cursor: pointer;
    }

    .heartarrow{
        position:absolute;
        bottom:0;
        font-size: xx-large;
    }
    .right{
        right:80px
    }
    .left{
        left:80px;
    }

</style>

<?php
$m = $Mem->find($_GET['mem']);
$allhs = $Heart->q("SELECT * FROM `theater_heartlog`,`theater_movie` WHERE `theater_heartlog`.`movie_id`=`theater_movie`.`id` AND `theater_heartlog`.`mem_id`={$m['id']}");

// 星星計算
    $tmp=[];
    foreach($allhs as $k=>$hh){
        $type=unserialize($hh['movie_type']);
        array_push($tmp,$type);
    }


    $sum=0;
    foreach($tmp as $k=>$tt){
        foreach($tt as $t){
                $static[$t]++;
                $sum++;
        }
    }


$rates=[
    '愛情片'=>(ceil(($static['愛情片']/$sum)*100))*2,
    '喜劇片'=>(ceil(($static['喜劇片']/$sum)*100))*2,
    '驚悚片'=>(ceil(($static['驚悚片']/$sum)*100))*2,
    '恐怖片'=>(ceil(($static['恐怖片']/$sum)*100))*2,
    '科幻片'=>(ceil(($static['科幻片']/$sum)*100))*2,
    '卡通片'=>(ceil(($static['卡通片']/$sum)*100))*2,
    '戰爭片'=>(ceil(($static['戰爭片']/$sum)*100))*2
];

$ratetmp=[];

foreach($rates as $type=>$rate){
    if($rate>0 && $rate <=20){
        $ratetmp[$type]='';
    }elseif($rate>20 && $rate <=40){
        $ratetmp[$type]='<i class="fas fa-star"></i>';
    }elseif($rate>40 && $rate <=60){
        $ratetmp[$type]='<i class="fas fa-star"></i> <i class="fas fa-star"></i>';
    }elseif($rate>60 && $rate <=80){
        $ratetmp[$type]='<i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>';
    }elseif($rate>80 && $rate <=100){
        $ratetmp[$type]='<i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>';
    };
}


?>
<div id="bb">

    <div style="width:100%;text-align:center;position:relative" class="mb-5">
        <h2 style="color: #fffa5c !important"><?= $m['name'] ?>喜歡的電影</h2>
    </div>
    <?php
    if ($m['heart'] == 0) {
        echo '<div style="text-align:center">尚未點選喜愛的電影喔</div>';
    } else {
    ?>

        <div style="display:flex" class="mt-5">

            <div class="col-6 mt-5">
                <div id="hearttitle" class="ms-3 mb-5">喜愛電影種類比例表</div>
                <div>
                    <div class="mb-2" style="display:inline-block;width:38%">愛情片 <?=(!empty($ratetmp['愛情片']))?$ratetmp['愛情片']:''?></div>
                    <div class="mb-2" style="display:inline-block;width:48%">喜劇片 <?=(!empty($ratetmp['喜劇片']))?$ratetmp['喜劇片']:''?></div>
                </div>
                <div>
                    <div class="mb-2" style="display:inline-block;width:38%">驚悚片 <?=(!empty($ratetmp['驚悚片']))?$ratetmp['驚悚片']:''?></div>
                    <div class="mb-2" style="display:inline-block;width:48%">恐怖片 <?=(!empty($ratetmp['恐怖片']))?$ratetmp['恐怖片']:''?></div>
                </div>
                <div>
                    <div class="mb-2" style="display:inline-block;width:38%">科幻片 <?=(!empty($ratetmp['科幻片']))?$ratetmp['科幻片']:''?></div>
                    <div class="mb-2" style="display:inline-block;width:48%">卡通片 <?=(!empty($ratetmp['卡通片']))?$ratetmp['卡通片']:''?></div>
                </div>
                <div>
                    <div class="mb-4" style="display:inline-block;width:100%">戰爭片 <?=(!empty($ratetmp['戰爭片']))?$ratetmp['戰爭片']:''?></div>
                </div>

<div style="width:100%;font-size: 100px;display: flex;justify-content:center;align-items:center;height: 450px;">
    <canvas id="memtype" width="400" height="280"></canvas>
</div>

            </div>

            <div class="col-6 mt-5">
                <div id="hearttitle" style="text-align:right" class="me-3 mb-3">已點選愛心的電影(<?=count($allhs)?>部)</div>

                <div style="display:flex;flex-wrap:wrap;min-height:632px">
                    <?php
                    $all = count($allhs);
                    $div = 4;
                    $pages = ceil($all / $div);
                    $now = ($_GET['p']) ?? '1';
                    $start = ($now - 1) * $div;
                    $hs = $Heart->q("SELECT * FROM `theater_heartlog`,`theater_movie` WHERE `theater_heartlog`.`movie_id`=`theater_movie`.`id` AND `theater_heartlog`.`mem_id`={$m['id']} limit $start,$div");
                    // print_r($hs);
                    foreach ($hs as $k => $h) {
                    ?>
                        <div class="imgblock m-2">
                            <img src="img/<?= $h['poster'] ?>">
                            <div class="mt-3"><?= $h['name_c'] ?>(<?= $h['name_e'] ?>)</div>
                            <img src="icon/like.png" class="heartimg" onclick="like(<?=$h['mem_id']?>,<?=$h['movie_id']?>)">
                        </div>
                    <?php } ?>

                </div>
                <div style="width:100%;position:relative" class="mt-4 mb-3">
                    <?php
                    if (($now - 1) > 0) {
                        echo '<a href="index.php?do=heart&mem='.($m['id']).'&p=' . ($now - 1) . '"><i class="fas fa-caret-left heartarrow left"></i></a>';
                    }
                    echo '<div style="width:20%;margin-left: auto;margin-right: auto;display: flex;justify-content: space-evenly;font-size: larger;">';
                    for ($i = 1; $i <= $pages; $i++) {
                        echo '<a href="index.php?do=heart&mem='.($m['id']).'&p=' . ($i) . '">' . ($i) . '</a>';
                    }
                    echo '</div>';
                    if (($now + 1) <= $pages) {
                        echo '<a href="index.php?do=heart&mem='.($m['id']).'&p=' . ($now + 1) . '"><i class="fas fa-caret-right heartarrow right"></i></a>';
                    }
                    ?>
                </div>
            </div>

        </div>

       



<script>
var ctx = document.getElementById('memtype').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['愛情片', '喜劇片', '驚悚片', '恐怖片', '科幻片', '卡通片', '戰爭片'],
        datasets: [{
            label: 'fav',
            data: [<?=$static['愛情片']?>, <?=$static['喜劇片']?>, <?=$static['驚悚片']?>, <?=$static['恐怖片']?>, <?=$static['科幻片']?>, <?=$static['卡通片']?>, <?=$static['戰爭片']?>],
            backgroundColor: [
                '#167549d6',
                '#4168a2ad',
                '#167549d6',
                '#4168a2ad',
                '#167549d6',
                '#4168a2ad',
                '#4168a2ad'
            ],
            borderWidth: 1
        }]
    },
    legend: {
        position: 'bottom'
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: <?=$sum?>,
                    stepSize: 1,
                    beginAtZero: false,
                    fontColor:'#fff',
                },
                gridLines:{
                    display:false,
                },

                type: 'linear'
            }],
            xAxes: [{
                ticks:{
                    fontColor:'#fff',
                    bottom:0,
                }
            }]
        }
    }
});








</script>










</div>
<?php
    } ?>