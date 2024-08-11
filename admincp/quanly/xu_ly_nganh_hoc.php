<?php
$mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
session_start();

if(isset($_POST['them_nganh_hoc'])){
    $ten_nganh = $_POST['tennganh'];
    $ma_nganh = $_POST['manganh'];
    $th_xet_tuyen = $_POST['th_xet_tuyen'];
    $gioi_thieu = $_POST['gioithieu'];
    $noi_lv = $_POST['noi_lam_viec'];
    $vi_tri_lv = $_POST['vt_lam_viec'];

    $sql_them_nganh_hoc = "INSERT INTO nganh_hoc (ten_nganh, ma_nganh, to_hop_XT, gioi_thieu) VALUES (?, ?, ?, ?)";
    $stmt_nganh_hoc = $mysqli->prepare($sql_them_nganh_hoc);
    $stmt_nganh_hoc->bind_param("ssss", $ten_nganh, $ma_nganh, $th_xet_tuyen, $gioi_thieu);
    $stmt_nganh_hoc->execute();


    if($stmt_nganh_hoc->affected_rows > 0){
        $sql_them_nghe = "INSERT INTO co_hoi_nghe_nghiep (ma_nganh,noi_lam_viec, vt_lam_viec) VALUES (?, ?, ?)";
        $stmt_nghe = $mysqli->prepare($sql_them_nghe);
        $stmt_nghe->bind_param("sss",$ma_nganh, $noi_lv, $vi_tri_lv);
        $stmt_nghe->execute();
        if($stmt_nghe->affected_rows > 0){
            $nam = date('Y');
            $sql_them_chi_tieu = "INSERT INTO hoc_phi_nganh (ma_nganh,nam_hoc) VALUES (?, ?)";
            $stmt_chitieu = $mysqli->prepare($sql_them_chi_tieu);
            $stmt_chitieu->bind_param("ss",$ma_nganh,$nam);
            $stmt_chitieu->execute();
            $stmt_chitieu->close();
            $_SESSION['success_message'] = "Thêm dữ liệu thành công";
            header('Location: ../index.php?quanlycp=qlttts');

        } else {
            $_SESSION['loi'] = "Thêm dữ liệu không thành công";
            header('Location: ../index.php?quanlycp=qlttts');
        }
        $stmt_nghe->close();
    } 
    else {
        $_SESSION['loi'] = "Thêm dữ liệu không thành công";
        header('Location: ../index.php?quanlycp=qlttts');
    }
    $stmt_nganh_hoc->close();
    $mysqli->close();
}

elseif(isset($_POST['suanganhhoc'])){
    $ten_nganh = $_POST['tennganh'];
    $ma_nganh = $_POST['manganh'];
    $th_xet_tuyen = $_POST['th_xet_tuyen'];
    $gioi_thieu = $_POST['gioithieu'];
    $noi_lv = $_POST['noi_lam_viec'];
    $vi_tri_lv = $_POST['vt_lam_viec'];

    $sql_sua_nganh_hoc = "UPDATE nganh_hoc SET ten_nganh = ?, ma_nganh = ?, to_hop_XT = ?, gioi_thieu = ? WHERE MA_NGANH = $ma_nganh";
    $stmt_nganh_hoc = $mysqli->prepare($sql_sua_nganh_hoc);
    $stmt_nganh_hoc->bind_param("ssss", $ten_nganh, $ma_nganh, $th_xet_tuyen, $gioi_thieu);
    $stmt_nganh_hoc->execute();
    $stmt_nganh_hoc->close();

    $sql_sua_nghe = "UPDATE co_hoi_nghe_nghiep SET ma_nganh = ?, noi_lam_viec = ?, vt_lam_viec = ? WHERE MA_NGANH = $ma_nganh";
    $stmt_nghe = $mysqli->prepare($sql_sua_nghe);
    $stmt_nghe->bind_param("sss",$ma_nganh, $noi_lv, $vi_tri_lv);
    $stmt_nghe->execute();
    $stmt_nghe->close();

    $_SESSION['sua'] = "Thêm dữ liệu thành công";

    header('Location: ../index.php?quanlycp=qlttts');
}
else{
    $ma_nganh = $_GET['manganh'];

    $sql_xoa = "DELETE FROM nganh_hoc_phuong_thuc_xet_tuyen WHERE ma_nganh = ?";
    $stmt = $mysqli->prepare($sql_xoa);
    $stmt->bind_param("s", $ma_nganh);
    $stmt->execute();

    $sql_xoa = "DELETE FROM hoc_phi_nganh WHERE ma_nganh = ?";
    $stmt = $mysqli->prepare($sql_xoa);
    $stmt->bind_param("s", $ma_nganh);
    $stmt->execute();

    $sql_xoa1 = "DELETE FROM co_hoi_nghe_nghiep WHERE `co_hoi_nghe_nghiep`.`ma_nganh` = ?";
    $stmt1 = $mysqli->prepare($sql_xoa1);
    $stmt1->bind_param("s", $ma_nganh);
    $stmt1->execute();
    $sql_xoa2 = "DELETE FROM nganh_hoc WHERE `nganh_hoc`.`ma_nganh` = ?";
    $stmt2 = $mysqli->prepare($sql_xoa2);
    $stmt2->bind_param("s", $ma_nganh);
    $stmt2->execute();
    mysqli_close($mysqli);
    $_SESSION['xoa'] = "Thêm dữ liệu thành công";

    header('Location: ../index.php?quanlycp=qlttts');
}
?>