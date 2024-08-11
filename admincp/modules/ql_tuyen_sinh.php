<div class="them_nganh_hoc from">
<p class="name-from">Thêm ngành học mới</p>
<form method="POST" action="quanly/xu_ly_nganh_hoc.php" >
  <table >
    <tr>
      <td>Tên Ngành Học</td>
      <td><input  type="text" name="tennganh" required></td>
    </tr>
    <tr>
      <td>Mã Ngành Học</td>
      <td><input required type="text" name="manganh"></td>
    </tr>

    <tr>
      <td>Tổ hợp xét tuyển</td>
      <td><input required type="text" name="th_xet_tuyen"></td>
    </tr>

    <tr>
      <td>Giới Thiệu</td>
      <td><input required type="text" name="gioithieu"></td>
    </tr>

    <tr>
      <td>Nơi làm việc</td>
      <td><input required type="text" name="noi_lam_viec"></td>
    </tr>
    
    <tr>
      <td>Vị trí làm việc</td>
      <td><input required type="text" name="vt_lam_viec"></td>
    </tr>

    <tr>
      <td><input id="check" type="submit" value="Thêm ngành học" name="them_nganh_hoc"></td>
      <td><input id="close" type="button" value="Đóng" name="Đóng"></td>
    </tr>
  </table>
</form>
</div>

<h3 class="title-page"> Ngành học hiện có</h3>
<div class="click_opt">

  <input type="button" value="Thêm ngành học mới">
  <?php
if (isset($_SESSION['success_message'])) {
  echo "<script>alert('thêm ngành mới thành công')</script>";
  unset($_SESSION['success_message']);
}
if(isset($_SESSION['loi'])){
  echo "<script>alert('mã ngành đã tồn tại ! vui lòng không nhập trùng mã đã có')</script>";
  unset($_SESSION['loi']);
}
if(isset($_SESSION['sua'])){
  echo "<script>alert('thay đổi thành công')</script>";
  unset($_SESSION['sua']);
}
if(isset($_SESSION['xoa'])){
  echo "<script>alert('Xóa thành công')</script>";
  unset($_SESSION['xoa']);
}
?>
</div>
<table class="table-data" >
  <tr>
    <th>Tên ngành</th>
    <th>Mã ngành</th>
    <th>Tổ hợp xét tuyển</th>
    <th>Giới thiệu</th>
    <th>Nơi làm việc</th>
    <th>Vị trí làm việc</th>
    <th>Quản lý</th>
  </tr>
  <?php
    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $nganhhoc = "SELECT n.ten_nganh,n.ma_nganh,n.to_hop_XT,n.gioi_thieu,c.noi_lam_viec,c.vt_lam_viec FROM nganh_hoc n join co_hoi_nghe_nghiep c on n.ma_nganh = c.ma_nganh";
    $result = mysqli_query($mysqli, $nganhhoc);
    
    foreach($result as $it){
      ?>
      <tr>
        <td><?php echo $it['ten_nganh']?></td>
        <td class="quantrong"><?php echo $it['ma_nganh']?></td>
        <td class="data_row" onclick="toggleText(this)" ><?php echo $it['to_hop_XT']?></td>
        <td class="data_row" onclick="toggleText(this)" ><?php echo $it['gioi_thieu']?></td>
        <td class="data_row" onclick="toggleText(this)" ><?php echo $it['noi_lam_viec']?></td>
        <td class="data_row" onclick="toggleText(this)" ><?php echo $it['vt_lam_viec']?></td>
        <td>
        <a class="show-opt" href="quanly/xu_ly_nganh_hoc.php?manganh=<?php echo $it['ma_nganh']?>">Xóa</a> | <input class="lay_gia_tri" type="button" value="Sửa">
        </td>
      </tr>
      <?php
    }
  ?>
</table>

<form class="sua_nganh_hoc from" method="POST" action = "quanly/xu_ly_nganh_hoc.php">

</form>


