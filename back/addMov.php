<style>
    #addMovie{
        width:800px;
        margin:auto;
        border-radius: 10px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );
        box-shadow: 0 8px 32px 0 rgb(31 38 135 / 37%);
        backdrop-filter: blur( 6.5px );
        text-align: center;
    }
    #addMovie img{
        width: 115px;
        transform: rotate(315deg);
        position: absolute;
        top: -82px;
        right: -65px;
    }
    #addMovie .form-control{
        color: #198754;
    }
    .fa-film{
        color: #ab8aad;
        font-size: 50px;
        position: absolute;
        top: 35px;
        right: 155px;
    }
    #level{
        color: #fff;
        background-color: #6a3b6d70;
        border: none;
    }
</style>
<!-- `name_c`, `name_e`, `length`, `level`, `type`, `ondate`, `actor`, `poster`, `background`, `trailer`, `intro`, `sh`, `rank`, `heart` -->

<form action="api/saveMov.php" method="post" enctype="multipart/form-data">
    <div id="addMovie" class="p-5">
    <img src="icon/54897831.png">
    <div class="mb-5" style="color: white;text-align:right;background-color: #666666;-webkit-background-clip:text;text-shadow: rgb(255 255 255 / 50%) 0px 3px 3px;font-weight: bolder;">ADD MOVIE</div>
    <i class="fas fa-film"></i>
    <div style="color:#fffa5c;text-align:right">電影海報長寬限制:758x1080</div>
    <div style="color:#fffa5c;text-align:right" class="mb-5">簡介區背景長寬限制:800x533</div>

<div style="display:flex;flex-wrap:wrap">
    <div class="me-5" style="text-align:left;font-size:small;width:30%">電影名稱(中文)</div>
    <div class="me-5" style="text-align:left;font-size:small;width:25%">電影名稱(英文)</div>
    <div style="text-align:left;font-size:small;width:30%">上映日期</div>

    
    <input class="form-control mb-2 me-5" type="text" name="name_c" style="width:30%">
    <input class="form-control mb-2 me-5" type="text" name="name_e" style="width:25%">
    <input class="form-control mb-2" type="date" name="ondate" style="width:30%">

    <div class="me-4" style="text-align:left;font-size:small;width:20%">電影級別</div>
    <div class="me-4" style="text-align:left;font-size:small;width:10%">電影片長</div>
    <div style="text-align:left;font-size:small;width:63%">演員</div>


<select id="level" name="level" class="form-select mb-2 me-4" style="width:20%">
    <option value="普遍級">普遍級</option>
    <option value="保護級">保護級</option>
    <option value="輔導級">輔導級</option>
    <option value="限制級">限制級</option>
</select>
<input class="form-control mb-2 me-4" placeholder="min." type="text" name="length" style="width:10%">
<input class="form-control mb-2" type="text" name="actor" style="width:63%">




    <div style="text-align:left;font-size:small;width:100%">電影類型</div>
    <div style="width:100%;text-align:left" class="mb-2">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="type[]" value="<?=$type[1]?>">
            <label class="form-check-label" for="inlineCheckbox1">愛情片</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="type[]" value="<?=$type[2]?>">
            <label class="form-check-label" for="inlineCheckbox2">喜劇片</label>
        </div>  
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="type[]" value="<?=$type[3]?>">
            <label class="form-check-label" for="inlineCheckbox2">驚悚片</label>
        </div>  
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="type[]" value="<?=$type[4]?>">
            <label class="form-check-label" for="inlineCheckbox2">恐怖片</label>
        </div>  
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="type[]" value="<?=$type[5]?>">
            <label class="form-check-label" for="inlineCheckbox2">科幻片</label>
        </div>  
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="type[]" value="<?=$type[6]?>">
            <label class="form-check-label" for="inlineCheckbox2">卡通片</label>
        </div>  
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="type[]" value="<?=$type[7]?>">
            <label class="form-check-label" for="inlineCheckbox2">戰爭片</label>
        </div>  
    </div>

    <div style="text-align:left;font-size:small;width:45%" class="me-5" >電影海報</div>
    <div style="text-align:left;font-size:small;width:45%">簡介區背景圖片</div>

    <div class="mb-2 me-5" style="width:45%">
        <label for="formFileMultiple" class="form-label"></label>
        <input class="form-control" type="file" name="poster" multiple>
    </div>
    <div class="mb-2" style="width:45%">
        <label for="formFileMultiple" class="form-label"></label>
        <input class="form-control" type="file" name="background" multiple>
    </div>
    
    <div style="text-align:left;font-size:small;width:100%">電影簡介</div>
    <div class="input-group mb-2" style="min-height:120px !important">
        <span class="input-group-text">CONTENT</span>
        <textarea class="form-control" col="30" name="intro" style="min-height:120px !important"></textarea>
    </div>

    <div class="m-4">
        <input type="submit" class="btn btn-primary mb-2" style="background-color:#51306e;border:none;font-weight:bolder;" value="新增">
        <input type="button" onclick="javascript:history.go(-1)" style="background-color:#51306e;border:none;font-weight:bolder;" class="btn btn-primary mb-2" value="返回">
    </div>
</div>

    </div>
</form>
