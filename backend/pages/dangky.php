<?php
require_once __DIR__ . '/../../dbconnect.php';
require_once __DIR__.'/../../vendor/autoload.php';
// Namespace \ ClassName
// Company/Org \ SuiteApp \ ClassName
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

?>
    <form name="frmdangky" id="frmdangky" method="post" action="">

        Tên dăng nhập:
        <input type="text" name="kh_tendangnhap" id="kh_tendangnhap" />
        <br /> Mật khẩu:
        <input type="password" name="kh_matkhau" id="kh_matkhau" />
        <br /> Họ và tên :
        <input type="text" name="kh_ten" id="kh_ten" />
        <br /> Giới tính:
        <input type="radio" name="kh_gioitinh" value="1" checked> nam
        <input type="radio" name="kh_gioitinh" value="0"> nữ
        <input type="radio" name="kh_gioitinh" value="other"> Other
        <br /> Địa chỉ:
        <input type="text" name="kh_diachi" id="kh_diachi" />
        <br /> Email :
        <input type="email" name="kh_email" id="kh_email" />
        <br /> Ngày sinh:
        <input type="text" name="kh_ngaysinh" id="kh_ngaysinh" />
        <br /> Năm sinh:
        <input type="text" name="kh_namsinh" id="kh_namsinh" />
        <br /> Số CMND:
        <input type="text" name="kh_cmnd" id="kh_cmnd" />
        <br /> Mã kích hoạt:
        <input type="text" name="kh_makichhoat" id="kh_makichhoat" />
        <br /> Trạng thái:
        <select name="kh_trangthai" id="kh_trangthai">
            <option value="0">Chưa kích hoạt</option>
            <option value="1">Đã kích hoạt</option>
        </select>
        <br/> Được quyền quản trị:
        <input type="checkbox" name="kh_quantri" id="kh_quantri" />
        <br />
        <button name="btnLuu" id="btnLuu" class="btn btn-primary">
            <i class="fa fa-heartbeat" aria-hidden="true"></i> Lưu
        </button>

    </form>
    <?php
if(isset($_POST['btnLuu'])) {
    $kh_tendangnhap = $_POST['kh_tendangnhap'];
    $kh_matkhau = sha1($_POST['kh_matkhau']);
    $kh_ten = $_POST['kh_ten'];
    $kh_gioitinh = $_POST['kh_gioitinh'];
    $kh_diachi = $_POST['kh_diachi'];
    $kh_email = $_POST['kh_email'];
    $kh_ngaysinh = $_POST['kh_ngaysinh'];
    $kh_namsinh = $_POST['kh_namsinh'];
    $kh_cmnd = $_POST['kh_cmnd'];
    $kh_makichhoat = $_POST['kh_makichhoat'];
    $kh_trangthai = $_POST['kh_trangthai'];

    $kh_quantri = isset($_POST['kh_quantri']) ? $_POST['kh_quantri'] : 0;

    $sqlInsert = "INSERT INTO khachhang (kh_tendangnhap, kh_matkhau, kh_ten, kh_gioitinh, kh_diachi, kh_email, kh_ngaysinh,  kh_namsinh, kh_cmnd, kh_makichhoat, kh_trangthai, kh_quantri) VALUES ('$kh_tendangnhap', '$kh_matkhau', '$kh_ten', $kh_gioitinh, '$kh_diachi', '$kh_email', $kh_ngaysinh, $kh_namsinh, '$kh_cmnd', '$kh_makichhoat', $kh_trangthai, $kh_quantri)";

    $resultInsert = mysqli_query($conn, $sqlInsert);
     // Gởi mail kích hoạt tài khoản
     $mail = new PHPMailer(true);                               // Passing `true` enables exceptions
     try {
         //Server settings
         // http / https (SSL / TLS)
         // smtp
         $mail->SMTPDebug = 2;                                  // Enable verbose debug output
         $mail->isSMTP();                                       // Set mailer to use SMTP
         $mail->Host = 'smtp.gmail.com';                        // Specify main and backup SMTP servers
         $mail->SMTPAuth = true;                                // Enable SMTP authentication
         $mail->Username = 'huynhduytan0501@gmail.com';// SMTP username
         $mail->Password = 'ztxzvpijqmseabsg';                  // SMTP password
         $mail->SMTPSecure = 'tls';                             // Enable TLS encryption, `ssl` also accepted
         $mail->Port = 587;                                     // TCP port to connect to
         $mail->CharSet = "UTF-8";

         // Bật chế bộ tự mình mã hóa SSL
         $mail->SMTPOptions = array(
             'ssl' => array(
                 'verify_peer' => false,
                 'verify_peer_name' => false,
                 'allow_self_signed' => true
             )
         );
         //Recipients
         $mail->setFrom('huynhduytan0501@gmail.com', '[Hỗ trợ khách hàng] - Thông tin tài khoản!');
         $mail->addAddress($kh_email);                          // Add a recipient
         $mail->addReplyTo('tanb1704636@student.ctu.edu.vn', 'Người quản trị Website');
         // $mail->addCC('cc@example.com');
         // $mail->addBCC('bcc@example.com');

         //Attachments
         // $mail->addAttachment('/var/tmp/file.tar.gz');        // Add attachments
         // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   // Optional name

         //Content
         $mail->isHTML(true);                                    // Set email format to HTML
         $mail->Subject = 'Thông báo kích hoạt tài khoản';
         $siteUrl = 'http://localhost:1000/StudyWEB/';
         $body = <<<EOT
        <table>
            <tr>
                <td><h1 style="color: red; font-size: 16px; text-align: center;">TRANG BÁN HÀNG SALOMON</h1>
                    <img src="https://res.cloudinary.com/drdoqfhly/image/upload/v1530887094/gg-1_synrgy.jpg" width="300px" height="150px" />
                </td>
            </tr>
            <tr>
                <td>
                    Xin chào $kh_ten, cám ơn bạn đã đăng ký Hệ thống của chúng tôi. Vui lòng click vào liên kết sau để kích hoạt tài khoản!
                    <a href="http://localhost:1000/StudyWEB/pages/kichhoattaikhoan.php?kh_tendangnhap=$kh_tendangnhap&kh_makichhoat=$kh_makichhoat">Kích hoạt tài khoản</a>
                </td>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li>Xem chúng tôi qua <a href="https://facebook.com/fanpagecuaban">Facebook</a></li>
                        <li>Xem chúng tôi qua <a href="https://twitter.com/fanpagecuaban">Twitter</a></li>
                    </ul>
                </td>
            </tr>
        </table>
EOT;
         $mail->Body    = $body;

         $mail->send();
     } catch (Exception $e) {
         echo 'Lỗi khi gởi mail: ', $mail->ErrorInfo;
     }
    }

    ?>