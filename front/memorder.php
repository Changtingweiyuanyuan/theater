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
</style>
<div id="bb">
<div style="width:100%;text-align:center;position:relative" class="mb-5">
    <h2 style="color: #fffa5c !important"><?=$m['name']?> 的近期訂單</h2>
</div>

<div id="memarea">
<?php
$m=$Mem->find($_GET['mem']);
?>
<div style="display:flex;width:90%;margin-left:auto;margin-right:auto;">
    <div class="p-3" style="width:30%;display:flex;flex-direction:column;">
        <div class="mb-1 ms-2">
            <span class="border">會員姓名</span>
        </div>
        <div class="ms-5 mb-2">
            <span><?=$m['name']?></span>
        </div>
        <div class="mb-1 ms-2">
            <span class="border">會員帳號</span>
        </div>
        <div class="ms-5 mb-2">
            <span><?=$m['acc']?></span>
        </div>
        <div class="mb-1 ms-2">
            <span class="border">電話</span>
        </div>
        <div class="ms-5 mb-2">
            <span><?=$m['tel']?></span>
        </div>
        <div class="mb-1 ms-2">
            <span class="border">e-mail</span>
        </div>
        <div class="ms-5 mb-2">
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
                    echo '近三個月內無訂票紀錄';
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
        
    </div>

    <div class="p-3 d-flex" style="width:40%;;align-items: flex-end;">
        <input id="op<?=$m['id']?>" type="button" class="btn btn-primary me-3" value="列出訂單" onclick="oporder(<?=$m['id']?>)"><span style="font-size:medium;color:#dbd858;"> # 近三個月內所有訂單</span>
    </div>
</div>

<div class="m-5 p-3 memOrderblock" style="background:#6c757d61;border-radius:5px;" id="memOrderblock<?=$m['id']?>">
<?php
$thismonth=date('Y-m');
$lastmonth=date('Y-m',strtotime("-1months",strtotime($thismonth)));
$themonthbeforelast=date('Y-m',strtotime("-2months",strtotime($thismonth)));
        $morders=$Order->all(" where `mem`='{$m['id']}' and `orderdate` like '{$thismonth}%' or `orderdate` like '{$lastmonth}%' or `orderdate` like '{$themonthbeforelast}%' order by `orderdate` and `ordertime`");
        if(!empty($morders)){
            foreach($morders as $k=>$o){
                $seats=unserialize($o['seat']);
                $tmp=[];
                foreach($seats as $s){
                    array_push($tmp,$seattable[$s]);
                }
                $tmp=implode("、",$tmp);
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

</div>
</div>
<script>

    function oporder(memid){
        $("#memOrderblock"+memid).slideToggle(300);
        if($("#op"+memid).val()=='列出訂單'){
            $("#op"+memid).val(`關閉訂單`)
        }else if($("#op"+memid).val()=='關閉訂單'){
            $("#op"+memid).val(`列出訂單`)
        }
        
    }
    function cloorder(memid){
        $("#memOrderblock"+memid).slideUp(300);
        $(".clo").fadeOut(0,function(){
            $("#op"+memid).fadeIn(300)
        });

    }
</script>