<?php
    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $manganh = trim($_GET['manganh']);
    $sql = "SELECT n.ma_nganh,n.ten_nganh,h.nam_hoc,h.h_phi,h.diem_hb,h.diem_thpt,h.chi_tieu FROM hoc_phi_nganh h JOIN nganh_hoc n ON h.ma_nganh = n.ma_nganh WHERE n.ma_nganh = '$manganh'";
    $result = mysqli_query($mysqli, $sql);
    $it = mysqli_fetch_assoc($result);

?>

<p class="name-from">Thay đổi thông tin ngành</p>
    <table class="table-data" >

    <tr>
      <td>Mã ngành</td>
      <td><input readonly type="text" name="manganh" value=" <?php echo $it['ma_nganh'] ?>"></td>
    </tr>

    <tr>
      <td>Tên ngành</td>
      <td><input readonly type="text" name="tennganh" value=" <?php echo $it['ten_nganh'] ?>"></td>
    </tr>
    <tr>
      <td>Học phí</td>
      <td><input type="text" name="hocphi" value=" <?php echo $it['h_phi'] ?>"></td>
    </tr>

    <tr>
      <td>Điểm học bạ</td>
      <td><input type="text" name="diemhb" value=" <?php echo $it['diem_hb'] ?>"></td>
    </tr>

    <tr>
      <td>Điểm THPTQG</td>
      <td><input type="text" name="diemthpt" value=" <?php echo $it['diem_thpt'] ?>"></td>
    </tr>

    <tr>
      <td>Chỉ tiêu</td>
      <td><input type="text" name="chitieu" value=" <?php echo $it['chi_tieu'] ?>"></td>
    </tr>
    
    <tr>
      <td><input id="check" type="submit" value="Thay đổi" name="thay_doi"></td>
      <td><input onclick="dongthaydoi()" type="button" value="Đóng" name="Đóng"></td>
    </tr>
  </table>
