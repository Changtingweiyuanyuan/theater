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
                    <div class="mb-2" style="display:inline-block;width:38%">愛情片</div>
                    <div class="mb-2" style="display:inline-block;width:48%">喜劇片</div>
                </div>
                <div>
                    <div class="mb-2" style="display:inline-block;width:38%">驚悚片</div>
                    <div class="mb-2" style="display:inline-block;width:48%">恐怖片</div>
                </div>
                <div>
                    <div class="mb-2" style="display:inline-block;width:38%">科幻片</div>
                    <div class="mb-2" style="display:inline-block;width:48%">卡通片</div>
                </div>
                <div>
                    <div class="mb-2" style="display:inline-block;width:38%">戰爭片</div>
                    <div class="mb-2" style="display:inline-block;width:48%"></div>
                </div>

<div style="width:100%;font-size: 100px;display: flex;justify-content:center;align-items:center;height: 450px;">套件區</div>

            </div>

            <div class="col-6 mt-5">
                <div id="hearttitle" style="text-align:right" class="me-3 mb-3">已點選愛心的電影</div>

                <div style="display:flex;flex-wrap:wrap;min-height:632px">
                    <?php

                    $allhs = $Heart->q("SELECT * FROM `theater_heartlog`,`theater_movie` WHERE `theater_heartlog`.`movie_id`=`theater_movie`.`id`");
                    $all = count($allhs);
                    $div = 4;
                    $pages = ceil($all / $div);
                    $now = ($_GET['p']) ?? '1';
                    $start = ($now - 1) * $div;
                    $hs = $Heart->q("SELECT * FROM `theater_heartlog`,`theater_movie` WHERE `theater_heartlog`.`movie_id`=`theater_movie`.`id` limit $start,$div");
                    // print_r($ms);
                    foreach ($hs as $k => $h) {
                    ?>
                        <div class="imgblock m-2">
                            <img src="img/<?= $h['poster'] ?>">
                            <div class="mt-3"><?= $h['name_c'] ?>(<?= $h['name_e'] ?>)</div>
                            <img src="icon/like.png" class="heartimg">
                        </div>
                    <?php } ?>

                </div>
                <div style="width:100%;position:relative" class="mt-4 mb-3">
                    <?php
                    if (($now - 1) > 0) {
                        echo '<a href="index.php?do=heart&mem='.($h['mem_id']).'&p=' . ($now - 1) . '"><i class="fas fa-caret-left heartarrow left"></i></a>';
                    }
                    echo '<div style="width:20%;margin-left: auto;margin-right: auto;display: flex;justify-content: space-evenly;font-size: larger;">';
                    for ($i = 1; $i <= $pages; $i++) {
                        echo '<a href="index.php?do=news&p=' . ($i) . '">' . ($i) . '</a>';
                    }
                    echo '</div>';
                    if (($now + 1) <= $pages) {
                        echo '<a href="index.php?do=heart&mem='.($h['mem_id']).'&p=' . ($now + 1) . '"><i class="fas fa-caret-right heartarrow right"></i></a>';
                    }
                    ?>
                </div>
            </div>

        </div>





<!-- 星星計算 -->
<?php
// print_r($allhs);
    $tmp=[];
    foreach($allhs as $k=>$hh){
        $type=unserialize($hh['movie_type']);
        array_push($tmp,$type);
    }
    print_r($tmp);
?>













</div>
<?php
    } ?>