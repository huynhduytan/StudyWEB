$(document).ready(function () {
    // Tìm đối tượng đó, đăng ký sự kiện tương ứng
    $('.btn-delete').click(function (event) {
        var nsx_ma = $(this).data('nsx-ma');
        debugger;
        Swal.fire({
            title: 'Bạn co muốn xóa nsx_ma =' +nsx_ma,
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
             window.location.href = "/StudyWEB/backend/nhasanxuat/xoa.php?nsx_ma=" +nsx_ma; 
            }
          });
    });
});