<?php
error_reporting(1);
ob_start(); 
session_start();
require_once("class/clsdatabase.php");

if($_SESSION['maLoai']=='2'){
    require("layout/header-cda.php");
}else{
        if($_SESSION['maLoai']=='3'){
            require("layout/header-cda.php");
        }
        else{
            if($_SESSION['maLoai']=='4'){
                require("layout/header-cda.php");
            }
                else{
                        if($_SESSION['maLoai']=='5'){
                            require("layout/header-cda.php");
                    }
                        else{
                            if($_SESSION['maLoai']=='1'){
                                require("layout/header_khachang.php");
                            }else{
                                require("layout/header.php");
                            }
                            
                        }
                }
        }
    }
if(isset($_GET["page"]))
    $page=$_GET["page"];
else
    $page='trangchu';

if(isset($_GET["cate"]))
    $cate=$_GET["cate"];

if(isset($_GET["mada"]))
    $mada=$_GET["mada"];

if(isset($_GET["maloai"]))
    $maloai=$_GET["maloai"];

if(file_exists("pages/".$page."/index.php"))
    include("pages/".$page."/index.php");

include("layout/footer.php");

?>

