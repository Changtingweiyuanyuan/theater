<?php
include_once "../base.php";
if(isset($_SESSION['mem'])){
unset($_SESSION['mem']);
to('../index.php');
}
if(isset($_SESSION['admin'])){
unset($_SESSION['admin']);
to('../index.php');
}