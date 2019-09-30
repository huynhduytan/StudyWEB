<?php
require_once __DIR__ . '/../../dbconnect.php';
require_once __DIR__.'/../../bootstrap.php';

$sql = "SELECT * FROM loaisanpham;";
$result = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data[] = array(
        'lsp_ma' => $row['lsp_ma'],
        'lsp_ten' => $row['lsp_ten'],
        'lsp_mota' => $row['lsp_mota'],
    );
}
/*
[
    ['lsp_ma' => 1, 'lsp_ten' => 'MÃ¡y tÃ­nh báº£ng', 'lsp_mota' => ''], row1
    ['lsp_ma' => 2, 'lsp_ten' => 'MÃ¡y tÃ­nh báº£ng', 'lsp_mota' => ''], row2
    ['lsp_ma' => 3, 'lsp_ten' => 'MÃ¡y tÃ­nh báº£ng', 'lsp_mota' => ''], row3
    ...
]
*/
// print_r($data);die;
// var_dump($data);die;
?>
<a href="/StudyWEB/index.php?page=loaisanpham_them" class="btn btn-outline-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm loại</a>
<div class="table-responsive-sm">
<table class="table table-hover table-dark">
    <thead>
        <tr>
        <th scope="col">Mã</th>
        <th scope="col">Tên</th>
        <th scope="col">Mô tả</th>
        <th scope="col">Chức năng</th>
        </tr>
    </thead>    
    <tbody>
    <?php foreach($data as $row): ?>
        <tr>
            <td><?= $row['lsp_ma']; ?></td>
            <td><?= $row['lsp_ten']; ?></td>
            <td><?php echo $row['lsp_mota']; ?></td>
            <td>
                <a href="/StudyWEB/backend/sanpham/sua.php?sp_ma=<?= $row['sp_ma']?>"class="btn btn-primary btn-edit " >
                Sửa</a>">Sửa</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>