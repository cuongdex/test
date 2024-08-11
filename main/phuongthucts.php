<?php
    $mysqli = new mysqli("localhost","root","","dl_tuyen_sinh");
    $t =  trim($_GET['id']);
    
    $nganhhoc = "SELECT * from pt_xet_tuyen where ma_pt = '$t' ";
    $result = mysqli_query($mysqli, $nganhhoc);
    $row = mysqli_fetch_assoc($result);

    $data = "SELECT * from nt_xet_tuyen where ma_pt = '$t' ";
    $result = mysqli_query($mysqli, $data);
    $row1 = mysqli_fetch_assoc($result);

?>

<div class="main-ptxt">
<h1><?php echo $row['Ten_pt'] ?></h1>

<?php
    $ten = explode(";",$row['Ten_pt']);
    $i = 1;
    $doi_tuong = explode("/",$row['doi_tuong_xt']);
    $dieu_kien = explode("/",$row['dk_xt']);

    foreach($ten as $it){
        echo "<p class ='ptxt'>".$i.".".$it."</p>";

        $dt = explode(";",$doi_tuong[$i-1]);
        echo "<p class = 'sup-ptxt'>Đối Tượng: </p>";
        echo "<ol>";
        foreach($dt as $a){
            echo "<li >".$a. "</li>";
        }
       echo "</ol>";

       $dk = explode(";",$dieu_kien[$i-1]);
       echo "<p class = 'sup-ptxt'>Điều Kiện: </p>";
       echo "<ol>";
       foreach($dk as $a){
           echo "<li >".$a. "</li>";
       }
      echo "</ol>";
        $i++;
    }
?>

    <p class = 'sup-ptxt'>Điểm Xét Tuyển: <?php echo $row['diem_xt'] ?></p>

    <p class = 'sup-ptxt'>Nguyên Tắc Xét Tuyển:</p>

    <?php $nt = explode(".",$row1['nguyen_tac_xt']);
    echo "<ul>";
    foreach($nt as $it){
        if($it != ''){
            echo "<li>".$it."</li>";
        }
    }
    echo "</ul>";
     ?>
    

</div>