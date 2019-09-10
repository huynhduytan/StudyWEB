<?php
require_once __DIR__ . "/../../dbconnect.php';
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

<table border="1">
    <tr>
        <th>Mã</th>
        <th>Tên</th>
        <th>Mô tả</th>
        <th>Chức năng</th>
    </tr>
    <?php 
    $biendem=1;
    ?>
    <?php foreach($data as $row): ?>
    <tr>
        <td><?= $row['lsp_ma']; ?></td>
        <td><?= $row['lsp_ten']; ?></td>
        <td><?php echo $row['lsp_mota']; ?></td>
        <td>
          <button class="btn btn-primary btn-edit " data-sp-ma="<?= $row['sp_ma']?>">          
                <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Edit
            </button>
            <button class="btn btn-danger btn-delete " data-sp-ma="<?= $row['sp_ma']?>">
            <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete<i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete
            </button>
        </td>
    </tr>
    <?php $bienDem++; ?>

    <?php endforeach; ?>
</table>
