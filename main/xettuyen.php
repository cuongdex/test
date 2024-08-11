<?php
    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $xettuyen = "select * from pt_xet_tuyen";
    $result = mysqli_query($mysqli, $xettuyen);

?>
<body>
    <h1>PHƯƠNG THỨC XÉT TUYỂN</h1>

    <div class="ptxt">
        <p>Thí sinh được đăng ký nhiều phương thức:</p>
        <ul>
            <?php 
            $i = 1;
                 while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <li>Phương thức <?php echo $i ?>: <?php echo $row['Ten_pt'] ?> <a href="index.php?quanly=phuongthucts&id= <?php echo $row['ma_pt']?>">(Xem chi tiết)</a></li>
                    <?php
                    $i = $i + 1;
                 }
            ?>
        </ul>
        <p>Thí sinh lưu ý:</p>
        <ul>
            <li>Mỗi phương thức có quy định về điều kiện và đối tượng khác nhau, nên Trường xét tuyển độc lập từng phương thức; việc xét tuyển phương thức này không ảnh hưởng đến phương thức khác; điểm chuẩn trúng tuyển của phương thức này không là điểm trúng tuyển của phương thức khác.</li>
            <li>Mỗi thí sinh được quyền đăng ký xét tuyển vào Trường với nhiều phương thức khác nhau, mỗi phương thức nộp hồ sơ riêng theo quy định.</li>
            <li>Phương thức 3 và 4 sẽ được Trường công bố kết quả trúng tuyển sớm đối với thí sinh đủ điều kiện trúng tuyển. Thí sinh phải đăng ký nguyện vọng đủ điều kiện trúng tuyển vào Cổng tuyển sinh theo quy định của Bộ GD&ĐT để lọc ảo cùng các phương thức khác.</li>
            <li>Nếu một phương thức có nhiều đợt xét tuyển thì điểm trúng tuyển của đợt sau không được thấp hơn điểm trúng tuyển của đợt xét tuyển trước.</li>
        </ul>
    </div>
</body>