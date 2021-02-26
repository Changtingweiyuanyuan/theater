<!-- `id`, `name`, `img`, `rank`, `sh` -->
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
    #carAddarea{
        display:none;
        width:400px;
        margin:auto;
        border-radius: 10px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );
        box-shadow: 0 8px 32px 0 rgb(31 38 135 / 37%);
        backdrop-filter: blur( 6.5px );
        text-align: center;
    }
    #carAddarea img{
        width: 115px;
        transform: rotate(315deg);
        position: absolute;
        top: -82px;
        right: -65px;
    }
    #carAddarea .form-control{
        color: #198754;
    }
    .fa-file-upload:before{
        color: #ab8aad;
    font-size: 100px;
    }

</style>
<div id="bb">
<div style="width:100%;text-align:center;position:relative" class="mb-5">
    <h2 style="color: #fffa5c !important">輪播區圖片管理</h2>
    <button type="button" class="btn btn-success" onclick="addCar()" id="addbutton">新增輪播圖片</button>
</div>

<form action="api/addCar.php" method="post" enctype="multipart/form-data">
    <div id="carAddarea" class="p-5">
    <img src="icon/54897831.png">
    <i class="fas fa-file-upload m-3"></i>
    <div style="color:#fffa5c;text-align:right">圖片長寬限制:1920x500</div>
    <div class="mb-3">
        <label for="formFileMultiple" class="form-label"></label>
        <input class="form-control" type="file" id="formFileMultiple" name="img" multiple>
    </div>
    <input class="form-control" type="text" placeholder="檔案名稱" name="name">
    <div class="m-4">
        <input type="submit" class="btn btn-primary mb-2" style="background-color:#51306e;border:none;font-weight:bolder;" value="新增">
        <input type="button" onclick="closeAddarea()" style="background-color:#51306e;border:none;font-weight:bolder;" class="btn btn-primary mb-2" value="返回">
    </div>
    </div>
</form>

<div id="carArea">
<?php
$cs=$Car->all(" order by rank");
foreach($cs as $k=>$c){
?>
<div style="display:flex;height:180px">
    <div class="p-3" style="width:50%">
        <img src="img/<?=$c['img']?>" style="width:100%;height: -webkit-fill-available;border:1px white solid">
    </div>
    <div class="p-3" style="width:30%;display:flex;flex-direction:column;justify-content: space-evenly;">
        <div><span class="border me-2">圖片名稱</span><?=$c['name']?></div>
        <div><span class="border me-2">圖片路徑</span><?=$c['img']?></div>
    </div>

    <div class="p-3 d-flex" style="width:30%;flex-direction:column;justify-content:space-evenly;align-items: center;">
                <?php
                if ($k > 0) {
                ?>
                    <i style="cursor:pointer;font-size:larger;" class="fas fa-angle-double-up" onclick="sw(<?= $c['id'] ?>,<?= $cs[$k - 1]['id'] ?>)"></i>
                <?php
                } ?>
                <div class="text-center" id="editMovieButton" style="display: grid;">
                    <input type="button" class="btn btn-primary mb-2" value="<?= ($c['sh'] == 1) ? '隱藏' : '顯示' ?>" onclick="display(<?= $c['id'] ?>)">
                    <input type="button" class="btn btn-primary" value="刪除" onclick="del(<?= $c['id'] ?>,'<?= $c['name'] ?>')">
                </div>
                <?php
                if ($k < count($cs) - 1) {
                ?>
                    <i style="cursor:pointer;font-size:larger;" class="fas fa-angle-double-down" onclick="sw(<?= $c['id'] ?>,<?= $cs[$k + 1]['id'] ?>)"></i>
                <?php
                } ?>
    </div>

</div>
<?php
}?>
</div>
</div>

<script>
function addCar(){
    $("#addbutton").fadeOut(500)
    $('#carArea').fadeOut(500,function(){
        $('#carAddarea').fadeIn()
    })
}
function closeAddarea(){
    $('#carAddarea').fadeOut(500,function(){
        $('#carArea').fadeIn()
        $("#addbutton").fadeIn()
    })
}


function del(Mid, name) {
            let del = confirm('確定要刪除 ' + name + ' 嗎?')
            if (del) {
                $.post('api/delMov.php', {table:'theater_carousel',Mid}, function() {
                    location.reload();
                })
            }
        }

        function display(Mid) {
            $.post('api/display.php', {table:'theater_carousel',Mid}, function(re) {
                // console.log(re)
                location.reload();
            })
        }
        function sw(idx, idy) {
            $.post('api/sw.php', {
                table: 'theater_carousel',
                idx,
                idy
            }, function() {
                location.reload();
            })
        }
</script>