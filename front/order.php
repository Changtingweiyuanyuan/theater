<?php
$movie=($_GET['id'])??'all';
// $m=$Movie->find($_GET['id']);
?>
<div style="width:100%;text-align:center;"><h2 style="color: #fffa5c !important">訂票看電影囉!</h2></div>
<hr>
<form>
    <table style="width:400px;margin:auto">
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
            <td><input type="button" value="確定" onclick="booking()"><button type="reset">重置</button></td>
        </tr>
    </table>
</form>

<script>

getM('<?=$movie?>');

    function getM(type){
        $.post('api/getM.php',{type},function(re){
            console.log(re)
            $("#movie").html(re);
        })
    }

function getDays(){
    let m=$("#movie").val();
    // console.log(m);
    $.post('api/getD.php',{m},function(re){
            // console.log(re)
            $("#date").html(re);
            getSession();
        })
}
function getSession(){
    let m=$("#movie").val();
    let d=$("#date").val();
    // console.log(d);
    $.post('api/getS.php',{m,d},function(re){
            console.log(re)
            $("#session").html(re);
        })
}
</script>