<style>
    label {
        color: rgb(33, 37, 41);
    }
    .loginBlock{
        /* margin-left:auto; */
        /* margin-right:auto; */
        margin:auto;
        border-radius: 10px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );
        box-shadow: 0 8px 32px 0 rgb(31 38 135 / 37%);
        backdrop-filter: blur( 6.5px );
    }

    .loginBlock img{
        width: 115px;
        transform: rotate(315deg);
        position: absolute;
        top: -82px;
        right: -65px;
    }

    .loginBlock input[value=我要登入],
    .loginBlock input[value=重新填寫]{
        font-weight: bolder;
        border: none !important;
        background-color: #6a3b6d70;
        color:#fff;
    }

    .loginBlock input[value=我要登入]:hover,
    .loginBlock input[value=重新填寫]:hover{
        color:#fffa5c;
    }
</style>
<div class="col-4 loginBlock p-5">
    <img src="icon/54897831.png">
    <h2 style="color:#fffa5c !important">會員登入</h2>
    <hr>
<form>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="acc" name="acc">
        <label for="floatingInput">帳號</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="pw" name="pw">
        <label for="floatingInput">密碼</label>
    </div>
    <input class="btn btn-outline-ligth m-2" type="button" value="我要登入">
    <input class="btn btn-outline-light m-2" type="reset" value="重新填寫">
<div class="mt-3"><a href="index.php?do=reg">尚未註冊會員？點擊這裡註冊喔^^</a></div>
</div>
</form>

<script>
    $('#acc').on('change', function() {
        let acc = $('#acc').val();
        console.log(acc.length)
        if (acc.length < 4) {
            $('#acc').attr('class', 'form-control acc is-invalid');
            $('#acc').next('label').css('color', '#dc3545').text('帳號不得少於四字元');
            $("input[value='我要登入']").attr('disabled', true);
        } else {
            $('#acc').attr('class', 'form-control acc');
            $('#acc').next('label').css('color', '#212529').text('帳號');
            $("input[value='我要登入']").removeAttr('disabled');
        }
    })

    $("input[value='我要登入']").on('click', function() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        $.post('api/login.php', {
            acc
        }, function(re) {
            console.log(re);
            if (re == '1') {
                $.post('api/login.php', {
                    acc,
                    pw
                }, function(re) {
                    if (re == '1') {
                        alert('登入成功')
                        location.href = "index.php";
                    } else {
                        alert('密碼錯誤')
                    }
                })
            } else {
                alert('帳號不存在')
            }
        })
    })
</script>