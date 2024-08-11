<?php
$mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
session_start();
if(isset($_POST['them_phuong_thuc'])){
    $ma_phuong_thuc = trim($_POST['maphuongthuc']);
    $ten_phuong_thuc = $_POST['tenphuongthuc'];
    $dk_xet_tuyen = $_POST['dieukienxt'];
    $doi_tuong_xt = $_POST['doituongxt'];
    $diem_xt = $_POST['diemxt'];
    $nguyen_tac_xt = $_POST['nguyentacxt'];

    $sql_them_phuong_thuc= "INSERT INTO pt_xet_tuyen (ma_pt,Ten_pt,dk_xt,doi_tuong_xt,diem_xt,nguyen_tac_xt) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_phuong_thuc = $mysqli->prepare($sql_them_phuong_thuc);
    $stmt_phuong_thuc->bind_param("ssssss",$ma_phuong_thuc,$ten_phuong_thuc,$dk_xet_tuyen,$doi_tuong_xt,$diem_xt,$nguyen_tac_xt );
    $stmt_phuong_thuc->execute();

    if ($stmt_phuong_thuc->affected_rows > 0) {
        // Thêm dữ liệu thành công
        $_SESSION['success_message'] = "Thêm dữ liệu thành công";
    } else {
        // Thêm dữ liệu thất bại
        $_SESSION['loi'] = "Thêm dữ liệu thất bại";
    }

    $stmt_phuong_thuc->close();
    $mysqli->close();
    header('Location: ../index.php?quanlycp=ql_ptxt');
}

elseif(isset($_POST['sua_phuong_thuc'])){

    $ma_phuong_thuc = trim($_POST['maphuongthuc']);
    $ten_phuong_thuc = $_POST['tenphuongthuc'];
    $dk_xet_tuyen = $_POST['dieukienxt'];
    $doi_tuong_xt = $_POST['doituongxt'];
    $diem_xt = $_POST['diemxt'];
    $nguyen_tac_xt = $_POST['nguyentacxt'];

    $sql_phuong_thuc = "UPDATE pt_xet_tuyen SET ma_pt = ? , Ten_pt = ?, dk_xt = ?, doi_tuong_xt = ?, diem_xt = ?, nguyen_tac_xt = ? 
    WHERE ma_pt = '$ma_phuong_thuc'";
    $stmt_phuong_thuc = $mysqli->prepare($sql_phuong_thuc);
    $stmt_phuong_thuc->bind_param("ssssss",$ma_phuong_thuc,$ten_phuong_thuc,$dk_xet_tuyen,$doi_tuong_xt,$diem_xt,$nguyen_tac_xt);
    $stmt_phuong_thuc->execute();
    $stmt_phuong_thuc->close();
    $_SESSION['sua'] = "Thêm dữ liệu thành công";

    header('Location: ../index.php?quanlycp=ql_ptxt');
}
else{

    $ma_phuong_thuc = $_GET['maphuongthuc'];

    $sql_xoa = "DELETE FROM nganh_hoc_phuong_thuc_xet_tuyen WHERE ma_pt = ?";
    $stmt = $mysqli->prepare($sql_xoa);
    $stmt->bind_param("s", $ma_phuong_thuc);
    $stmt->execute();

    $sql_xoa1 = "DELETE FROM pt_xet_tuyen WHERE ma_pt = ?";
    $stmt1 = $mysqli->prepare($sql_xoa1);
    $stmt1->bind_param("s", $ma_phuong_thuc);
    $stmt1->execute();
    $stmt1->close();

    mysqli_close($mysqli);
    $_SESSION['xoa'] = "Thêm dữ liệu thành công";

    header('Location: ../index.php?quanlycp=ql_ptxt');

}
?>