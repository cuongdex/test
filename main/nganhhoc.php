<?php
    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $nganhhoc = "select * from nganh_hoc";
    $result = mysqli_query($mysqli, $nganhhoc); 
?>

<body>
    <h1>Chương Trình Tuyển Sinh</h1>
    <div class="list-items">
        <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="item">
                        <div class="name-item">
                            <h3><?php echo $row['ten_nganh'] ?></h3>
                        </div>
                        <div class="video-item">
                            <video controls src="../video/<?php echo $row['ma_nganh'] ?>.mp4"></video>
                        </div>
                        <div class="dis-item">
                            <h3>Mã Ngành: <?php echo $row['ma_nganh'] ?></h3>
                        </div>
                        <div class="foot-item">
                            <a href="index.php?quanly=gioithieu&id=  <?php echo $row['ma_nganh'] ?>"><i class="fa fa-thin fa-arrow-right"></i> Xem chi tiết</a>
                        </div>
                    </div>
                <?php 
                }
                ?>
    </div>

</body>
