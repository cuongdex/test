<?php
    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $t =  trim($_GET['id']);
    $nganhhoc = "SELECT * from nganh_hoc where ma_nganh = '$t' ";

    $result = mysqli_query($mysqli, $nganhhoc);
    $row = mysqli_fetch_assoc($result);
    $ma_nganh = $row['ma_nganh'];
    $phuong_thuc = "SELECT pt.ma_pt,pt.Ten_pt FROM pt_xet_tuyen pt 
    INNER JOIN nganh_hoc_phuong_thuc_xet_tuyen npt ON pt.ma_pt = npt.ma_pt
    WHERE npt.ma_nganh = '$ma_nganh'";
    $result = mysqli_query($mysqli, $phuong_thuc);
    $phuong_t_data = array();
    while ($it = mysqli_fetch_assoc($result)) {
        $phuong_t_data[] = $it;
    }

    $data3 = "SELECT * FROM co_hoi_nghe_nghiep WHERE ma_nganh = '$ma_nganh'";
    $result = mysqli_query($mysqli, $data3);
    $row1 = mysqli_fetch_assoc($result);
?>

<div class="chitiet">
        <h1> <?php echo $row['ten_nganh'] ?></h1>
        <h2>Thông tin chung:</h2>

        <div class="info">
            <ul>
                <li>Tên Ngành:<?php echo $row['ten_nganh'] ?> </li>
                <li>Mã Ngành: <?php echo $row['ma_nganh'] ?></li>
                <li>Phương Thức Xét Tuyển: 
                    <ul class="xet-tuyen">
                    <?php
                    $i = 1;
                    foreach($phuong_t_data as $it){
                        echo "<li>Phương Thức $i: " . $it['Ten_pt']. "<a href='index.php?quanly=phuongthucts&id=".$it['ma_pt']."'> Xem Chi Tiết</a></li>";
                        $i = $i + 1;
                    }
                ?>
                    </ul>
                </li>
                <li>Tổ hợp xét tuyển: <?php echo $row['to_hop_XT'] ?> </li>
                <li>Thời gian đào tạo : <?php echo $row['tg_dao_tao'] ?> năm</li>
                <li>Danh hiệu cấp bằng: <?php echo $row1['danh_hieu'] ?> </li>
            </ul>

            <div class="video-item">
                            <video controls src="../video/<?php echo $row['ma_nganh'] ?>.mp4"></video>
            </div>
        </div>

        <h2>Giới Thiệu</h2>

        <div class="info">
            <ul>
            <?php  $vl = explode(".",$row['gioi_thieu']);
            foreach($vl as $it){
                if($it)
                    echo "<li>".$it."</li>";
            }
        ?>
            </ul>
        </div>


        <h2>Vị trí việc làm:</h2>
        <div class="info">
            <ul>
        <?php  $vl = explode(".",$row1['vt_lam_viec']);
            foreach($vl as $it){
                if($it)
                    echo "<li>".$it."</li>";
            }
        ?>
            </ul>
        </div>

        <h2>Nơi làm việc:</h2>
        <div class="info">
            <ul>
        <?php  $vl = explode(".",$row1['noi_lam_viec']);
            foreach($vl as $it){
                if($it)
                    echo "<li>".$it."</li>";
            }
        ?>

            </ul>
        </div>
</div>



