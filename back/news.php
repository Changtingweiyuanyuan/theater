

<style>
    .border {
        border: 1px #a159a6 dashed !important;
        border-radius: 5px;
        padding: 3px;
    }

    button[type=button] {
        position: absolute;
        right: 25px;
        top: 0px;
    }
    #editMovieButton .btn-primary{
        background-color: #51306e !important;
        border: none !important;
    }
    #newsAddarea{
        display:none;
        width:400px;
        margin:auto;
        border-radius: 10px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );
        box-shadow: 0 8px 32px 0 rgb(31 38 135 / 37%);
        backdrop-filter: blur( 6.5px );
        text-align: center;
    }
    #newsAddarea img{
        width: 115px;
        transform: rotate(315deg);
        position: absolute;
        top: -82px;
        right: -65px;
    }
    #newsAddarea .form-control{
        color: #198754;
    }
    .fa-file-upload:before{
        color: #ab8aad;
    font-size: 100px;
    }
    #newsAdd .btn-primary{
        background-color: #51306e !important;
        border: none !important;
    }
    #newsAddarea{
        display:none;
        width:600px;
        margin:auto;
        border-radius: 10px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );
        box-shadow: 0 8px 32px 0 rgb(31 38 135 / 37%);
        backdrop-filter: blur( 6.5px );
        text-align: center;
    }
    #newsAddarea img{
        width: 115px;
        transform: rotate(315deg);
        position: absolute;
        top: -82px;
        right: -65px;
    }
    #newsAddarea .form-control{
        color: #198754;
    }
    .revise{
        display: none;
        height:340px;
    }
</style>
<div id="bb">
<div style="width:100%;text-align:center;position:relative" class="mb-5">
    <h2 style="color: #fffa5c !important">最新消息管理</h2>
    <button type="button" class="btn btn-success" onclick="addCar()" id="addbutton">新增最新消息</button>
</div>

<form action="api/addNews.php" method="post">
    <div id="newsAddarea" class="p-5">
    <img src="icon/54897831.png">
    <div class="mb-5" style="color: white;text-align:right;background-color: #666666;-webkit-background-clip:text;text-shadow: rgb(255 255 255 / 50%) 0px 3px 3px;font-weight: bolder;">ADD NEWS</div>

    <div style="text-align:left;font-size:small;">標題</div>
    
    <input class="form-control mb-2" type="text" placeholder="TITLE" name="title">
    <div class="input-group mb-2">
        <span class="input-group-text">CONTENT</span>
        <textarea class="form-control" col="30" name="content"></textarea>
    </div>
    <div style="text-align:left;font-size:small;">小提醒</div>
    <input class="form-control" type="text" placeholder="TAGS" name="tags" style="color:#f35f5f !important">

    <div class="m-4">
        <input type="submit" class="btn btn-primary mb-2" style="background-color:#51306e;border:none;font-weight:bolder;" value="新增">
        <input type="button" onclick="closeAddarea()" style="background-color:#51306e;border:none;font-weight:bolder;" class="btn btn-primary mb-2" value="返回">
    </div>
    </div>
</form>


