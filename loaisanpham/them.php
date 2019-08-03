<?php
    $conn=mysqli_connect('127.0.0.1', 'root', '', 'salomon')or die('không kết nối'
    )
    $tenloaisanpham=$_POST['tsp'];
    $motaloaisanpham=$_POST['mtsp'];
    $sql="INSERT into 'loaisanpham'(lsp_ten,lsp_mota) value
    ('N$tenloaisanpham','l$motaloaisanpham')";
    mysqli_query($conn,$sql);
    echo 'Thanh cong'
?>