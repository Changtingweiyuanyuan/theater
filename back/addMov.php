<style>
    #addMovie{
        width:700px;
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
    }
</style>
<!-- `name_c`, `name_e`, `length`, `level`, `type`, `ondate`, `actor`, `poster`, `background`, `trailer`, `intro`, `sh`, `rank`, `heart` -->
<!-- <form action="" method="post" enctype="multipart/form-data"> -->
    <div id="addMovie" class="p-5">
    <img src="icon/54897831.png">
    <div class="mb-5" style="color: white;text-align:right;background-color: #666666;-webkit-background-clip:text;text-shadow: rgb(255 255 255 / 50%) 0px 3px 3px;font-weight: bolder;">ADD MOVIE</div>
    <i class="fas fa-film"></i>
    <div style="color:#fffa5c;text-align:right">圖片長寬限制:1920x500</div>
    <div class="mb-3">
        <label for="formFileMultiple" class="form-label"></label>
        <input class="form-control" type="file" id="formFileMultiple" name="img" multiple>
    </div>
    <input class="form-control" type="text" placeholder="檔案名稱" name="name">
    <div class="m-4">
        <input type="submit" class="btn btn-primary mb-2" style="background-color:#51306e;border:none;font-weight:bolder;" value="新增">
        <input type="button" onclick="javascript:history.go(-1)" style="background-color:#51306e;border:none;font-weight:bolder;" class="btn btn-primary mb-2" value="返回">
    </div>
    </div>
<!-- </form> -->
