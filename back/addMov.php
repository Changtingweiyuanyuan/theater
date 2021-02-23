<div class="ct"><h2>新增電影</h2></div>

<form action="api/addMov.php" method="post" enctype="multipart/form-data">

<table style="display:flex;background:#ccc;width:100%;text-align:left">
    <tr style="width:100%">
        <td style="width:25%">出版商</td>
        <td style="width:25%"><input type="text" name="publish"></td>
        <td style="width:25%">導演</td>
        <td style="width:25%"><input type="text" name="director"></td>
    </tr>
    <tr>
        <td>片名</td>
        <td><input type="text" name="name"></td>
        <td>片長</td>
        <td><input type="text" name="length"></td>
    </tr>
    <tr>
        <td>上映日期</td>
        <td>
        <select name="y" id="">
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                    </select>
                    年
                    <select name="m" id="">
                        <?php
                        for($i=1;$i<=12;$i++){?>
                        <option value="<?=$i?>"><?=$i?></option>
                        <?php
                        }?>
                    </select>
                    月
                    <select name="d" id="">
                        <?php
                        for($i=1;$i<=31;$i++){?>
                        <option value="<?=$i?>"><?=$i?></option>
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
                <option value="普遍級.png">普遍級</option>
                <option value="輔導級.png">輔導級</option>
                <option value="保護級.png">保護級</option>
                <option value="限制級.png">限制級</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>電影簡介</td>
        <td colspan="3">
        <textarea name="intro" id="" cols="30" rows="10"></textarea>
        </td>
    </tr>
</table>


    <input type="submit" value="新增電影"><input type="reset" value="重置">
</form>