<?php
    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");

    $stt = $_GET['id'];
    $sql_pt = "SELECT * FROM Chatbot where STT = '$stt'";
    $result = mysqli_query($mysqli, $sql_pt);
    $row = mysqli_fetch_assoc($result);

?>
<p class="name-from">Thay đổi câu trả lời</p>

<form action="quanly/xuly_cau_hoi.php" method="POST" >

<table class="table-data" >
    <tr>
      <td>STT</td>
      <td><input readonly type="text" name="stt" value=" <?php echo $row['STT'] ?>"></td>
    </tr>

    <tr>
      <td>Câu hỏi</td>
      <td><input readonly type="text" name="cau_hoi" value=" <?php echo $row['cau_hoi'] ?>"></td>
    </tr>

    <tr>
      <td>Trả lời</td>
      <td><input type="text" name="tra_loi" value=" <?php echo $row['tra_loi'] ?>"></td>
    </tr>

  </table>
  
  <input id="check_pt" onclick="luutraloi()" type="submit" value="Lưu">
  <input id="close" onclick="dongtraloi()" type="button" value="Đóng" name="Đóng">
</form>