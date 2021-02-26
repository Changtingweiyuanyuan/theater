<!-- `id`, `num`, `mem`, `movie`, `moviedate`, `session`, `orderdate`, `seat`, `qt`, `food`, `money`, `ordertime` -->

<style>
    #type{
        font-weight: 900;
        color: black;
        background-color: #5dd19ccc;
        background-color: #fffa5caa;
        border: none;
        width:250px;
    }
    button[type=button] {
        position: absolute;
        right: 25px;
        top: 0px;
    }
    .border {
        border: 1px #a159a6 dashed !important;
        border-radius: 5px;
        padding: 3px;
    }
    #editMovieButton .btn-primary{
        background-color: #51306e !important;
        border: none !important;
    }

    #orderblock .btn-primary{
        background-color: #51306e !important;
        border: none !important;
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
    .littleTag{
        color:#ff3447;
        position:absolute;
        bottom:0;
        font-size: smaller;
    }
</style>

<div style="width:100%;text-align:center;position:relative" class="mb-5">
    <h2 style="color: #fffa5c !important">訂單管理</h2>
</div>

<div style="width:100%;text-align:-webkit-right" class="m-3 mb-5">
<select id="type" class="form-select movieselect">
    <option value="bydate_month" <?=(isset($_GET['ordertype']) && $_GET['ordertype']=='bydate_month')?'selected':''?>>按照訂單日期排序(近三個月)</option>
    <option value="bydate_all" <?=(isset($_GET['ordertype']) && $_GET['ordertype']=='bydate_all')?'selected':''?>>按照訂單日期排序(全部訂單)</option>
</select>
</div>


<div id="orderblock">
<?php
$thismonth=date('Y-m');
$lastmonth=date('Y-m',strtotime("-1months",strtotime($thismonth)));
$themonthbeforelast=date('Y-m',strtotime("-2months",strtotime($thismonth)));
// echo $thismonth,$lastmonth,$themonthbeforelast;

if(isset($_SESSION['ordertypeSQL'])){
    // print_r($_SESSION['ordertypeSQL']);
    $allorders=$Order->all($_SESSION['ordertypeSQL']);
    unset($_SESSION['ordertypeSQL']);
}else{
    $allorders=$Order->all(" where `orderdate` like '{$thismonth}%' or `orderdate` like '{$lastmonth}%' or `orderdate` like '{$themonthbeforelast}%' order by `orderdate` and `ordertime`");
}
foreach($allorders as $k=>$o){
//food
if($o['food']!=NULL && is_array($o['food'])){
    $tmp=[];
    $ff=unserialize($o['food']);
    foreach($ff as $k=>$f){
        array_push($tmp,$food[$s]);
    }
    $foods=implode("、",$tmp);
}

?>
<div class="mb-2" id="orderli">
    <span class="p-1">訂單編號:<b style="color:red"><?=$o['num']?></b></span>
</div>

<div style="height:180px;display:flex">
    <div class="p-3" style="width:80%;display:flex;flex-direction:column;">

        <div class="mb-1 ms-1">
            <span style="padding:3px;color:#25c179;font-weight:bolder;important;font-size:large;">訂購資訊</span>
        </div>

        <div style="width:100%;display:flex;" class="mb-2">
            <div class="ms-5" style="width:35%;">
                <span class="border me-2">會員帳號</span><?=$Mem->find($o['mem'])['acc']?>
            </div>
            <div style="width:65%">
                <span class="border me-2">訂購時間</span><?=$o['orderdate']?> <?=$o['ordertime']?>
            </div>
        </div>

        <div class="mb-1 ms-1">
            <span style="padding:3px;color:#25c179;font-weight:bolder;important;font-size:large;">電影資訊</span>
        </div>

        <div style="width:100%;display:flex;" class="mb-2">
            <div class="ms-5" style="width:33%;">
                <span class="border me-2">電影名稱</span><?=$o['movie']?>
            </div>
            <div class="ms-5" style="width:33%;">
                <span class="border me-2">日期</span><?=$o['moviedate']?>
            </div>
            <div style="width:33%">
                <span class="border me-2">場次</span><?=$sess[$o['session']]?>
            </div>
        </div>

        <div style="width:100%;display:flex;">
            <div class="ms-5" style="width:33%;">
                <span class="border me-2">座位</span>
                <?php
                    $tmp=[];
                    foreach(unserialize($o['seat']) as $k=>$s){
                        array_push($tmp,$seattable[$s]);
                    }
                    $seat=implode("、",$tmp);
                    echo $seat;
                    echo ' 共'.$o['qt'].'位';
                ?>
            </div>
            <div class="ms-5" style="width:33%;">
                <span class="border me-2">加點餐點</span><?=(isset($foods))?"{$foods}":"無加點餐飲"?>
            </div>
            <div style="width:33%">
                <span class="border me-2">金額</span><?=$o['money']?>
            </div>
        </div>

    </div>

    <div class="d-flex" style="width:20%;justify-content:center;align-items:center;height:100%;position:relative">
        <input type="button" class="btn btn-primary" value="刪除此筆訂單" onclick="del(<?= $o['id'] ?>,'<?= $o['num'] ?>')">
        <span class="littleTag">#不得修改訂單資料</span>
    </div>

</div>

<hr>
<?php
}?>
</div>
<script>

$('#type').on('change',function(){
    let type=$(this).val()
    console.log(type)
    $.post('api/orderchange.php',{type},function(ordertype){
        console.log(ordertype)
        location.href="backend.php?do=order&ordertype="+ordertype;
})
})

function del(Mid, num) {
    let del = confirm('確定要刪除編號 ' + num + ' 訂單嗎?')
    if (del) {
        $.post('api/delMov.php', {table:'theater_order',Mid}, function() {
            location.reload();
        })
    }
}

</script>