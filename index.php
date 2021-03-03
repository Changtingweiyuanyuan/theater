<?php
include_once "base.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0047)? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>影城</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
  <link rel="stylesheet" href="css/theater.css">
  <script src="js/theater.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
</head>

<body>


<div class="container">
<div class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand theaterName" href="index.php"><img src="icon/title.png" style="width:80px">little theater</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?do=movie">現正熱映</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?do=order">線上訂票</a>
        </li>
        <?php
        if(empty($_SESSION['mem']) && empty($_SESSION['admin'])){
        ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?do=loginmem">會員登入</a>
        </li>
        <?php
        }else if(!empty($_SESSION['mem'])){
          $m=$Mem->find(['name'=>$_SESSION['mem']]);
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?=($m['status']==0)?'<span style="color:red">帳號封鎖中，請洽客服人員</span>':'Hello '.$_SESSION['mem']?>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item <?=($m['status']==0)?'disabled':''?>" href="index.php?do=memorder&mem=<?=$m['id']?>">近期訂單</a></li>
            <li><a class="dropdown-item <?=($m['status']==0)?'disabled':''?>" href="index.php?do=heart&mem=<?=$m['id']?>">喜愛電影</a></li>
            <li><a class="dropdown-item" onclick="javsscript:location.href='api/logout.php'" style="cursor:pointer">登出
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply-all-fill" viewBox="0 0 16 16">
  <path d="M8.021 11.9L3.453 8.62a.719.719 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
  <path d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945a.5.5 0 0 1-.042.028.147.147 0 0 0 0 .252.503.503 0 0 1 .042.028l4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106z"/>
</svg>
          </a></li>
          </ul>
        </li>
        <?php
        }?>

        <?php
        if(empty($_SESSION['admin']) && empty($_SESSION['mem'])){
        ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?do=loginadmin">管理者登入</a>
        </li>
        <?php
        }else if(!empty($_SESSION['admin']) && empty($_SESSION['mem'])){?>
        <li class="nav-item">
          <a class="nav-link" href="backend.php" style="color:#e84444 !important;">返回管理</a>
        </li>
        <?php
        }?>
      </ul>
    </div>
  </div>
</nav>

</div>

<div id="main">
<!-- main -->
<?php
$do=($_GET['do'])??'main';
$file="front/".$do.".php";
if(file_exists($file)){
  include_once $file;
}else{
  include_once "front/main.php";
}
?>
</div>

</div>
<div class="mt-5" style="color:#76aaea; text-align:center">圖片及資料來源:國賓影城官網(僅作為展示用途 無營利目的)</div>
</body>

</html>