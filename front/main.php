<style>
    .carousel-item img {
        filter: grayscale(40%);
        border-radius: .25rem;
        max-height:290px;
    }

    .accordion-button {
        color: #e9ea72;
    }

    .accordion-button:not(.collapsed) {
        color: #e9ea72;
        font-size: 1.2rem;
        background-color: #ffffff30;
    }

    .accordion-button:focus {
        box-shadow: none;
        border: none;
    }

    .moreNews {
        text-align: right;
    }

    #movie,
    #bookingMovie,
    #date,
    #datenew{
        background: #6a3b6d;
        font-size: medium;
        width: 200px;
        border-radius: 5px;
        font-weight: bolder;
        color: #f8f9fa;
        cursor: pointer;
    }

    #date,
    #datenew{
        position: absolute;
        top: 50px;
        left: 160px;
    }

    #movie:hover,
    #date:hover {
        background: #6a3b6d70;
    }

    .movies,.dates{
        font-size: medium;
        display: none;
    }

    .movie,.date {
        width: 200px;
        border-radius: 5px;
        margin-top: 1px;
        color: #fffa5c;
        display:inline-block;
    }
    .date{
        transform: translate(80%, 2px);
    }

    .movie:hover,.date:hover {
        background: #6c757dc9;
        font-weight: bolder;
        cursor: pointer;
    }

    #bookingMovieDiv {
        display: none;
        position: relative;
    }

    #moviearrow,#datearrow{
        position: absolute;
        top: 35px;
        left: 110px;
        color: #6a3b6d;
        display:none;
    }
    #datearrow{
        top: 85px;
        left: 272px;
    }
    #orderButton{
        transform: translate(335px,0);
        font-size: medium;
        font-weight: bolder;
    }
    #orderButton a{
    display: flex;
    align-items: flex-end;
    }

    #mainReset{
        background: #dc3545a6;
        border-radius: 40px;
        color: black;
        font-size: smaller !important;
        position: absolute;
        top: 10px;
        left: 140px;
        cursor:pointer;
        color:white;
    }
</style>
<div id="bb">
<div id="carouselExampleControls" class="carousel slide h-50" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        $cs=$Car->all(['sh'=>1]," order by rank");
        foreach($cs as $k=>$c){
            // print_r($cs);
        ?>
        <div class="carousel-item <?=($k==0)?'active':''?>">
            <img src="img/<?=$c['img']?>" class="d-block w-100">
        </div>
        <?php }?>
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

<div style="display:flex" class="mt-5">
<div class="col-6">
    <div style="position:relative">
    <h2><b>快速訂票</b></h2><span id="mainReset" onclick="javascript:location.reload()" class="p-1">reset</span>
    </div>
    <div style="width:100%;" class="mt-5">
        <div id="movie" class="ms-3 p-2 text-center">選擇喜歡的電影</div>
    </div>
    <div id="bookingMovieDiv" style="width:100%;" class="mt-5">
        <div id="bookingMovie" class="ms-3 p-2 text-center"></div>
    </div>
    <div class="movies" style="width:100%;">
        <?php
        $today = date('Y-m-d');
        $startDay = date('Y-m-d', strtotime("-6days", strtotime($today)));
        $ms = $Movie->all(['sh' => 1], " && `ondate` between '$startDay' and '$today' order by rank ");
        foreach ($ms as $k => $m) {
        ?>
            <div class="movie ms-3 ps-5 p-1 pl-4" data-name="<?= $m['name_c'] ?>"><?= $m['name_c'] ?></div>
        <?php
        }
        ?>
    </div>

</div>
<div class="col-6">
    <h2><b>最新公告</b></h2>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <?php
        $ns = $News->all(['sh' => 1], " order by `date` desc limit 0,3");
        foreach ($ns as $k => $n) {
        ?>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading<?= $k ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $k ?>" aria-expanded="false" aria-controls="flush-collapse<?= $k ?>">
                        <?= $n['title'] ?>
                    </button>
                </h2>
                <div id="flush-collapse<?= $k ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?= $k ?>" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?= nl2br($n['content']) ?><br>
                        <span style="color:#e84444"><?= $n['tags'] ?></span>
                    </div>
                </div>
            </div>
        <?php
        } ?>
    </div>
    <div class="moreNews"><button class="btn btn-success" id="moreNews">更多消息</button></div>


</div>
</div>
</div>
<script>
    $("#moreNews").on('click', function(re) {
        location.href = "index.php?do=news";
    });
    $('#movie').hover(
        function() {
            $(".movies").fadeIn(500)
        },
        function() {
            movieshover();
        }
    )


    function movieshover() {
        $(".movies").hover(
            function() {
                $(".movies").show()
            },
            function() {
                $(".movies").fadeOut(100)
            }
        )
    }

$(".movie").on('click', function() {
        let m = $(this).data('name')
        console.log(m)
        $(".movies").fadeOut(300)
        $(".movies").fadeOut(300)
        $("#movie").fadeOut(300, function() {
            $("#bookingMovie").html(m);
            $("#bookingMovie").after(`
        <svg id="moviearrow" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
        </svg>
        `)
        
        $("#bookingMovieDiv").slideDown(500,function(){
            $("#moviearrow").fadeIn()
        })
        $("#bookingMovie").after(`
        <div style="width:100%;" class="mt-5" id="bookingDateDiv">
        <div id="date" class="ms-3 p-2 text-center">選擇觀看的日期</div>
        </div>
        `);

        $.post('api/getDatefast.php',{m},function(re){
            $("#date").after(re)
            
            $(".date").on('click',function(){
                let d = $(this).data('date');
                console.log(d)
                $(".dates").fadeOut(300)
                $(".dates").removeClass('dates');
                $("#date").fadeOut(300, function() {
                $("#date").html(d);
                $("#date").after(`
                <svg id="datearrow" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                </svg>
                `)
                $("#date").attr('id','datenew')
                $("#datenew").slideDown(500,function(){
                    $("#datearrow").fadeIn(function(){
                        $.post('api/getfastorderid.php',{m,d},function(re){
                            $("#datearrow").after(re)
                        })
                    })
                })
                
                
            })








            })
        })

$('#bookingDateDiv').hover(
    function(){
        $(".dates").show()
    },
    function(){
        $(".dates").fadeOut(100)
    }
)







    })
})



function getDate(){
    let movie=$("#bookingMovie").html()
    console.log(movie)
    $.post('api/getDate.php',{movie},function(re){
        console.log(re)
        $("#date").after(re);
    })


}


</script>