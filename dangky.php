<?php 
$mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
session_start();
    $ten = trim($_POST['ten']);
    $email = trim($_POST['email']);
    $sdt = trim($_POST['sdt']);
    $psws = trim($_POST['pswd']);
    $id_role = "2";

    $sql_pt = "SELECT email FROM nguoi_dung WHERE email='$email'";
    $result = mysqli_query($mysqli, $sql_pt);
    $row = mysqli_fetch_assoc($result);

    if($row['email']){
        $_SESSION['loi'] = "Thêm dữ liệu thành công";
        header('Location: dangnhap.php');
    }

    else{
        $sql_them_phuong_thuc= "INSERT INTO nguoi_dung (username,email,SDT,pass,role_id) VALUES (?, ?, ?, ?, ?)";
        $stmt_phuong_thuc = $mysqli->prepare($sql_them_phuong_thuc);
        $stmt_phuong_thuc->bind_param("sssss",$ten,$email,$sdt,$psws,$id_role );
        $stmt_phuong_thuc->execute();
    
        if ($stmt_phuong_thuc->affected_rows > 0) {
            // Thêm dữ liệu thành công
            $_SESSION['success_message'] = "Thêm dữ liệu thành công";
        }
    
        $stmt_phuong_thuc->close();
        $mysqli->close();
        header('Location: dangnhap.php');
    }

?>