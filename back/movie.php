<style>
    .border {
        border: 1px #a159a6 dashed !important;
        border-radius: 5px;
        padding: 3px;
    }

    button[type=button] {
        position: absolute;
        right: 25px;
        top: 0px;
    }
    #editMovieButton .btn-primary{
        background-color: #51306e !important;
        border: none !important;
    }
</style>
<div id="bb">
<div style="width:100%;text-align:center;position:relative" class="mb-5">
    <h2 style="color: #fffa5c !important">上映中電影管理</h2>
    <button type="button" class="btn btn-success" onclick="addMov()">新增電影</button>
</div>


<div>
    <?php
    $ms = $Movie->all(' order by rank');
    foreach ($ms as $k => $m) {
    ?>

        <div class="ct" style="display:flex;">
            <div class="ct p-3" style="width:20%">
                <img src="img/<?= $m['poster'] ?>" style="width:80%;border:1px white solid">
            </div>

            <div class="ct" style="width:70%">
                <table style="width:100%;border-collapse:separate; border-spacing:10px;">
                    <tr>
                        <td style="width:45%"><span class="border me-2">電影名稱</span><?= $m['name_c'] ?> <?= $m['name_e'] ?></td>
                        <td style="width:25%"><span class="border me-2">片長</span><?= $m['length'] ?>分鐘</td>
                        <td style="width:30%"><span class="border me-2">上映日期</span><?= $m['ondate'] ?></td>
                    </tr>
                    <tr>
                        <td style="width:30%"><span class="border me-2">級別</span><?= $m['level'] ?></td>

                        <td style="width:70%" colspan="2"><span class="border me-2">電影種類</span>
                            <?php
                            $types = implode("、", unserialize($m['type']));
                            echo $types;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><span class="border me-2">演員陣容</span><?= $m['actor'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align:left">
                            <div class="mb-2">
                                <span class="border">劇情介紹</span>
                            </div>
                            <?= nl2br($m['intro']) ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="ct p-3 d-flex" style="width:10%;flex-direction:column;justify-content:space-evenly;align-items: center;">
                <?php
                if ($k > 0) {
                ?>
                    <i style="cursor:pointer;font-size:larger;" class="fas fa-angle-double-up" onclick="sw(<?= $m['id'] ?>,<?= $ms[$k - 1]['id'] ?>)"></i>
                <?php
                } ?>
                <div class="text-center" id="editMovieButton">
                    <input type="button" class="btn btn-primary mb-2" value="修改" onclick="javascript:location.href='backend.php?do=reviseMov&id=<?= $m['id'] ?>'">
                    <input type="button" class="btn btn-primary mb-2" value="<?= ($m['sh'] == 1) ? '隱藏' : '上映' ?>" onclick="display(<?= $m['id'] ?>)">
                    <input type="button" class="btn btn-primary" value="刪除" onclick="del(<?= $m['id'] ?>,'<?= $m['name_c'] ?>')">
                </div>
                <?php
                if ($k < count($ms) - 1) {
                ?>
                    <i style="cursor:pointer;font-size:larger;" class="fas fa-angle-double-down" onclick="sw(<?= $m['id'] ?>,<?= $ms[$k + 1]['id'] ?>)"></i>
                <?php
                } ?>
            </div>
        </div>
        <hr>
    <?php
    } ?>
</div>
    <script>
        function del(Mid, name) {
            let del = confirm('確定要刪除 ' + name + ' 此部電影嗎?')
            if (del) {
                $.post('api/delMov.php', {table:'theater_movie',Mid}, function() {
                    location.reload();
                })
            }
        }

        function display(Mid) {
            $.post('api/display.php', {table:'theater_movie',Mid}, function() {
                location.reload();
            })
        }

        function addMov() {
            location.href = "backend.php?do=addMov";
        }

        function sw(idx, idy) {
            $.post('api/sw.php', {
                table: 'theater_movie',
                idx,
                idy
            }, function() {
                location.reload();
            })
        }
    </script>
    