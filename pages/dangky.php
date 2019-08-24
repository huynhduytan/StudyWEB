<?php
require_once __DIR__ . '/../dbconnect.php';
?>
<form name="frmdangky" id="frmdangky" method="post" action="">

Tên dăng nhập: <input type="text" name="kh_tendangnhap" id="kh_tendangnhap" /><br />

Mật khẩu: <input type="password" name="kh_matkhau" id="kh_matkhau" /><br />
Họ và tên : <input type="text" name="kh_ten" id="kh_ten" /><br />
Giới tính:  <input type="radio" name="kh_gioitinh" value="1" checked> nam
            <input type="radio" name="kh_gioitinh" value="0"> nữ
            <input type="radio" name="kh_gioitinh" value="other"> Other<br />
Địa chỉ: <input type="text" name="kh_diachi" id="kh_diachi" /><br />
Email : <input type="email" name="kh_email" id="kh_email" /><br />
Ngày sinh: <input type="text" name="kh_ngaysinh" id="kh_ngaysinh" /><br />
Năm sinh: <input type="text" name="kh_namsinh" id="kh_namsinh" /><br />
Số CMND: <input type="text" name="kh_cmnd" id="kh_cmnd" /><br />
Mã kích hoạt: <input type="text" name="kh_makichhoat" id="kh_makichhoat" /><br />
Trạng thái: 
    <select name="kh_trangthai" id="kh_trangthai">
        <option value="0">Chưa kích hoạt</option>
        <option value="1">Đã kích hoạt</option>
    </select><br/>
 Được quyền quản trị:
 <input type="checkbox" name="kh_quantri" id="kh_quantri" /><br />
 <button name="btnLuu" id="btnLuu" class="btn btn-primary">
        <i class="fa fa-heartbeat" aria-hidden="true"></i> Lưu
    </button>

</form>
<?php
if(isset($_POST['btnLuu'])) {
    $kh_tendangnhap = $_POST['kh_tendangnhap'];
    $kh_matkhau = (sha1)$_POST['kh_matkhau'];
    $kh_ten = $_POST['kh_ten'];
    $kh_gioitinh = $_POST['kh_gioitinh'];
    $kh_diachi = $_POST['kh_diachi'];
    $kh_email = $_POST['kh_email'];
    $kh_ngaysinh = $_POST['kh_ngaysinh'];
    $kh_namsinh = $_POST['kh_namsinh'];
    $kh_cmnd = $_POST['kh_cmnd'];
    $kh_makichhoat = $_POST['kh_makichhoat'];
    $kh_trangthai = $_POST['kh_trangthai'];

    $kh_quantri = isset($_POST['kh_quantri']) ? $_POST['kh_quantri'] : 0;
    
    $sqlInsert = "INSERT INTO khachhang (kh_tendangnhap, kh_matkhau, kh_ten, kh_gioitinh, kh_diachi, kh_email, kh_ngaysinh,  kh_namsinh, kh_cmnd, kh_makichhoat, kh_trangthai, kh_quantri) VALUES ('$kh_tendangnhap', '$kh_matkhau', '$kh_ten', $kh_gioitinh, '$kh_diachi', '$kh_email', $kh_ngaysinh, $kh_namsinh, '$kh_cmnd', '$kh_makichhoat', $kh_trangthai, $kh_quantri)";
    
    $resultInsert = mysqli_query($conn, $sqlInsert);
}
?>