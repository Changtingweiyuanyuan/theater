<?php
$movie=($_GET['id'])??'all';
// $m=$Movie->find($_GET['id']);
?>
<div id="bb">
<div style="width:100%;text-align:center;"><h2 style="color: #fffa5c !important">訂票看電影囉!</h2></div>
<hr>
<form action="index.php?do=booking" method="post">
    <table style="width:400px;margin:auto" class="mt-5">
        <tr>
            <td style="width:15%">電影</td>
            <td style="width:85%">
        <select name="movie" id="movie" onchange="getDays()"></select>
        </td>
        </tr>
        <tr>
            <td style="width:15%">日期</td>
            <td style="width:85%">
        <select name="date" id="date" onchange="getSession()"></select>
        </td>
        </tr>
        <tr>
            <td style="width:15%">場次</td>
            <td style="width:85%">
        <select name="session" id="session"></select>
        </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="確定" onclick="booking()">
                <button type="reset">重置</button>
            </td>
        </tr>
    </table>
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