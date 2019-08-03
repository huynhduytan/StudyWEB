<?php
$conn = mysqli_connect('127.0.0.1', 'root', '', 'salomon') or die('Server không kết nối được');
$sql="INSERT into 'loaisanpham' (lsp_ten,lsp_mota) values (N'máy tính bảng','laptop')";
mysqli_query($conn,$sql);
?> 
<form id="themsanpham" name="themsanpham" method="post" action="/web/loaisanpham.php">
    tensanpham: <input type="text" name="tsp" id="tsp"></br>
    motasanpham: <input type="text" name="mtsp" id="mtsp"></br>
    <input type="submit" name="them" value="them">
</form>