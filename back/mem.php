<!-- `id`, `acc`, `pw`, `name`, `email`, `tel`, `heart`, `buycart`, `status` -->
<style>
    #memarea .btn-primary{
        background-color: #51306e !important;
        border: none !important;
    }
    #memarea .border{
        color:#25c179;
        font-weight:bolder;
        border:none !important;
        font-size:large;
    }
    .orderTitle{
        position: relative;
        top: -25px;
        left: 25px;
        font-weight: 100;
        font-size: medium;

    }
    #orderli{
        width: fit-content;
        height: 40px;
    }
    #orderli span{
        background: #fffa5cd4;
        border-radius: 40px;
        color: black;
        font-size: smaller;
    }
    .memOrderblock{
        display: none;
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
<div id="bb">
<div style="width:100%;text-align:center;position:relative" class="mb-5">
    <h2 style="color: #fffa5c !important">會員管理</h2>
</div>

<div id="memarea">
<?php
$all = $Mem->count();
$div = 3;
$pages = ceil($all / $div);
$now = ($_GET['p']) ?? '1';
$start = ($now - 1) * $div;
$ms=$Mem->all(" limit  $start,$div");
foreach($ms as $k=>$m){
?>
<div style="display:flex;">
    <div class="p-3" style="width:30%;display:flex;flex-direction:column;">
        <div class="mb-1 ms-1">
            <span class="border">會員姓名</span>
        </div>
        <div class="ms-4 mb-2">
            <span><?=$m['name']?></span>
        </div>
        <div class="mb-1 ms-1">
            <span class="border">會員帳號</span>
        </div>
        <div class="ms-4 mb-2">
            <span><?=$m['acc']?></span>
        </div>
        <div class="mb-1 ms-1">
            <span class="border">電話</span>
        </div>
        <div class="ms-4 mb-2">
            <span><?=$m['tel']?></span>
        </div>
        <div class="mb-1 ms-1">
            <span class="border">e-mail</span>
        </div>
        <div class="ms-4 mb-2">
            <span><?=$m['email']?></span>
        </div>
    </div>

    <div class="p-3" style="width:30%;display:flex;flex-direction:column;">
        <div class="mb-1 ms-1">
            <span class="border">最新訂票日期</span>
        </div>
        <div class="ms-4 mb-2">
            <span>
                <?php
                ini_set('display_errors','off');
                $order=$Order->q("SELECT `orderdate` FROM `theater_order` WHERE `mem`='{$m['id']}' order by `orderdate` desc limit 0,1")[0][0];
                ini_set('display_errors','on');
                // var_dump($order);
                if($order!=NULL){
                    echo $order;
                }else{
                    echo '無';
                }
                ?>
            </span>
        </div>
        <div class="mb-1 ms-1">
            <span class="border">已點愛心次數</span>
        </div>
        <div class="ms-4 mb-2">
            <span><?=($m['heart'])?></span>
        </div>
        <div class="mb-1 ms-1">
            <span class="border">會員狀態</span>
        </div>
        <div class="ms-4 mb-2">
            <span id="memStatus"<?=($m['status']==1?'':'style="color:#ff3447"')?>><?=($m['status']==1)?'會員表現良好':'目前黑名單中'?></span>
        </div>
    </div>

    <div class="p-3 d-flex" style="width:40%;;align-items: flex-end;">
        <input id="op<?=$m['id']?>" type="button" class="btn btn-primary me-3" value="列出所有訂單" onclick="oporder(<?=$m['id']?>)">
<?php
if($m['status']==1){
?>
        <input id="blockade<?=$m['id']?>" type="button" class="btn btn-primary" style="background:#0b0c0cba !important" value="黑名單此會員" onclick="blockade(<?=$m['id']?>)">
<?php
}else{
?>
        <input id="blockade<?=$m['id']?>" type="button" class="btn btn-primary" style="background:#842029b3 !important" value="解除黑名單" onclick="blockade(<?=$m['id']?>)">
<?php
}
?>   
    </div>
</div>

<div class="m-5 p-3 memOrderblock" style="background:#6c757d61;border-radius:5px;" id="memOrderblock<?=$m['id']?>">
<?php
        $morders=$Order->q("SELECT * FROM `theater_order` WHERE `mem`='{$m['id']}' order by `orderdate` desc");
        // print_r($morders);
        if(!empty($morders)){
            foreach($morders as $k=>$o){
                // `id`, `num`, `mem`, `movie`, `moviedate`, `session`, `orderdate`, `seat`, `qt`, `food`, `money`
                $seats=unserialize($o['seat']);
                $tmp=[];
                foreach($seats as $s){
                    array_push($tmp,$seattable[$s]);
                }
                $tmp=implode("、",$tmp);
                // print_r($tmp);
                ?>
            <div class="mb-4" id="orderli">
                <span class="p-1"><?=$o['orderdate']?></span>
            </div>
            <div style="display:flex;flex-wrap:nowrap;width:100%;" class="mb-3">
                <div style="font-size:medium;width:25%;font-weight:bold;color:#f37a7a;"><span class="me-2 orderTitle">訂單編號</span><?=$o['num']?></div>
                <div style="font-size:medium;width:25%;font-weight:bold;"><span class="me-2 orderTitle">訂單金額</span><?=$o['money']?></div>
            </div>

            <div style="display:flex;flex-wrap:nowrap;width:100%;">
                <div style="font-size:medium;width:25%;font-weight:bold;"><span class="me-2 orderTitle">電影</span><?=$o['movie']?></div>
                <div style="font-size:medium;width:25%;font-weight:bold;"><span class="me-2 orderTitle">日期</span><?=$o['moviedate']?></div>
                <div style="font-size:medium;width:25%;font-weight:bold;"><span class="me-2 orderTitle">開演時間</span><?=$sess[$o['session']]?></div>
                <div style="font-size:medium;width:25%;font-weight:bold;"><span class="me-2 orderTitle">座位</span><?=$o['qt']?>位(<?=$tmp?>)</div>
            </div>
<?php
if($k!=count($morders)-1){echo "<div class='mt-3 mb-3' style='width:100%;background:black;height:1px;'></div>";}
            }
        }else{
            echo "<div style='text-align:center'>此會員無訂單資料</div>";
        }
?>
</div>

<hr>
<?php
}?>

</div>





<div style="width:100%;position:relative" class="mt-4 mb-3">
<?php
if (($now - 1) > 0) {
    echo '<a href="backend.php?do=mem&p=' . ($now - 1) . '"><i class="fas fa-caret-left heartarrow left"></i></a>';
}
echo '<div style="width:20%;margin-left: auto;margin-right: auto;display: flex;justify-content: space-evenly;font-size: larger;">';
for ($i = 1; $i <= $pages; $i++) {
    echo '<a href="backend.php?do=mem&p=' . ($i) . '">' . ($i) . '</a>';
}
echo '</div>';
if (($now + 1) <= $pages) {
    echo '<a href="backend.php?do=mem&p=' . ($now + 1) . '"><i class="fas fa-caret-right heartarrow right"></i></a>';
}
?>
</div>






</div>

<script>

    function oporder(memid){
        $("#memOrderblock"+memid).slideDown(300);
        $("#op"+memid).fadeOut(300,function(){
            $("#blockade"+memid).before(`<input type="button" id="clo`+memid+`" class="btn btn-primary me-3 clo" value="關閉訂單資訊" onclick="cloorder(`+memid+`)">`);
        });
        
    }
    function cloorder(memid){
        $("#memOrderblock"+memid).slideUp(300);
        $(".clo").fadeOut(0,function(){
            $("#op"+memid).fadeIn(300)
        });

    }

    function blockade(memid){
        $.post('api/blockade.php',{memid},function(){

            location.reload()
        })
    }

</script>