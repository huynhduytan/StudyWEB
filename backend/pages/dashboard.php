<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../bootstrap.php';
// Truy vấn database để lấy danh sách
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../dbconnect.php');
// 2. Chuẩn bị câu truy vấn $sql
$sqlSoLuongSanPham = "select count(*) as SoLuong from `sanpham`";
$sqlSoLuongKhachHang = "select count(*) as SoLuong from `khachhang`";

// 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
$result = mysqli_query($conn, $sqlSoLuongSanPham);
// 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
// Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
// Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
$dataSoLuongSanPham = [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $dataSoLuongSanPham[] = array(
        'SoLuong' => $row['SoLuong']
    );
}
$dataSoLuongKhachHang =[];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $dataSoLuongKhachHang[] = array(
        'SoLuong' => $row['SoLuong']
    );
}
$dataSoLuongDonDatHang =[];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $dataSoLuongDonDatHang[] = array(
        'SoLuong' => $row['SoLuong']
    );
}


?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-primary mb-2">
                <div class="card-body pb-0">
                    <div class="text-value" id="baocaoSanPham_SoLuong">
                        <h1><?= $dataSoLuongSanPham[0]['SoLuong'] ?></h1>
                    </div>
                    <div>Tổng số mặt hàng</div>
                </div>
            </div>
            <button class="btn btn-primary btn-sm form-control" id="refreshBaoCaoSanPham">Refresh dữ liệu</button>
        </div> <!-- Tổng số mặt hàng -->
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-danger mb-2">
                <div class="card-body pb-0">
                    <div class="text-value" id="baocaoKhachHang_SoLuong">
                        <h1><?= $dataSoLuongKhachHang[0]['SoLuong'] ?></h1>
                    </div>
                    <div>Tổng số khach hang</div>
                </div>
            </div>
            <button class="btn btn-primary btn-sm form-control" id="refreshBaoCaoKhachHang">Refresh dữ liệu</button>
        </div> <!-- Tổng số mặt hàng -->
    </div><!-- row -->

    <!-- bieu do bao cao -->
    <div class="row">
        <div class="col-sm-6 col-lg-6">
            <canvas id="chartOfobjChartThongKeLoaiSanPham"></canvas>
            <button class="btn btn-outline-primary btn-sm form-control" id="refreshThongKeLoaiSanPham">Refresh dữ liệu</button>
        </div> <!-- Tổng số mặt hàng -->
    </div>    
</div>
