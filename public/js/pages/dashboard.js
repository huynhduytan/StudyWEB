// Vẽ biểu đổ Thống kê Loại sản phẩm sử dụng ChartJS
var $objChartThongKeLoaiSanPham;
var $chartOfobjChartThongKeLoaiSanPham = document.getElementById("chartOfobjChartThongKeLoaiSanPham").getContext("2d");
$(document).ready(function() {
    // Vẽ biểu đồ Loại sản phẩm
    $.ajax({
        url: '/StudyWEB/backend/ajax/baocao-thongkeloaisanpham-ajax.php',
        type: "GET",
        success: function (response) {
            var data = JSON.parse(response);
            var myLabels = [];
            var myData = [];
            $(data).each(function () {
                myLabels.push((this.TenLoaiSanPham));
                myData.push(this.SoLuong);
            });
            myData.push(0); // tạo dòng số liệu 0
            if (typeof $objChartThongKeLoaiSanPham !== "undefined") {
                $objChartThongKeLoaiSanPham.destroy();
            }
            $objChartThongKeLoaiSanPham = new Chart($chartOfobjChartThongKeLoaiSanPham, {
                // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
                type: "radar",
                data: {
                    labels: myLabels,
                    datasets: [{
                        data: myData,
                        borderColor: "#9ad0f5",
                        backgroundColor: "",
                        borderWidth: 1
                    }]
                },
                // Cấu hình dành cho biểu đồ của ChartJS
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Thống kê Loại sản phẩm"
                    },
                    responsive: true
                }
            });
        },
        error:function(res) {
            alert('Lỗi khi vẽ biểu đồ')
        }
    });
});


var $objChartThongKeTopLoaiSanPham;
var $chartOfobjChartThongKeTopLoaiSanPham = document.getElementById("chartOfobjChartThongKeTopLoaiSanPham").getContext("2d");
$(document).ready(function() {
    // Vẽ biểu đồ  sản phẩm
    $.ajax({
        url: '/StudyWEB/backend/ajax/baocao-thongketopsanphambanchaynhat-ajax.php',
        type: "GET",
        success: function (response) {
            var data = JSON.parse(response);
            var myLabels = [];
            var myData = [];
            $(data).each(function () {
                myLabels.push((this.TenSanPham));
                myData.push(this.SoLuong);
            });
            myData.push(0); // tạo dòng số liệu 0
            if (typeof $objChartThongKeTopLoaiSanPham !== "undefined") {
                $objChartThongKeTopLoaiSanPham.destroy();
            }
            $objChartThongKeTopLoaiSanPham = new Chart($chartOfobjChartThongKeTopLoaiSanPham, {
                // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
                type: "horizontalBar",
                data: {
                    labels: myLabels,
                    datasets: [{
                        data: myData,
                        borderColor: "#9ad0f5",
                        backgroundColor: "#9ad0f5",
                        borderWidth: 1
                    }]
                },
                // Cấu hình dành cho biểu đồ của ChartJS
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Thống kê Top sản phẩm Bán Chạy"
                    },
                    responsive: true
                }
            });
        },
        error:function(res) {
            alert('Lỗi khi vẽ biểu đồ')
        }
    });
});

var $objChartThongKeDoanhThuSanPham;
var $chartOfobjChartThongKeDoanhThu = document.getElementById("chartOfobjChartThongKeDoanhThu").getContext("2d");
$(document).ready(function() {
    // Vẽ biểu đồ  sản phẩm
    $.ajax({
        url: '/StudyWEB/backend/ajax/baocao-thongkedoanhthu-ajax.php',
        type: "GET",
        success: function (response) {
            var data = JSON.parse(response);
            var myLabels = [];
            var myData = [];
            $(data).each(function () {
                myLabels.push((this.NgayTaoDonHang));
                myData.push(this.TongThanhTien);
            });
            myData.push(0); // tạo dòng số liệu 0
            if (typeof $objChartThongKeDoanhThuSanPham !== "undefined") {
                $objChartThongKeDoanhThuSanPham.destroy();
            }
            $objChartThongKeDoanhThuSanPham = new Chart($chartOfobjChartThongKeDoanhThu, {
                // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
                type: "line",
                data: {
                    labels: myLabels,
                    datasets: [{
                        data: myData,
                        borderColor: "#9ad0f5",
                        backgroundColor: "#9ad0f5",
                        borderWidth: 1
                    }]
                },
                // Cấu hình dành cho biểu đồ của ChartJS
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Thống kê Danh Thu"
                    },
                    responsive: true
                }
            });
        },
        error:function(res) {
            alert('Lỗi khi vẽ biểu đồ')
        }
    });
});
