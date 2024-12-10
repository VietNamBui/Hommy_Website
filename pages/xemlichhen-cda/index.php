<?php
$obj = new database();
if(isset($_POST['ngayLoc'])){
   $sql = "SELECT 
                ch.maCuocHen, 
                ch.ngayDienRa, 
                ch.thoiGian,
                kh.tenKH, 
                da.tenDA,
                da.diaChiDA,
                kh.soDT
            FROM 
                cuochen ch
            JOIN 
                khachhang kh ON ch.maKH = kh.maKH
            JOIN 
                duan da ON ch.maDA = da.maDA
            JOIN 
                chuduan cda ON da.maChuDuAn = cda.maChuDuAn
            WHERE 
                cda.maChuDuAn = '{$_SESSION['maChuDuAn']}'AND ch.ngayDienRa = '{$_POST['ngayLoc']}'";
 
}else{   
       $sql = "SELECT 
                ch.maCuocHen, 
                ch.ngayDienRa, 
                ch.thoiGian,
                kh.tenKH, 
                da.tenDA,
                da.diaChiDA,
                kh.soDT
            FROM 
                cuochen ch
            JOIN 
                khachhang kh ON ch.maKH = kh.maKH
            JOIN 
                duan da ON ch.maDA = da.maDA
            JOIN 
                chuduan cda ON da.maChuDuAn = cda.maChuDuAn
            WHERE 
                cda.maChuDuAn = '{$_SESSION['maChuDuAn']}'"; 
}

    $duan = $obj->xuatdulieu($sql);
?>
<div class="container">
<h2 class="mt-4">Danh sách các cuộc hẹn</h2>
<div class="row mt-4">
    <div class="col-3"><h4>Lọc theo ngày:</h4></div>
    <div class="col-9 mt-2">
    <form action="" method="POST" class="d-flex align-items-center gap-2">
        <input type="date" class="form-control" style="max-width: 150px;" name="ngayLoc">
        <button type="submit" class="btn btn-primary btn-block">Lọc</button>
    </form>
    </div>
</div>


        <table class="table table-bordered table-striped table-hover mt-4">
            <thead class="table-primary">
                <tr>
                    <th>STT</th>
                    <th>Tên dự án</th>
                    <th>Địa chỉ</th>
                    <th>Ngày</th>
                    <th>Thời gian</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($duan) {
                    for($i = 0; $i < count($duan); $i++) {
                        echo '  <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$duan[$i]['tenDA'].'</td>
                                    <td>'.$duan[$i]['diaChiDA'].'</td>
                                    <td>'.$duan[$i]['ngayDienRa'].'</td>
                                    <td>'.$duan[$i]['thoiGian'].'</td>
                                    <td>'.$duan[$i]['tenKH'].'</td>
                                    <td>'.$duan[$i]['soDT'].'</td>

                                </tr>';
                    }
                } else {
                    echo "Hiện tại chưa có lịch hẹn nào";
                }
    
                ?>
            </tbody>
        </table>
</div>