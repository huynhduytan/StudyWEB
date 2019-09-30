<?php
    require_once __DIR__ . '/../../dbconnect.php';
    $nsx_ma = $_GET['nsx_ma'];
    $sqlDelete = "DELETE FROM nhasanxuat WHERE nsx_ma = '$nsx_ma';";
    $result = mysqli_query($conn,$sqlDelete);
    
    header('location:/StudyWEB/backend/index.php?page=nhasanxuat_danhsach');
?>