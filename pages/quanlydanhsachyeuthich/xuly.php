<?php
    if(isset($_POST["btXoa"])) {
        $idsp=$_POST["btXoa"];
        $sql = "DELETE FROM danhsachduanyeuthich WHERE maDuAn = '$idsp'";
        if($obj->xoadulieu($sql))
        echo "<script>alert('Xóa thành công!');</script>";
        else
            echo "<script>alert('Xóa thất bại!');</script>";
    }
?>