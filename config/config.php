<?php
$mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");

// Check connection
if ($mysqli->connect_errno) {
  echo "lỗi kết nối: " . $mysqli->connect_error;
  exit();
}
?>