<?php
    if(isset($_POST["btXoa"])) {
        $idsp=$_POST["btXoa"];
        if($obj->xoadulieu($idsp))
            echo "xoa thanh cong";
        else
            echo "xoa that bai";  
    }
?>