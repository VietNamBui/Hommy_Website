<?php
    // error_reporting(1);
    session_start();
    require_once("class/clsdatabase.php");
    require("layout/header.php");


    if(isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 'trang_chu';
    }

    if(isset($_GET["cate"])) {
        $cate = $_GET["cate"];
    }

    if(file_exists("pages/".$page."/index.php")) {
        include("pages/".$page."/index.php");
    } else {
        include("pages/404/index.php");
    }

    include("layout/footer.php");
?>
Nguyễn Trọng Phú