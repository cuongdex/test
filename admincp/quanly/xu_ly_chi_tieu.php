<?php
    session_start();
    $ma_nganh = trim($_POST['manganh']);
    $nam = date('Y');
    $hoc_phi = $_POST['hocphi'];
    $diem_hb = $_POST['diemhb'];
    $diem_thpt = $_POST['diemthpt'];
    $chi_tieu = $_POST['chitieu'];

    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $sql_phuong_thuc = "UPDATE hoc_phi_nganh SET nam_hoc = ? , h_phi = ?, diem_hb = ?, diem_thpt = ?, chi_tieu = ? 
    WHERE ma_nganh = '$ma_nganh'";
    $stmt_phuong_thuc = $mysqli->prepare($sql_phuong_thuc);
    $stmt_phuong_thuc->bind_param("sssss",$nam,$hoc_phi,$diem_hb,$diem_thpt,$chi_tieu);
    $stmt_phuong_thuc->execute();
    $stmt_phuong_thuc->close();
    $_SESSION['sua'] = "Thêm dữ liệu thành công";

    header('Location: ../index.php?quanlycp=chitieu');
?>