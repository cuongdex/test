<?php
    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $nganhhoc = "SELECT n.ma_nganh,n.ten_nganh,h.nam_hoc,h.h_phi,h.diem_hb,h.diem_thpt,h.chi_tieu FROM hoc_phi_nganh h JOIN nganh_hoc n ON h.ma_nganh = n.ma_nganh";
    $result = mysqli_query($mysqli, $nganhhoc);
    $y = date('Y') - 1;

    if(isset($_SESSION['sua'])){
      echo "<script>alert('thay đổi thành công')</script>";
      unset($_SESSION['sua']);
    }
    
?>




<h3 class="title-page">Quản lý thông tin về chỉ tiêu - điểm trong năm <?php echo $y  ?> </h3>
<!-- <input id="Them_nganh" type="button" value="Thêm ngành học mới"> -->
<table class="table-data" border="1" width="100%">
  <tr>
    <th>Mã ngành</th>
    <th>Tên ngành</th>
    <th>Học phí</th>
    <th>Điểm học bạ</th>
    <th>Điểm THPTQG</th>
    <th>Chỉ tiêu</th>
    <th>Quản lý</th>

  </tr>
  <?php


    foreach($result as $it){
    ?>
      <tr>
      <td class="quantrong"><?php echo $it['ma_nganh']?></td>
        <td class="data_row" onclick="toggleText(this)"><?php echo $it['ten_nganh']?></td>
        <td class="data_row" onclick="toggleText(this)"><?php echo $it['h_phi']?></td>
        <td class="data_row" onclick="toggleText(this)"><?php echo $it['diem_hb']?></td>
        <td class="data_row" onclick="toggleText(this)" ><?php echo $it['diem_thpt'] ?></td>
        <td class="data_row" onclick="toggleText(this)" ><?php echo $it['chi_tieu'] ?></td>

        <td class="show_thay_doi">
            <input class="" type="button" value="Thay đổi">
        </td>
      </tr>
      <?php
    }
  ?>
</table>

<form class="doi_chi_tieu hide from" method="POST" action = "quanly/xu_ly_chi_tieu.php">

</form>