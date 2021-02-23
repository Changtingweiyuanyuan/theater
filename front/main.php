<style>
    .carousel-item img {
        filter: grayscale(40%);
        border-radius: .25rem;
    }

    .c {
        color: azure;
        height: 30vh;
    }
    .accordion-button{
        color:#e9ea72;
    }
    .accordion-button:not(.collapsed){
        color:#e9ea72;
        font-size:1.2rem;
        background-color: #ffffff30;
    }
    .accordion-button:focus{
        box-shadow:none;
        border:none;
    }
    .moreNews{
        text-align:right;
    }
</style>

<div id="carouselExampleControls" class="carousel slide h-50" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/1.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="img/2.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="img/3.jpg" class="d-block w-100">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="c col-6">
    連棟式選單 快速訂票
</div>
<div class="c col-6">
    <h2><b>最新公告</b></h2>
    <div class="accordion accordion-flush" id="accordionFlushExample">
<?php
$ns=$News->all(['sh'=>1]," order by `date`");
foreach($ns as $k=>$n){
?>

        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading<?=$k?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$k?>" aria-expanded="false" aria-controls="flush-collapse<?=$k?>">
                <?=$n['title']?>
                </button>
            </h2>
            <div id="flush-collapse<?=$k?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?=$k?>" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <?=nl2br($n['content'])?><br>
                    <span style="color:red"><?=$n['tags']?></span>
                </div>
            </div>
        </div>
<?php
}?>
    </div>
    <div class="moreNews"><button class="btn btn-success" id="moreNews">更多消息</button></div>
        
</div>

<script>

$("#moreNews").on('click',function(re){
    location.href="index.php?do=news";
});
</script>