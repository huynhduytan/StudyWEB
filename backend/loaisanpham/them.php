<?php
require_once __DIR__ . '/../../dbconnect.php';
$sqlLoaisanpham = <<<EOT
            SELECT * FROM loaisanpham
EOT;
$resultLoaisanpham = mysqli_query($conn, $sqlLoaisanpham);
$dataLoaisanpham = [];
while ($row = mysqli_fetch_array($resultLoaisanpham, MYSQLI_ASSOC)) {
    $dataLoaisanpham[] = array(
        'lsp_ma' => $row['lsp_ma'],
        'lsp_ten' => $row['lsp_ten'],
    );
}
?>
<form name="frmLoaisanpham" id="frmLoaisanpham" method="POST" action="">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Tên loại sản phẩm</span>
        </div>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="lsp_ten" name="lsp_ten"><br/>
    </div>
      
      <input type="submit" name="btnthem" id="btnthem" value="Them" class="btn btn-primary"/>
</form>
<?php
if(isset($_POST['btnthem'])){
    $lsp_ten = $_POST['lsp_ten'];
    $sqlUpdate = "INSERT INTO loaisanpham (lsp_ten) VALUES (N'$lsp_ten');";
    mysqli_query($conn,$sqlUpdate);
    echo('Thanh  Cong');
    header("location:/StudyWEB/backend/loaisanpham/danhsach.php");
}
?>