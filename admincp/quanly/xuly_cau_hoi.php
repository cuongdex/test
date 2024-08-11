<?php
    $stt = trim($_POST['stt']);
    $tra_loi = trim($_POST['tra_loi']);
    session_start();

    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $sql_phuong_thuc = "UPDATE Chatbot SET tra_loi = ? 
    WHERE STT = '$stt'";
    $stmt_phuong_thuc = $mysqli->prepare($sql_phuong_thuc);
    $stmt_phuong_thuc->bind_param("s",$tra_loi);
    $stmt_phuong_thuc->execute();
    $stmt_phuong_thuc->close();

    header('Location: ../index.php?quanlycp=cauhoi');

    $_SESSION['sua'] = "Thêm dữ liệu thành công";

?>