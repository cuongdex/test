<div class="them_nganh_hoc from">
<p class="name-from">Thêm phương thức</p>
<form method="POST" action="quanly/xu_ly_ptxt.php" >
  <table >
    <tr>
      <td>Mã phương thức</td>
      <td><input type="text" name="maphuongthuc" required></td>
    </tr>
    <tr>
      <td>Tên phương thức</td>
      <td><input type="text" name="tenphuongthuc" required></td>
    </tr>

    <tr>
      <td>Điều kiện xét tuyển</td>
      <td><input type="text" name="dieukienxt" required></td>
    </tr>

    <tr>
      <td>Đối tượng xét tuyển</td>
      <td><input type="text" name="doituongxt" required></td>
    </tr>

    <tr>
      <td>Điểm xét tuyển</td>
      <td><input type="text" name="diemxt" required></td>
    </tr>
    
    <tr>
      <td>Nguyên tắc xét tuyển</td>
      <td><input type="text" name="nguyentacxt" required></td>
    </tr>

    <tr>
      <td><input id="check" type="submit" value="Thêm phương thức" name="them_phuong_thuc"></td>
      <td><input id="close" type="button" value="Đóng" name="Đóng"></td>
    </tr>
  </table>
</form>
</div>

<h3 class="title-page"> Phương thức xét tuyển hiện có</h3>
<div class="click_opt">
  <input type="button" value="Thêm phương thức xét tuyển">
  <?php
if (isset($_SESSION['success_message'])) {
  echo "<script>alert('thêm phương thức mới thành công')</script>";
  unset($_SESSION['success_message']);
}
if(isset($_SESSION['loi'])){
  echo "<script>alert('mã phương thức đã tồn tại! vui lòng không nhập trùng mã đã có')</script>";
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
<table class="table-data" border="1" width="100%">
  <tr>
    <th>Mã phương thức</th>
    <th>Tên phương thức</th>
    <th>Điều kiện xét tuyển</th>
    <th>Đối tượng xét tuyển</th>
    <th>Điểm xét tuyển</th>
    <th>Nguyên tác xét tuyển</th>
    <th>Quản lý</th>
  </tr>
  <?php
    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $nganhhoc = "SELECT n.ma_pt,n.Ten_pt,n.dk_xt,n.doi_tuong_xt,n.diem_xt,n.nguyen_tac_xt FROM pt_xet_tuyen n";
    $result = mysqli_query($mysqli, $nganhhoc);
    
    foreach($result as $it){
      ?>
      <tr>
        <td class="data_row quantrong" onclick="toggleText(this)" ><?php echo $it['ma_pt']?></td>
        <td class="data_row" onclick="toggleText(this)" ><?php echo $it['Ten_pt']?></td>
        <td class="data_row" onclick="toggleText(this)" ><?php echo $it['dk_xt']?></td>
        <td class="data_row" onclick="toggleText(this)" ><?php echo $it['doi_tuong_xt']?></td>
        <td class="data_row" onclick="toggleText(this)" ><?php echo $it['diem_xt']?></td>
        <td class="data_row" onclick="toggleText(this)" ><?php echo $it['nguyen_tac_xt']?></td>

        <td class="data_row">
        <a class="show-opt" href="quanly/xu_ly_ptxt.php?maphuongthuc=<?php echo $it['ma_pt']?>">Xóa</a> | 
        <input class="lay_gia_tri_pt" type="button" value="Sửa">
        </td>
      </tr>
      <?php
    }
  ?>
</table>

<form class="sua_phuong_thuc hide from" method="POST" action = "quanly/xu_ly_ptxt.php">

</form>


