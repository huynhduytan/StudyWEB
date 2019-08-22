<?php
require_once __DIR__ . '/../dbconnect.php';
// Lấy dữ liệu  sản phẩm
$sqlLoaiSanPham = <<<EOT
    SELECT * FROM sanpham;
EOT;
$resultSanPham = mysqli_query($conn, $sqlSanPham);
$dataSanPham = [];
while ($row = mysqli_fetch_array($resultSanPham, MYSQLI_ASSOC)) {
    $dataSanPham[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
    );
}


?>

<form name="frmHinhSanPham" id="frmHinhSanPham" method="post" action="" enctype="multipart/form-data">
    Chọn hình ảnh :
     <input type="file" name="hsp_tentaptin" id="hsp_tentaptin" /><br />
   Chọn sản phẩm:
    <select name="sp_ma" id="sp_ma">
        <?php foreach($dataSanPham as $SanPham) : ?>
        <option value="<?= $SanPham['sp_ma'] ?>"><?= $SanPham['sp_ten'] ?></option>
        <?php endforeach; ?>
    </select>
    <br />
    
    
   
    <button name="btnLuu" id="btnLuu" class="btn btn-primary">
        <i class="fa fa-heartbeat" aria-hidden="true"></i> Lưu
    </button>
</form>

