<main>
    <?php
    if(isset($_GET['quanly'])){
        $tam = $_GET['quanly'];
    }
    else{
        $tam = '';
    }
    if($tam == 'xettuyen'){
        include("main/nganhhoc.php");
    }
    elseif($tam == 'ptts'){
        include("main/xettuyen.php");
    }
    elseif($tam=='gioithieu'){
        include("main/gioithieu.php");
    }
    elseif($tam=='phuongthucts'){
        include("main/phuongthucts.php");
    }
    elseif($tam=='dk-dn'){
        include("dangnhap.php");
    }
    elseif($tam=='dangxuat'){
        unset($_SESSION['dang_nhap']);
        header("Location: dangnhap.php");
    }
    else{
        include("main/index.php");
    }
    ?>
</main>