<?php
$mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
$ma_nganh = trim($_GET['manganh']);
$sql_sua = "SELECT n.ten_nganh,n.ma_nganh,n.to_hop_XT,n.gioi_thieu,c.noi_lam_viec,c.vt_lam_viec FROM nganh_hoc n join co_hoi_nghe_nghiep c on n.ma_nganh = c.ma_nganh WHERE N.MA_NGANH = $ma_nganh";
$query_sua = mysqli_query($mysqli,$sql_sua);
?>
<p class="name-from">Sửa ngành học</p>
  <table class="table-data">
<?php foreach($query_sua as $it){ ?>
    <tr>
      <td>Tên Ngành Học</td>
      <td><input type="text" name="tennganh" value="<?php echo $it['ten_nganh'] ?>"></td>
    </tr>

    <tr>
      <td>Mã Ngành Học</td>
      <td><input readonly type="text" name="manganh" value="<?php echo $it['ma_nganh'] ?>"></td>
    </tr>

    <tr>
      <td>Tổ hợp xét tuyển</td>
      <td><input type="text" name="th_xet_tuyen" value="<?php echo $it['to_hop_XT'] ?>"></td>
    </tr>

    <tr>
      <td>Giới Thiệu</td>
      <td><input type="text" name="gioithieu" value="<?php echo $it['gioi_thieu'] ?>"></td>
    </tr>

    <tr>
      <td>Nơi làm việc</td>
      <td><input type="text" name="noi_lam_viec" value="<?php echo $it['noi_lam_viec'] ?> "></td>
    </tr>
    
    <tr>
      <td>Vị trí làm việc</td>
      <td><input type="text" name="vt_lam_viec" value="<?php echo $it['vt_lam_viec'] ?> "></td>
    </tr>

    <tr>
      <td><input type="submit" value="Sửa ngành học" name="suanganhhoc"></td>
      <td><input onclick="dongsua()" type="button" value="Đóng"></td>

    </tr>
<?php } ?>
  </table>