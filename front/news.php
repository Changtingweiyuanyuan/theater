

<style>
    .border {
        border: 1px #a159a6 dashed !important;
        border-radius: 5px;
        padding: 3px;
    }

    .viewblock,.clo{
        display:none;
    }
    .datetext{
        font-size: medium;
        color: orange;
        font-weight: 600;
    }
</style>
<div style="width:100%;text-align:center;position:relative" class="mb-5">
    <h2 style="color: #fffa5c !important">影城最新消息</h2>
</div>



<div id="newsAdd">
<?php
$ns=$News->all(['sh' => 1]," order by `id` desc");
foreach($ns as $k=>$n){
?>
<div id="new<?=$n['id']?>">
<div style="display:flex;">
    <div class="p-3" style="width:100%;display:flex;flex-direction:column;">
        <div class="mb-3">
            <div class="datetext mb-2"><?=$n['date']?></div>
            <span class="border" style="font-size:larger;font-weight:bolder;color:#a159a6"><?=$n['title']?></span>
            <div style="width:100%;display:inline-block;padding-left:25%" class="mt-3" onclick="opNews(<?=$n['id']?>,this)">
                <span style="cursor:pointer;background:#fffa5cd4;border-radius:40px;color:black;font-size:smaller;font-weight: bolder;" class="p-1" id="viewblock<?=$n['id']?>">view</span>
                <span style="cursor:pointer;background:#fffa5cd4;border-radius:40px;color:black;font-size:smaller;font-weight: bolder;" class="p-1 clo" id="closeblock<?=$n['id']?>">close</span>
            </div>
        </div>

        <div style="width:100%;flex-direction:column;" class="viewblock" id="view<?=$n['id']?>">
            <div class="mb-2 ms-1">
                <span class="border" style="color:#fffa5c;font-weight:bolder;border:none !important;font-size:large;">內容</span>
            </div>
            <div class="ms-5">
                <span><?=nl2br($n['content'])?></span>
            </div>
            <div class="mb-2 ms-1">
                <span class="border" style="color:#fffa5c;font-weight:bolder;border:none !important;font-size:large;">tags</span>
            </div>
            <div class="ms-5">
                <span style="color:#f35f5f"><?=$n['tags']?></span>
            </div>
        </div>
    </div>

</div>
</div>
<?php
if($k!=count($ns)-1){
    echo "<hr>";
}

}?>
</div>
<script>
    function opNews(newid,div){
        $("#view"+newid).slideToggle(300);

        if($(div).children('span:visible').text()=='view'){
            console.log(1)
            $("#viewblock"+newid).fadeOut(300,function(){
                $("#closeblock"+newid).fadeIn(300)
            });
        }else{
            console.log(2)
            $("#closeblock"+newid).fadeOut(300,function(){
                $("#viewblock"+newid).fadeIn(300)
            });
        }
    }
</script>