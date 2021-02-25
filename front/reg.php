


<style>
    label {
        color: rgb(33, 37, 41);
    }
    .loginBlock{
        margin-left:auto;
        margin-right:auto;
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

    .loginBlock input[value=註冊會員],
    .loginBlock input[value=重新填寫]{
        font-weight: bolder;
        border: none !important;
        background-color: #6a3b6d70;
        color:#fff;
    }

    .loginBlock input[value=註冊會員]:hover,
    .loginBlock input[value=重新填寫]:hover{
        color:#fffa5c;
    }
</style>
<div style="width:100%;text-align:center;"><h2 style="color: #fffa5c !important">註冊會員</h2></div>

<div class="col-4 loginBlock p-5">
    <img src="icon/54897831.png">
<form>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="acc" name="acc">
        <label for="floatingInput">帳號</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="pw" name="pw">
        <label for="floatingInput">密碼</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="name" name="name">
        <label for="floatingInput">姓名</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="tel" name="tel">
        <label for="floatingInput">連絡電話</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="email" name="email">
        <label for="floatingInput">電子信箱</label>
    </div>
    <input class="btn btn-outline-ligth m-2" type="button" value="註冊會員">
    <input class="btn btn-outline-light m-2" type="reset" value="重新填寫">

</div>
</form>

<script>
    $('#acc').on('change', function() {
        let acc = $('#acc').val();
        console.log(acc.length)
        if (acc.length < 4) {
            $('#acc').attr('class', 'form-control acc is-invalid');
            $('#acc').next('label').css('color', '#dc3545').text('帳號不得少於四字元');
            $("input[value='註冊會員']").attr('disabled', true);
        } else {
            $('#acc').attr('class', 'form-control acc');
            $('#acc').next('label').css('color', '#212529').text('帳號');
            $("input[value='註冊會員']").removeAttr('disabled');
        }
    })

    $("input[value='註冊會員']").on('click', function() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let name = $('#name').val();
        let tel = $('#tel').val();
        let email = $('#email').val();
        if(acc=='' || pw=='' || name=='' || tel=='' || email==''){
            alert('輸入資料不得有空白')
        }else{
            $.post('api/chkacc.php',{acc},function(re){
                if(re==1){
                    alert('此帳號已有人使用')
                }else if(re==0){
                    $.post('api/chkacc.php',{acc,pw,name,tel,email},function(re){
                        console.log(re)
                        alert('註冊成功囉!歡迎登入')
                        location.href="index.php?do=loginmem"
                    })
                }
            })
        }
    })
</script>