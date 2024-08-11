<main>
    <?php
    if(isset($_GET['quanlycp'])){
        $tam = $_GET['quanlycp'];
    }
    else{
        $tam = '';
    }
    if($tam == ''){
        include("new.php");
    }
    elseif($tam == 'qlttts'){
        include("modules/ql_tuyen_sinh.php");
    }
    elseif($tam == 'ptxt'){
        include("modules/ql_phuong_thuc.php");
    }
    elseif($tam == 'chitieu'){
        include("modules/ql_chitieu_diem.php");
    }
    elseif($tam == 'ql_ptxt'){
        include("modules/ql_ptxt.php");
    }
    elseif($tam == 'cauhoi'){
        include("modules/ql_cau_hoi_chatbot.php");
    }
    elseif($tam == 'dangxuat'){
        unset($_SESSION['dang_nhap']);
        header("Location: ../dangnhap.php");
    }
    ?>
</main>