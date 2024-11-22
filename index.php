<?php
error_reporting(1);
ob_start(); 
session_start();
require_once("class/clsdatabase.php");
if(isset($_SESSION['maLoai'])==2){
    require("layout/header-cda.php");
}

else{
        if(isset($_SESSION['maLoai'])==3){
            require("layout/header-cda.php");
        }
        else{
            if(isset($_SESSION['maLoai'])==4){
                require("layout/header-cda.php");
            }
                else{
                        if(isset($_SESSION['maLoai'])==5){
                            require("layout/header-cda.php");
                    }
                        else{
                            require("layout/header.php");
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

if(file_exists("pages/".$page."/index.php"))
    include("pages/".$page."/index.php");

include("layout/footer.php");

?>

