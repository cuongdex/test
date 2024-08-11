<?php
session_start();
// Kiểm tra xem dữ liệu đã được gửi từ phía client chưa
$mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['phuongthuc'])) {
    // Lặp qua mảng $_POST['phuongthuc'] để truy cập vào các giá trị đã chọn
    $arr_pt = $_POST['phuongthuc'];
    $length = count ( $arr_pt );
    $ma_nganh = $arr_pt[$length-1];
    $sql_xoa = "DELETE FROM nganh_hoc_phuong_thuc_xet_tuyen WHERE ma_nganh = ?";
    $stmt = $mysqli->prepare($sql_xoa);
    $stmt->bind_param("s", $ma_nganh);
    $stmt->execute();
    for ($i = 0 ;$i < $length-1; $i++){
        $ma_pt = $arr_pt[$i];
        $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
        $sql_them_nganh_hoc_pt = "INSERT INTO nganh_hoc_phuong_thuc_xet_tuyen (ma_nganh, ma_pt) VALUES (?, ?)";
        $stmt_nganh_hoc = $mysqli->prepare($sql_them_nganh_hoc_pt);
        $stmt_nganh_hoc->bind_param("ss", $ma_nganh, $ma_pt);
        $stmt_nganh_hoc->execute();
    }
    $_SESSION['sua'] = "Thêm dữ liệu thành công";

}

?>
