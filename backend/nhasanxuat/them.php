<?php
require_once __DIR__ . '/../../dbconnect.php';
require_once __DIR__ . '/../../bootstrap.php';
$sqlnhasanxuat = <<<EQT
  SELECT * FROM nhasanxuat
EQT;
$resultnhasanxuat = mysqli_query($conn,$sqlnhasanxuat);
$datanhasanxuat = [];
while ($row = mysqli_fetch_array($resultnhasanxuat, MYSQLI_ASSOC)) {
    $datanhasanxuat[] = array(
        'nsx_ma' => $row['nsx_ma'],
        'nsx_ten' => $row['nsx_ten'],
    );
}
?>
<form name="frmNhaSanXuat" id="frmNhaSanXuat" method="POST" action="">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Mã</span>
        </div>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="nsx_ma" name="nsx_ma"><br/>
    </div>
      
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Tên nhà sx</span>
        </div>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="nsx_ten" name="nsx_ten"><br/>
    </div>
      
</form>

<?php
if(isset($_POST['btnthem'])) 
{
    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
    $tenLoai = $_POST['nsx_ten'];
    // Câu lệnh INSERT
    $sql = "INSERT INTO `nhasanxuat` (nsx_ten) VALUES ('" . $tenLoai ."');";
    // Thực thi INSERT
    mysqli_query($conn, $sql);
    // Đóng kết nối
    mysqli_close($conn);
    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    echo 'Thành Công';
}
?>