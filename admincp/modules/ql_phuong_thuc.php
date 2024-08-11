
<!-- <div id="selected_checkboxes"></div> -->
<div class="chon_phuong_thuc from hide"></div>
<h3 class="title-page">Phương thức xét tuyển của ngành học</h3>
<!-- <input id="Them_nganh" type="button" value="Thêm ngành học mới"> -->
<table class="table-data" border="1" width="100%">
  <tr>
    <th>Tên ngành</th>
    <th>Mã ngành</th>
    <th>Phương thức xét tuyển</th>
    <th>Quản lý</th>

  </tr>
  <?php
    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $nganhhoc = "SELECT n.ma_nganh,n.ten_nganh FROM nganh_hoc n";
    $result = mysqli_query($mysqli, $nganhhoc);
    // echo $result;
    foreach($result as $it){
        $nganhhoc = "SELECT p.Ten_pt FROM nganh_hoc n join nganh_hoc_phuong_thuc_xet_tuyen h on n.ma_nganh=h.ma_nganh join pt_xet_tuyen p on h.ma_pt = p.ma_pt WHERE n.ma_nganh = '$it[ma_nganh]'";
        $kq = mysqli_query($mysqli, $nganhhoc);
      ?>
      <tr>
        <td><?php echo $it['ten_nganh']?></td>
        <td class="quantrong"><?php echo $it['ma_nganh']?></td>
        <td class="data_row" onclick="toggleText(this)" ><?php while ($row = mysqli_fetch_assoc($kq)) {
    echo $row['Ten_pt']. "<br>" ;
} ?></td>
        <td class="show_phuong_thuc_btn">
            <input class="" type="button" value="Chọn Phương thức xét tuyển">
        </td>
      </tr>
      <?php
    }
  ?>
</table>



<?php
    if(isset($_SESSION['sua'])){
      echo "<script>alert('chọn phương thức thành công')</script>";
      unset($_SESSION['sua']);
    } ?>