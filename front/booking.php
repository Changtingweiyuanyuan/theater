<?php
if(!isset($_POST['movie'])){
    to("index.php");
}

$m=$Movie->find($_POST['movie']);
$_SESSION['movieid']=$_POST['movie'];
$_SESSION['date']=$_POST['date'];
$_SESSION['session']=$_POST['session'];

$orders=$Order->all(['movie'=>$m['name_c'],'moviedate'=>$_POST['date'],'session'=>(array_search($_POST['session'],$sess))]);

$seats=[];
foreach($orders as $o){
    $tmp=unserialize($o['seat']);
    $seats=array_merge($seats,$tmp);
}

?>

<style>
    #memarea .btn-primary{
        background-color: #51306e !important;
        border: none !important;
    }
    #memarea .border{
        color:#25c179;
        font-weight:bolder;
        border:none !important;
        font-size:large;
    }
    #screen{
        width: 197px;
        background: #82171ac7;
        height: 100%;
        margin: auto;
        border-radius: 15px;
        text-align: center;
    }
    .seatimg{
        filter: brightness(.7);
    }

    #xA, #yA{
        position:absolute;
        height:100%;
        width:100%;
        display:flex;
        justify-content: space-around;
        font-size: medium;
    }
    #xA{
        align-items: flex-end;
        transform: translate(0px, 30px);
    }
    #yA{
        flex-direction: column;
        transform: translate(-35px, 23px);
        justify-content: space-evenly;
    }
    .seatcheckbox{
        position: absolute;
        bottom: -5px;
        right: -5px;
        z-index: 2;
        margin: 0;
    }
    .foodtitle{
        color: #ff8932;
        font-weight: bolder;
        font-size: large;
        transform: translate(-30px, 0px);
    }

    #payment{
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: xx-large;
        font-weight: 900;
        width:150px;
        height:100%;
        background:#fff5798c;
        border-radius:15px;
        color: #fffa5c;
    }
</style>
<div id="bb">
<div style="width:100%;text-align:center;"><h2 style="color: #fffa5c !important">選擇您的座位</h2></div>
<!--  -->
<div id="memarea">
<div style="display:flex;flex-direction:column;width:100%;margin-left:auto;margin-right:auto;" class="mt-5">

    <div style="display:flex;">
        <div class="mb-1 ms-2" style="width:33%">
            <span class="border">選擇的電影</span>
        </div>
        <div class="mb-1 ms-2" style="width:33%">
            <span class="border">電影日期</span>
        </div>

        <div class="mb-1 ms-2" style="width:33%">
            <span class="border">開演時間</span>
        </div>
    </div>

    <div style="display:flex;">
        <div class="ms-5 mb-2" style="width:33%">
            <span id="mn"><?=$m['name_c']?><br><?=$m['name_e']?></span>
        </div>
        <div class="ms-5 mb-2" style="width:33%">
            <span><?=$_POST['date']?></span>
        </div>
        <div class="ms-5 mb-2" style="width:33%">
            <span><?=$_POST['session']?></span>
        </div>
    </div>

    <div style="display:flex;">
        <div class="mb-1 ms-2" style="width:33%">
            <span class="border">選擇的座位</span>
        </div>
        <div class="mb-1 ms-2" style="width:60%">
            <span class="border">加點的餐飲</span>
        </div>
    </div>

    <div style="display:flex;">
    <div class="ms-5 mb-2" style="width:33%">
            <span id="ticket">尚未選擇</span>
        </div>
        <div class="ms-5 mb-2" style="width:60%">
            <span id="food">尚未選擇</span>
        </div>
    </div>

</div>


<!-- seats -->

<div style="width:100%;display:flex;">


<div style="width:55%">
<div style="margin-left:auto;margin-right:auto;display:flex;flex-wrap:wrap;width:330px;position:relative" class="mt-5 mb-5">
<div id="xA">
    <span>1號</span><span>2號</span><span>3號</span><span>4號</span><span>5號</span>
</div>
<div id="yA">
    <span>1排</span><span>2排</span><span>3排</span><span>4排</span>
</div>
<!-- screen height:68px -->
<div style="width:100%;height:20px;" class="mb-3"><div id="screen">SCREEN</div></div>


<?php
for($i=1;$i<=20;$i++){
    if(in_array($i,$seats)){
?>
<img src="icon/seat2.png" style="width:50px" class="seatimg m-2 booked">
<?php
    }else{
?>
<div style="position:relative">
    <img src="icon/seat.png" style="width:50px" class="seatimg m-2 empty">
    <div class="form-check form-check-inline seatcheckbox">
        <input class="form-check-input chk" type="checkbox" id="Cb<?=$i?>" name="seat[]" value="<?=$i?>" data-seattable="<?=$seattable[$i]?>">
        <label class="form-check-label" for="Cb<?=$i?>"></label>
    </div>
</div>
<?php
    }
}
?>



</div>
</div>


<div style="width:45%;" class="pe-3">

<!-- food -->

<div class="mt-5 mb-3" style="width:100%;text-align:center;font-size: larger;color:orange;">片長有<?=$m['length']?>分鐘，需要加點餐飲嗎?</div>

