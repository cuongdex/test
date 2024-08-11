<?php
    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $ma_nganh = $_POST['manganh'];
    $ptxt = "SELECT p.ma_pt,p.Ten_pt FROM pt_xet_tuyen p";
    $pt = mysqli_query($mysqli, $ptxt);

    $sql_pt = "SELECT n.ma_pt FROM `nganh_hoc_phuong_thuc_xet_tuyen` n WHERE n.ma_nganh = $ma_nganh AND n.ma_pt =  ";
    $pt_nganh = mysqli_query($mysqli, $sql_pt);

?>


<p class="name-from">Chọn phương thức xét tuyển</p>
<!-- method="POST" action="quanly/chon_phuong_thuc.php" -->
<form id="checkbox_form">
    <?php foreach($pt as $it){ 
        $sql_pt = "SELECT n.ma_pt FROM `nganh_hoc_phuong_thuc_xet_tuyen` n WHERE n.ma_nganh = ? AND n.ma_pt = ?";
        $stmt = mysqli_prepare($mysqli, $sql_pt);
        mysqli_stmt_bind_param($stmt, "ss", $ma_nganh, $it['ma_pt']);
        mysqli_stmt_execute($stmt);

        $pt_nganh = mysqli_stmt_get_result($stmt);
        $so_hang = mysqli_num_rows($pt_nganh);
        if($so_hang > 0){          
            ?>
            <input type="checkbox" checked class="phuong_thuc_ts" name="phuongthuc" value="<?php echo $it['ma_pt'] ?>">
            <label><?php echo $it['Ten_pt'] ?></label><br>
            <?php } 
            else {
            ?>
            <input type="checkbox" class="phuong_thuc_ts" name="phuongthuc" value="<?php echo $it['ma_pt'] ?>">
            <label><?php echo $it['Ten_pt'] ?></label><br>
    <?php }}?>
</form>
<input id="check_pt" onclick="luuphuongthuc()" type="button" value="Lưu">
<input id="close" onclick="cucquantrong()" type="button" value="Đóng" name="Đóng">