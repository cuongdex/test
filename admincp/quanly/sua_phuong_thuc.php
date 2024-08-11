<?php
    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $ma_phuong_thuc = trim($_GET['maphuongthuc']);
    $sql = "SELECT n.ma_pt,n.Ten_pt,n.dk_xt,n.doi_tuong_xt,n.diem_xt,n.nguyen_tac_xt FROM pt_xet_tuyen n 
    WHERE n.ma_pt = '$ma_phuong_thuc'";
    $result = mysqli_query($mysqli, $sql);
    $it = mysqli_fetch_assoc($result);

?>

<p class="name-from">Sửa phương thức xét tuyển</p>

    <table class="table-data" >

    <tr>
      <td>Mã phương thức</td>
      <td><input readonly type="text" name="maphuongthuc" value=" <?php echo $it['ma_pt'] ?>"></td>
    </tr>
    <tr>
      <td>Tên phương thức</td>
      <td><input type="text" name="tenphuongthuc" value=" <?php echo $it['Ten_pt'] ?>"></td>
    </tr>

    <tr>
      <td>Điều kiện xét tuyển</td>
      <td><input type="text" name="dieukienxt" value=" <?php echo $it['dk_xt'] ?>"></td>
    </tr>

    <tr>
      <td>Đối tượng xét tuyển</td>
      <td><input type="text" name="doituongxt" value=" <?php echo $it['doi_tuong_xt'] ?>"></td>
    </tr>

    <tr>
      <td>Điểm xét tuyển</td>
      <td><input type="text" name="diemxt" value=" <?php echo $it['diem_xt'] ?>"></td>
    </tr>
    
    <tr>
      <td>Nguyên tắc xét tuyển</td>
      <td><input type="text" name="nguyentacxt" value=" <?php echo $it['nguyen_tac_xt'] ?>"></td>
    </tr>

    <tr>
      <td><input id="check" type="submit" value="Sửa phương thức" name="sua_phuong_thuc"></td>
      <td><input onclick="dongphuongthuc()" type="button" value="Đóng" name="Đóng"></td>
    </tr>
  </table>
