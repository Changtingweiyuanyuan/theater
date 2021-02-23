<style>
    .imgBlock {
        filter: drop-shadow(-10px 10px 20px #333);
        flex-direction: column;
    }

    .imgBlock img {
        box-shadow: -5px 5px 2px #111;
    }

    #mName {
        font-size: 2rem;
        color: #d4d04e;
    }

    #level,#type {
        border: 1px #a159a6 dashed;
        border-radius: 5px;
        padding: 3px;
    }
    #type{
        border: 1px #a159a6 dashed;
        margin-right:4px;
    }

    #openTra {
        cursor: pointer;
        margin-top: 15px;
    }

    #openTra:hover svg {
        animation: rotate 1 5s alternate;
    }

    .orderbtn{
        color:#fff;
        background:#a159a650;
        font-weight:bold;
        font-size:large;
    }
    .orderbtn:hover{
        color:#fffa5c
    }
    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>
<?php
$m = $Movie->find($_GET['id']);
?>

<div class="col-7 introText">
    <div style="width:80%" >
        <div class="m-4" style="text-align:center"><b><span id="mName"><?= $m['name_c'] ?> <?= $m['name_e'] ?></span></b></div>
        <hr>
        <div><?= nl2br($m['intro']) ?></div><br>
        <div class="m-3">片長 <?= $m['length'] ?>分鐘 <span id="level"><?= $m['level'] ?></span></div>
        <div class="m-3">演員 <?= $m['actor'] ?></div>
        <div class="m-3">類型 <?php
        $ts=unserialize($m['type']);
        foreach($ts as $t){
            echo '<span id="type">'.$t.'</span>';
        }
        ?></div>
        <div class="m-3 mb-5" style="color:#a159a6;font-weight:bolder">上映日期 <?= $m['ondate'] ?></div>

    </div>
    <form action="index.php?do=order&id=<?= $m['id'] ?>" method="get">
    <div style="width:75%;text-align:center">
        <input type="submit" value="訂票" class="btn m-3 orderbtn">
        <input type="button" value="回上頁" class="btn m-3 orderbtn" onclick="javascript:history.go(-1)">
    </div>
</div>
</form>
<div class="col-5 imgBlock d-flex">
    <!-- <img src="img/<?= $m['poster'] ?>" style="width:60%"> -->


    <div id="mp4">
    <iframe width="841" height="500" scrolling="no" frameborder="0" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" allowtransparency="true" style="width:100%;"></iframe>
    <!-- https://tw.tv.yahoo.com/embed/%E6%B9%AF%E5%A7%86%E8%B2%93%E8%88%87%E5%82%91%E5%88%A9%E9%BC%A0-%E5%89%8D%E5%B0%8E%E9%A0%90%E5%91%8A-055702646.html?format=embed&amp;mode=simpletron&amp;region=TW&amp;lang=zh-Hant-TW&amp;site=tv&amp;autoplay=true -->
    </div>

    <div id="openTra">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
        </svg>
        <b>WATCH TRAILER</b>
    </div>
    <!-- <video src="img/<= $m['trailer'] ?>" width="300px" height="250px"></video> -->
</div>



<!-- 
<div class="col-12">
    <div style="text-align:center;font-size:2em"><b>Movies of the same type</b></div>


    <div class="slider center slick-initialized slick-slider">
        <button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;">Previous</button>
        <div aria-live="polite" class="slick-list draggable" style="padding: 0px 60px;">
            <div class="slick-track" style="opacity: 1; width: 100%; transform: translate3d(-882px, 0px, 0px);" role="listbox">

                <div class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" style="width: 147px;" tabindex="-1">
                    <h3>3</h3>
                </div>
                <div class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 147px;" tabindex="-1">
                    <h3>4</h3>
                </div>
                <div class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" style="width: 147px;" tabindex="-1">
                    <h3>5</h3>
                </div>
            </div>
        </div>

        <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;">Next</button>
    </div> -->



</div>
<script>
$(document).ready(function(){

$.getJSON('api/api.php').done(function(re){
    console.log(456)
    // $('#mp4').html(`
    // <iframe width="841" height="500" src="${re}" scrolling="no" frameborder="0" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" allowtransparency="true" style="width:100%;"></iframe>
    // `)
    $("#mp4").attr('src',re)
});







})
</script>