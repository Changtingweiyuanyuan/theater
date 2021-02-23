<div class="ct"><h2>預告片清單</h2></div>
<div class="ct" style="display:flex">
    <div class="ct" style="width:25%">預告片海報</div>
    <div class="ct" style="width:25%">預告片片名</div>
    <div class="ct" style="width:25%">預告片排序</div>
    <div class="ct" style="width:25%">操作</div>
</div>
<?php
$ps=$Pos->all(" order by rank");
foreach($ps as $k=>$p){
?>
<div class="ct" style="display:flex;align-items:center">
    <div class="ct" style="width:25%">
    <img src="img/<?=$p['img']?>" style="width:60px">
    </div>
    <div class="ct" style="width:25%">
    <input type="text" value="<?=$p['name']?>" name="name[]">
    </div>
    <div class="ct" style="width:25%">
    <?php
    if($k<count($ps)-1){
    ?>
    <input type="button" value="往下" onclick="sw(<?=$p['id']?>,<?=$ps[$k+1]['id']?>)">
    <?php
    }?>
    <?php
    if($k>0){
    ?>
    <input type="button" value="往上" onclick="sw(<?=$p['id']?>,<?=$ps[$k-1]['id']?>)">
    <?php
    }?>
    </div>
    <div class="ct" style="width:25%">
    <input type="checkbox" name="sh[]" value="<?=$p['id']?>"<?=($p['sh']==1)?'checked':''?>>顯示
    <input type="checkbox" name="del[]" value="<?=$p['id']?>">刪除
    <input type="hidden" name="id[]" value="<?=$p['id']?>">
    <select name="ani[]">
        <option value="1" <?=($p['ani']==1)?'selected':''?>>滑入滑出</option>
        <option value="2" <?=($p['ani']==2)?'selected':''?>>淡入淡出</option>
        <option value="3" <?=($p['ani']==3)?'selected':''?>>縮放</option>
    </select>
    </div>
</div>
<?php
}?>
<div class="ct"><input type="submit" value="確定編輯"> <input type="reset" value="重置"></div>


<hr>
<form action="api/addPos.php" method="post" enctype="multipart/form-data">
    
    <div class="ct"><h2>新增預告片海報</h2></div>
    <div class="ct" style="display:flex">
        <div class="ct" style="width:50%">預告片海報:
        <input type="file" name="img">
        </div>
        <div class="ct" style="width:50%">預告片片名:
        <input type="text" name="name">
        </div>
    </div>
    
    <div class="ct"><input type="submit" value="新增"> <input type="reset" value="重置"></div>
</form>


<script>
function sw(idx,idy){
    $.post('api/sw.php',{table:'poster',idx,idy},function(){
        location.reload();
    })
}
</script>