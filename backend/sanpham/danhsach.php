<?php
require_once __DIR__ . '/../../dbconnect.php';
require_once __DIR__.'/../../bootstrap.php';


//kiểm tra session
//  if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
//      echo'Đã đăng nhập!';
//  }else {
//  echo 'Bạn chưa đăng nhập. Vui lòng <a href="http://localhost:1000/StudyWEB/pages/dangnhap.php">click vào đây</a> để đến trang Đăng nhập';
//  die;
// }

// Here DOCS
// End of Text
$sql = <<<EOT
    SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota_ngan, sp.sp_soluong,
        lsp.lsp_ten, nsx.nsx_ten, km.km_ten
    FROM sanpham sp
    JOIN loaisanpham lsp ON sp.lsp_ma = lsp.lsp_ma
    JOIN nhasanxuat nsx ON sp.nsx_ma = nsx.nsx_ma
    LEFT JOIN khuyenmai km ON sp.km_ma = km.km_ma;
EOT;

// $limit      = (isset($_GET['limit'])) ? $_GET['limit'] : 5;
// $page       = (isset($_GET['page'])) ? $_GET['page'] : 1;
// $paginator  = new Paginator($twig, $conn, $sql);
// $data       = $paginator->getData($limit, $page);
// $data = $data->data;
//$result
$result = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => $row['sp_gia'],
        'sp_giacu' => $row['sp_giacu'],
        'sp_mota_ngan' => $row['sp_mota_ngan'],
        'sp_soluong' => $row['sp_soluong'],
        'lsp_ten' => $row['lsp_ten'],
        'nsx_ten' => $row['nsx_ten'],
        'km_ten' => $row['km_ten'],
    );
}
// var_dump($data);die;
?>
<div>
<a href="/StudyWEB/index.php?page=sanpham_them" class="btn btn-outline-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm Sản phẩm</a>
</div>
<div class="table-responsive-sm">
    <table class="table table-hover table-dark">
        <thead>
            <tr>
            <th scope="col">Mã</th>
            <th scope="col">Tên</th>
            <th scope="col">Giá</th>
            <th scope="col">Giá cũ</th>
            <th scope="col">Mô tả ngắn</th>
            <th scope="col">Số lượng sản phẩm</th>
            <th scope="col">Loại sản phẩm</th>
            <th scope="col">Nhà sản xuất</th>
            <th scope="col">Khuyến mãi</th>
            

            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $row): ?>
                <tr>
                    <td scope="row"><?= $row['sp_ma'] ?></td>
                    <td><?= $row['sp_ten'] ?></td>
                    <td><?= $row['sp_gia'] ?></td>
                    <td><?= $row['sp_giacu'] ?></td>
                    <td><?= $row['sp_mota_ngan'] ?></td>
                    <td><?= $row['sp_soluong'] ?></td>
                    <td><?= $row['lsp_ten'] ?></td>
                    <td><?= $row['nsx_ten'] ?></td>
                    <td><?= $row['km_ten'] ?></td>
                    <td>
                    <a href="/StudyWEB/backend/sanpham/sua.php?sp_ma=<?= $row['sp_ma']?>"class="btn btn-primary btn-edit " >
                        Sửa</a>
                                                
                        <button class="btn btn-danger btn-delete " data-sp-ma="<?= $row['sp_ma']?>">
                                <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Xóa 
                        </button>
                    </td>   
                </tr>
                <?php endforeach; ?>  
        </tbody>
    </table>    