<div id="newsAdd">
<?php
// $frontNews=$News->all(['sh' => 1], " order by `date` desc limit 0,3");
$fn=[];
foreach($News->all(['sh' => 1], " order by `date` desc limit 0,3") as $k=>$f){
    array_push($fn,$f['id']);
}
// print_r($fn);
$ns=$News->all(" order by id desc");
foreach($ns as $k=>$n){
?>
<div id="new<?=$n['id']?>" style="height:340px">
<div style="display:flex;">
    <div class="p-3" style="width:80%;display:flex;flex-direction:column;">
        <div class="mb-3">
            <span class="border me-2" style="font-size:larger;font-weight:bolder;"><?=$n['title']?></span>
        </div>
        <div class="mb-2 ms-1">
            <span class="border" style="color:#fffa5c;font-weight:bolder;border:none !important;font-size:large;">內容</span>
        </div>
        <div class="ms-5">
            <span><?=nl2br($n['content'])?></span>
        </div>
        <div class="mb-2 ms-1">
            <span class="border" style="color:#fffa5c;font-weight:bolder;border:none !important;font-size:large;">tags</span>
        </div>
        <div class="ms-5">
            <span style="color:#f35f5f"><?=$n['tags']?></span>
        </div>
    </div>

    <div class="p-3 d-flex" style="width:20%;justify-content:space-evenly;align-items: center;">
        <input type="button" class="btn btn-primary" value="編輯" onclick="revise(<?=$n['id']?>)">
        <input type="button" class="btn btn-primary" style="background:<?=(in_array($n['id'],$fn))?'#105837 !important':''?>" value="<?= ($n['sh'] == 1) ? '隱藏' : '顯示' ?>" onclick="display(<?= $n['id'] ?>)">
        <input type="button" class="btn btn-primary" value="刪除" onclick="del(<?= $n['id'] ?>,'<?= $n['title'] ?>')">
    </div>

</div>
</div>
<!-- revise -->
<form action="api/reviseNews.php" method="post">
    <div id="newrevise<?=$n['id']?>" class="revise">
    <div style="display:flex;">
        <div class="p-3" style="width:80%;display:flex;flex-direction:column;">
            <div class="mb-3">
                <div style="text-align:left;font-size:small;">修改標題</div>
                <input class="form-control mb-2 border" style="color:#fffa5c;background:none" type="text" name="title" value="<?=$n['title']?>">
            </div>
            <div style="text-align:left;font-size:small;">修改內容</div>
            <div class="input-group mb-2">
                <span class="input-group-text" style="background-color:#ff000000 !important;color:white;border:1px #a159a6 dashed !important;">CONTENT</span>
                <textarea class="form-control" col="30" name="content" style="background-color:#ff000000;height:135px;border:1px #a159a6 dashed !important;color:#fffa5c"><?=$n['content']?></textarea>
            </div>
            <div class="mb-3">
                <div style="text-align:left;font-size:small;">修改tags</div>
                <input class="form-control mb-2 border" style="color:#f35f5f;background:none" type="text" name="tags" value="<?=$n['tags']?>">
            </div>
        </div>
<input type="hidden" name="id" value="<?=$n['id']?>">
        <div class="p-3 d-flex" style="width:20%;justify-content:space-evenly;align-items: center;">
            <input type="submit" class="btn btn-primary mb-2" style="background-color:#51306e;border:none;font-weight:bolder;" value="確定修改喔!">
            <input type="button" onclick="closerevisearea(<?=$n['id']?>)" style="background-color:#51306e;border:none;font-weight:bolder;" class="btn btn-primary mb-2" value="返回">
        </div>
    
    </div>
    </div>
</form>
<!-- revise -->
<hr>
<?php
}?>
</div>
</div>
<script>
function addCar(){
    $("#addbutton").fadeOut(300)
    $('#newsAdd').fadeOut(300,function(){
        $('#newsAddarea').fadeIn()
    })
}
function closeAddarea(){
    $('#newsAddarea').fadeOut(300,function(){
        $('#newsAdd').fadeIn()
        $("#addbutton").fadeIn()
    })
}
function revise(newsid){
    $("#new"+newsid).fadeOut(300,function(){
        $("#newrevise"+newsid).fadeIn(300)
    })
}
function closerevisearea(newsid){
    $("#newrevise"+newsid).fadeOut(300,function(){
        $("#new"+newsid).fadeIn(300)
    })
}

function del(Mid, name) {
            let del = confirm('確定要刪除 ' + name + ' 嗎?')
            if (del) {
                $.post('api/delMov.php', {table:'theater_news',Mid}, function() {
                    location.reload();
                })
            }
        }

        function display(Mid) {
            $.post('api/display.php', {table:'theater_news',Mid}, function(re) {
                // console.log(re)
                location.reload();
            })
        }

</script>