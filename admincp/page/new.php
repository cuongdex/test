
<?php
$mysqli = new mysqli("localhost", "root", "", "dl_tuyen_sinh");
$nganhhoc = "SELECT COUNT(*) as total_nganh FROM nganh_hoc";
$result = mysqli_query($mysqli, $nganhhoc);
$row = mysqli_fetch_assoc($result);
$total_nganh = $row['total_nganh'];

$phuong_thuc = "SELECT COUNT(*) as total_phuong_thuc FROM pt_xet_tuyen";
$result = mysqli_query($mysqli, $phuong_thuc);
$row = mysqli_fetch_assoc($result);
$total_phuong_thuc = $row['total_phuong_thuc'];

$cauhoi = "SELECT COUNT(*) as total_cau_hoi FROM Chatbot";
$result = mysqli_query($mysqli, $cauhoi);
$row = mysqli_fetch_assoc($result);
$total_cau_hoi = $row['total_cau_hoi'];


?>

        <h3 class="title-page">QUẢN LÝ DỮ LIỆU TUYỂN SINH</h3>

        <div class="main-board">
            <div class="card">
                <p class="so_luong"> <?php echo $total_nganh ?></p>
                <p class="name"> Ngành tuyển sinh</p>
            </div>

            <div class="card">
                <p class="so_luong"> <?php echo $total_phuong_thuc ?></p>
                <p class="name"> Phương thức xét tuyển</p>
            </div>

            <div class="card">
                <p class="so_luong"> <?php echo $total_cau_hoi ?></p>
                <p class="name"> Câu hỏi Chatbot</p>
            </div>