<div style="width:100%" class="mt-5 mb-1 foodtitle">FOOD</div>
<div style="width:100%;text-align:left;display:flex" class="mb-2">
        <div class="form-check form-check-inline" style="width:30%">
            <input class="form-check-input food" type="checkbox"  name="food[]" value="1" data-food="小份爆米花">
            <label class="form-check-label">小份爆米花</label>
        </div>
        <div class="form-check form-check-inline" style="width:30%">
            <input class="form-check-input food" type="checkbox" id="inlineCheckbox2" name="food[]" value="2" data-food="大份爆米花">
            <label class="form-check-label" for="inlineCheckbox2">大份爆米花</label>
        </div>  
        <div class="form-check form-check-inline" style="width:30%">
            <input class="form-check-input food" type="checkbox" id="inlineCheckbox1" name="food[]" value="3" data-food="吉拿棒">
            <label class="form-check-label" for="inlineCheckbox1">吉拿棒</label>
        </div>
</div>

<div style="width:100%" class="mt-4 mb-1 foodtitle">DRINK</div>
<div style="width:100%;text-align:left;display:flex" class="mb-2">
        <div class="form-check form-check-inline" style="width:30%">
            <input class="form-check-input food" type="checkbox" id="inlineCheckbox1" name="food[]" value="4" data-food="紅茶">
            <label class="form-check-label" for="inlineCheckbox1">紅茶</label>
        </div>
        <div class="form-check form-check-inline" style="width:65%">
            <input class="form-check-input food" type="checkbox" id="inlineCheckbox2" name="food[]" value="5" data-food="汽水">
            <label class="form-check-label" for="inlineCheckbox2">汽水</label>
        </div>  
</div>

<div style="width:100%" class="mt-4 mb-1 foodtitle">TOTAL</div>
<div style="width:100%;text-align:center;height:35px" class="mb-2">
<!-- #payment -->
<div id="payment"></div>
</div>

</div>




</div>



<div class="m-4 d-flex" style="width:100%;justify-content:center">
    <input type="button" class="btn btn-primary mb-2 me-4" style="background-color:#51306e;border:none;font-weight:bolder;" value="訂單成立" 
    <?php
    if(isset($_SESSION['mem'])){
    ?>
        onclick="setupOrder('<?=$_SESSION['mem']?>','<?=$_POST['movie']?>','<?=$_POST['date']?>','<?=$_POST['session']?>','<?=$m['name_c']?>')";
    <?php
    }else{
        echo "onclick='warninglogin()'";
    }
    ?>
    >
    <input type="button" onclick="javascript:history.go(-1)" style="background-color:#51306e;border:none;font-weight:bolder;" class="btn btn-primary mb-2" value="返回重選">
</div>


</div>

<div></div>

</div>

<script>
let seats=new Array();
let dataseattable=new Array();
let money=0;
let food=new Array();
let foodsettable=new Array();
$(".chk").on('click',function(){
    let s=$(this).val();
    
    if($(this).prop('checked')){
        seats.push(s);
        dataseattable.push($(this).data('seattable'))
        money=money+300;
        if(seats.length>4){
            alert('一筆訂單最多只能購買四張票');
            seats.splice(seats.indexOf($(this).val(),1));
            dataseattable.splice(dataseattable.indexOf($(this).val(),1))
            money=money-300;
            $(this).prop('checked',false);
        }
    }else{
        seats.splice(seats.indexOf(s),1);
        dataseattable.splice(dataseattable.indexOf($(this).data('seattable')),1);
        money=money-300;
    }

    $("#ticket").text(dataseattable.join("、"));
    $("#payment").html(money)
})

$(".food").on('click',function(){
    let f=$(this).val();
    let ftext=$(this).data('food');

    if($(this).prop('checked')){
        switch($(this).val()){
        case '1':
            money=money+60;
            break;
        case '2':
            money=money+100;
            break;
        case '3':
            money=money+70;
            break;
        case '4':
            money=money+35;
            break;
        case '5':
            money=money+35;
            break;
        }
        food.push(f);
        foodsettable.push(ftext);

    }else{
        switch($(this).val()){
        case '1':
            money=money-60;
            break;
        case '2':
            money=money-100;
            break;
        case '3':
            money=money-70;
            break;
        case '4':
            money=money-35;
            break;
        case '5':
            money=money-35;
            break;
        }
        food.splice(food.indexOf(f),1);
        foodsettable.splice(foodsettable.indexOf(ftext),1);
        console.log(foodsettable)
    }

    $("#food").html(foodsettable.join("、"));
    $("#payment").html(money);
})

//seats
function setupOrder(memname,movieid,date,session,moviename){
    console.log(food,seats,money)
    let cc=confirm("電影 "+moviename+"　日期 "+date+"　時間 "+session);
    if(cc){
        $.post('api/setupOrder.php',{memname,movieid,date,session,seats,money,food},function(memid){
            alert('訂單完成!祝您觀看愉快^^');
            location.href="index.php?do=memorder&mem="+memid;
        })
    }
}

function warninglogin(){
    alert('需要登入會員才能繼續完成訂票喔!');
    location.href='index.php?do=loginmem';
}


</script>

