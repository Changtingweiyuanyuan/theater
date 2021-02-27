<style>
    .btn{
        color: #fff;
        background-color: #157347;
        border-color: #146c43;
        font-weight: bolder;
        font-size: larger;
        padding: 5px;
    }
    .btn:hover{
        color:#fffa5c !important
    }
    .orderblock .dropdown{
        background: #fdf982bf;
        font-weight: bolder;
        border: none;
    }
</style>
<?php
$movie=($_GET['id'])??'all';
// $m=$Movie->find($_GET['id']);
?>
<div id="bb">
<div style="width:100%;text-align:center;"><h2 style="color: #fffa5c !important">訂票看電影囉!</h2></div>
<hr>
<form action="index.php?do=booking" method="post">
<div style="width:100%;display:flex;align-items:center;flex-direction:column" class="mt-5 orderblock">
<div>
    <div style="width:15%" class="mt-4">電影</div>
    <div style="width:460px;" class="mt-2">
        <select class="form-select dropdown" name="movie" id="movie" onchange="getDays()"></select>
    </div>
</div>
<div>
    <div style="width:15%" class="mt-4">日期</div>
    <div style="width:460px;" class="mt-2">
        <select class="form-select dropdown" name="date" id="date" onchange="getSession()"></select>
    </div>
</div>
<div>
    
    <div style="width:15%" class="mt-4">場次</div>
    <div style="width:460px;" class="mt-2">
        <select class="form-select dropdown" name="session" id="session"></select>
    </div>
</div>


</div>
<div class="mt-5" style="width:100%;display:flex;justify-content:center">
    <input type="submit" value="確定" onclick="booking()" class="btn me-2">
    <button type="reset" class="btn ms-2">重置</button>
</div>
</form>
</div>
<script>

getM('<?=$movie?>');

    function getM(type){
        $.post('api/getM.php',{type},function(re){
            // console.log(re)
            $("#movie").html(re);
            getDays()
        })
    }

function getDays(){
    let m=$("#movie").val();
    let getdate;
    getdate='<?=($_GET['date'])??'';?>';
    console.log(getdate);
    $.post('api/getD.php',{m,getdate},function(re){
            // console.log(re)
            $("#date").html(re);
            getSession();
        })
}
function getSession(){
    console.log(1321313)
    let m=$("#movie").val();
    let d=$("#date").val();
    // console.log(d);
    $.post('api/getS.php',{m,d},function(re){
            // console.log(re)
            $("#session").html(re);
        })
}

// function booking(){
//     let m=$("#movie").val();
//     let d=$("#date").val();
//     let s=$("#session").val();
//     $.post('index.php?do=booking',{m,d,s},function(){
//         location.href="index.php?do=booking";
//     })
// }
</script>