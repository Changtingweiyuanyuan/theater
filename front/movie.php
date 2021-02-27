<style>
    .movieintroimg {
        margin: 16px;
        border: #fff 1px solid;
        filter: grayscale(.3);
        /* box-shadow: 0px 0px 2px 1px #e9ea72; */
    }

    .movieintroimg:hover {
        filter: brightness(1.2)
    }
    .movieintroimg:hover .heartimg{
        filter: brightness(1.2)
    }
    .movieselect{
        width:250px;
        
    }
    #type{
        color: #fff;
        background-color: #6a3b6dcc;
        border: none;
    }
    .heartimg {
        width: 20px !important;
        height: 20px !important;
        border: none !important;
        cursor: pointer;
        position: absolute;
        z-index: 2;
        right: 23px;
        top: 23px;
        filter: drop-shadow(2px 2px 1px black);
    }
</style>
<div id="bb">
<div style="width:100%;text-align:center;"><h2 style="color: #fffa5c !important">現正熱映中的電影</h2></div>
<div style="width:100%;text-align:-webkit-right" class="m-3 mb-5">
<select id="type" class="form-select movieselect">
    <option selected value="all">全部</option>
    <option value="1">愛情片</option>
    <option value="2">喜劇片</option>
    <option value="3">驚悚片</option>
    <option value="4">恐怖片</option>
    <option value="5">科幻片</option>
    <option value="6">卡通片</option>
    <option value="7">戰爭片</option>
</select>
</div>
<div id="typearea" class="col-12" style="display:flex;flex-wrap:wrap;justify-content:center">
    <?php
    $today = date('Y-m-d');
    $startDay = date('Y-m-d', strtotime("-6days", strtotime($today)));
    $ms = $Movie->all(['sh' => 1], " && `ondate` between '$startDay' and '$today' order by rank");
    foreach ($ms as $k => $m) {
    ?>
        <div style="display:flex;flex-direction:column;align-items:center;width:fit-content;position:relative">

            <?php
            if(isset($_SESSION['mem'])){
                $mem=$Mem->find(['name'=>$_SESSION['mem']]);
                $chk=$Heart->find(['mem_id'=>$mem['id'],'movie_id'=>$m['id']]);
                if($chk){
                    echo '<img src="icon/like.png" class="heartimg" onclick="like('.$chk['mem_id'].','.$chk['movie_id'].')">';
                }else{
                    echo '<img src="icon/dislike.png" class="heartimg" onclick="like('.$mem['id'].','.$m['id'].')">';
                }
            }
            ?>

            <a href="?do=movieintro&id=<?= $m['id'] ?>">
                <img class="movieintroimg" src="img/<?= $m['poster'] ?>" style="width:250px;height:355px">
            </a>
            <div><?= $m['name_c'] ?></div>
        </div>
    <?php } ?>

</div>
</div>


<script>
    $('#type').on('change',function(){
        let type=$(this).val()
        $.post('api/type.php',{type},function(re){
            // console.log(re)
            $("#typearea").html(re)
        })
    })
</script>