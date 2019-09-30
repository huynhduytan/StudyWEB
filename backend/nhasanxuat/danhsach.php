<?php

require_once __DIR__.'/../../bootstrap.php';

require_once(__DIR__.'/../../dbconnect.php');
// 2. Chuẩn bị câu truy vấn $sql
$sqlNhasanxuat = <<<EOT
            SELECT * FROM nhasanxuat
EOT;
// 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
$resultNhasanxuat = mysqli_query($conn, $sqlNhasanxuat);
// 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
// Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
// Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
$dataNhasanxuat = [];
while($row = mysqli_fetch_array($resultNhasanxuat, MYSQLI_ASSOC))
{
    $dataNhasanxuat[] = array(
        'nsx_ma' => $row['nsx_ma'],
        'nsx_ten' => $row['nsx_ten'],
    );
}

// Nếu trong SESSION không có giá trị của key 'username', chúng ta sẽ xem như người dùng chưa đăng nhập
// Điều hướng người dùng về trang Đăng nhập
// RECOMMENDED: Nên ràng buộc kỹ hơn về phân quyền, 
if(!isset($_SESSION['username'])) {
    header('location:./../pages/dangnhap.php');
}
?>
<table class="table table-hover table-dark">
    <thead>
        <tr>
        <th scope="col">Mã</th>
        <th scope="col">Tên</th>
        <th scope="col">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dataNhasanxuat as $row): ?>
            <tr>
               <td><?= $row['nsx_ma']?></td>
               <td><?= $row['nsx_ten']?></td>
               <td>
                    <a href="?page=them" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i>Thêm nhà sản xuất</a>
                    <button class="btn btn-danger btn-delete " data-nsx-ma="<?= $row['nsx_ma']?>">
                            <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Xóa
                    </button>

            </td>
            </tr>
        <?php  endforeach; ?>
    </tbody>
</table>       
// Yêu cầu `Twig` vẽ giao diện được viết trong file `backend/nhasanxuat/nhasanxuat.html.twig`
// với dữ liệu truyền vào file giao diện được đặt tên là `ds_nhasanxuat`
echo $twig->render('backend/nhasanxuat/index.html.twig', ['ds_nhasanxuat' => $data] );
