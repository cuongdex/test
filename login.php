<?php
if(isset($_POST['dang_nhap'])){
    $email = trim($_POST['email']);
    $pws = trim($_POST['pswd']);

    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $sql = "SELECT n.role_id,n.username FROM `nguoi_dung` n WHERE n.email = '$email' AND n.pass = '$pws'";
    $result = mysqli_query($mysqli, $sql);

    $row = mysqli_fetch_assoc($result);

    if($row['role_id'] == 1){
        session_start();
        $_SESSION['dang_nhap'] = $row['username'];
        header("Location: admincp/index.php");
        exit();
    }
    elseif($row['role_id'] == 2){
        session_start();
        $_SESSION['dang_nhap'] = $row['username'];
        header("Location: index.php");
        exit();
    }

}

?>