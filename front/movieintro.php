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

    .introbackground,.backgroundShadow{
        position: absolute;
        z-index: 1;
        width: 500px;
        height: 250px;
        top: 400px;
        left: 50%;
        transform: translate(-70%,0);
        filter:grayscale(.3)
    }
</style>
<?php
$m = $Movie->find($_GET['id']);
?>
<div id="bb">
<div style="display:flex;flex-wrap:nowrap;background:#020211;border-radius:10px;min-height: 600px;">
<img src="img/<?=$m['background']?>" class="introbackground">
<img src="others/introbg.png" class="backgroundShadow">
<div class="col-7 introText" style="z-index:2;">
    <div style="width:80%;height:75%" >
        <div class="m-4" style="text-align:center"><b><span id="mName"><?= $m['name_c'] ?> <?= $m['name_e'] ?></span></b></div>
        <hr>
        <div class="ms-4"><?= nl2br($m['intro']) ?></div><br>
        <div class="m-3 ms-4">片長 <?= $m['length'] ?>分鐘 <span id="level"><?= $m['level'] ?></span></div>
        <div class="m-3 ms-4">演員 <?= $m['actor'] ?></div>
        <div class="m-3 ms-4">類型 <?php
        $ts=unserialize($m['type']);
        foreach($ts as $t){
            echo '<span id="type">'.$t.'</span>';
        }
        ?></div>
        <div class="m-3 ms-4 mb-5" style="color:#a159a6;font-weight:bolder">上映日期 <?= $m['ondate'] ?></div>

    </div>

    <div style="width:75%;text-align:center;height:25%">
        <input type="button" onclick="javascript:location.href='index.php?do=order&id=<?=$m['id']?>'" value="訂票" class="btn m-3 orderbtn">
        <input type="button" value="回上頁" class="btn m-3 orderbtn" onclick="javascript:history.go(-1)">
    </div>
</div>

<div class="col-5 imgBlock d-flex" style="z-index:2;">
    <div style="height:85%">
    <img src="img/<?= $m['poster'] ?>" style="width:60%" class="m-4 mt-5">
    </div>

    <div id="openTra" style="text-align:center;">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
        </svg>
        <b>WATCH TRAILER</b>
    </div>
    <!-- <video src="img/<= $m['trailer'] ?>" width="300px" height="250px"></video> -->
</div>
</div>
</div>