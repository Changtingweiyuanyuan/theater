<input type="button" value="新增電影" onclick="addMov()">
<hr>
<div style="max-height:450px;overflow:auto">
<?php
$ms=$Movie->all(' order by rank');
foreach($ms as $k=>$m){
?>

<div class="ct" style="display:flex;background:#ccc;">
    <div class="ct" style="width:20%">
    <img src="img/<?=$m['poster']?>" style="width:100%">
</div>
    <div class="ct" style="width:10%">
    分級:<img src="icon/<?=$m['level']?>">
</div>
    <div class="ct" style="width:70%">
        <table style="width:100%">
            <tr>
                <td style="width:33%">片名:<?=$m['name']?></td>
                <td style="width:33%">片長:<?=$m['length']?></td>
                <td style="width:33%">上映日期:<?=$m['ondate']?></td>
            </tr>
            <tr>
                <td>
                <?php
    if($k<count($ms)-1){
    ?>
    <input type="button" value="往下" onclick="sw(<?=$m['id']?>,<?=$ms[$k+1]['id']?>)">
    <?php
    }?>
    <?php
    if($k>0){
    ?>
    <input type="button" value="往上" onclick="sw(<?=$m['id']?>,<?=$ms[$k-1]['id']?>)">
    <?php
    }?>
                </td>
                <td>
                    <input type="button" value="<?=($m['sh']==1)?'隱藏':'顯示'?>" onclick="display(<?=$m['id']?>)">
                </td>
                <td>
                    <input type="button" value="編輯電影" onclick="op('#b<?=$k?>')">
                    <input type="button" value="刪除電影" onclick="del(<?=$m['id']?>)">
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:left">
                    劇情介紹:<?=$m['intro']?>
                </td>
            </tr>
        </table>
    </div>
</div>
<!-- block -->

<form action="api/editMov.php" method="post" enctype="multipart/form-data">

<div id="b<?=$k?>" style="display:none">
<table style="display:flex;background:#ccc;width:100%;text-align:left">
    <tr style="width:100%">
        <td style="width:25%">出版商</td>
        <td style="width:25%"><input type="text" name="publish" value="<?=$m['publish']?>"></td>
        <td style="width:25%">導演</td>
        <td style="width:25%"><input type="text" name="director" value="<?=$m['director']?>"></td>
    </tr>
    <tr>
        <td>片名</td>
        <td><input type="text" name="name" value="<?=$m['name']?>"></td>
        <td>片長</td>
        <td><input type="text" name="length" value="<?=$m['length']?>">
    <input type="hidden" name="id" value="<?=$m['id']?>"></td>
    </tr>
    <tr>
        <td>上映日期</td>
        <td>
        <select name="y" id="">
                <option value="2021" <?=($m['y']==2021)?'selected':''?>>2021</option>
                <option value="2022" <?=($m['y']==2022)?'selected':''?>>2022</option>
                    </select>
                    年
                    <select name="m" id="">
                        <?php
                        for($i=1;$i<=12;$i++){?>
                        <option value="<?=$i?>" <?=($m['m']==$i)?'selected':''?>><?=$i?></option>
                        <?php
                        }?>
                    </select>
                    月
                    <select name="d" id="">
                        <?php
                        for($i=1;$i<=31;$i++){?>
                        <option value="<?=$i?>" <?=($m['d']==$i)?'selected':''?>><?=$i?></option>
                        <?php
                        }?>
                    </select>
                        日
        </td>
        <td>預告片影片</td>
        <td><input type="file" name="tra"></td>
    </tr>
    <tr>
        <td>預告片海報</td>
        <td>
        <input type="file" name="poster">
        </td>
        <td>級數</td>
        <td>
            <select name="level" id="">
                <option value="普遍級.png" <?=($m['level']=='普遍級.png')?'selected':''?>>普遍級</option>
                <option value="輔導級.png" <?=($m['level']=='輔導級.png')?'selected':''?>>輔導級</option>
                <option value="保護級.png" <?=($m['level']=='保護級.png')?'selected':''?>>保護級</option>
                <option value="限制級.png" <?=($m['level']=='限制級.png')?'selected':''?>>限制級</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>電影簡介</td>
        <td colspan="3">
        <textarea name="intro" id="" cols="30" rows="10"><?=$m['intro']?></textarea>
        </td>
    </tr>
</table>


    <input type="submit" value="編輯確定"><input type="reset" value="重置">
    </div>
</form>
<!-- block -->
<?php
}?>
</>
<script>

    function del(Mid){
        $.post('api/delMov.php',{Mid},function(){
            location.reload();
        })
    }
    function display(Mid){
        $.post('api/display.php',{Mid},function(){
            location.reload();
        })
    }

    function addMov(){
        location.href="backend.php?do=addMov";
    }

    function op(block){
        $(block).fadeIn();
    }

    function sw(idx,idy){
    $.post('api/sw.php',{table:'movie',idx,idy},function(){
        location.reload();
    })
}
</script>