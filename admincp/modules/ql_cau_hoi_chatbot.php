<h3 class="title-page">Quản lý câu trả lời của Chatbot</h3>
<!-- <input id="Them_nganh" type="button" value="Thêm ngành học mới"> -->
<table class="table-data" border="1" width="100%">
  <tr>
    <th>STT</th>
    <th>Câu hỏi</th>
    <th>Trả lời</th>
    <th>Quản lý</th>

  </tr>
  <?php
    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $nganhhoc = "SELECT * FROM Chatbot";
    $result = mysqli_query($mysqli, $nganhhoc);

    foreach($result as $it){
    ?>
      <tr>
        <td class="quantrong"><?php echo $it['STT']?></td>
        <td class="data_row" onclick="toggleText(this)"><?php echo $it['cau_hoi']?></td>
        <td class="data_row" onclick="toggleText(this)" ><?php echo $it['tra_loi'] ?></td>
        <td class="show_cau_tra_loi">
            <input class="" type="button" value="Thay đổi câu trả lời">
        </td>
      </tr>
      <?php
    }
  ?>
</table>

<div class="show_tra_loi from hide">
    
</div>


<?php
    if(isset($_SESSION['sua'])){
      echo "<script>alert('cập nhật câu trả lời thành công')</script>";
      unset($_SESSION['sua']);
    } ?>